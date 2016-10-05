<?php

namespace App\Models;

class Page extends ActiveRecord{

    const TABLE = 'page';

    public $id;
    public $title;
    public $text;
    public $img;

    public static function getMenu(){
        $query = "SELECT id,menu_name FROM " .static::TABLE;
        return Db::getInstance()->query($query, static::class);
    }


}
