<?php

namespace App\Components;

use App\Core\Router;
use App\Models\Db;

class Paginator
{

    public static $total_records;  // всего записей в бд
    public static $records_per_page = 2;


    public static function generate ($table) {

        self::$total_records = Db::getInstance()->exec("SELECT COUNT(*) AS total FROM " .$table);

        $pages = ceil(self::$total_records['total'] / self::$records_per_page); // получаем кол-во страниц, округляем в большую сторону

        $i = 1; // номер страницы
        while($pages) {


            echo '<li><a href="/'.Router::$route['controller'].'/'.strtolower(Router::$route['action']).'/p/'.$i.'">'.$i.' </a></li>';// думаю есть решение получше
            $pages--;
            $i++;
        }

    }



}

