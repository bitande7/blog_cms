<?php

namespace App\Models;

use App\Core\View;
use App\Models\Category;

class Admin extends ActiveRecord
{

    public static function getOne($id) {

        $view = new View();

        $post = $view->post = News::getOneForAdmin($id);
        $categories = $view->categories = Category::getCategories();

        return ['categories' => $categories, 'post' => $post];
    }

}