<?php

namespace App\Models;


class Category
{

    public $id;
    public $title;
    public $description;
    public $parent_id;

    public static function getCategories(){
        $query = "SELECT category.id, category.title  FROM category ";
        return Db::getInstance()->query($query, self::class);
    }

}