<?php

namespace App\Models;

use App\Core\Router;
use App\Components\Paginator;

class News extends ActiveRecord {

    const TABLE = 'news';

    public $id;
    public $author_id;
    public $category_id;
    public $title;
    public $date;
    public $text;
    public $img;

    public static function getAll(){
        $query = "SELECT news.*, user.name FROM news LEFT JOIN user ON news.author_id = user.id ORDER BY id DESC ";
        return Db::getInstance()->query($query, self::class);
    }

    public static function getOne($id){
        $query = "SELECT news.*, user.name FROM news LEFT JOIN user ON news.author_id = user.id WHERE news.id = :id";
        $query2 = "SELECT * FROM comments WHERE news_id = :id";
        $post = Db::getInstance()->queryOne($query, self::class, [':id' => $id]);
        $comments = Db::getInstance()->queryOne($query2, self::class, [':id' => $id] );
        return ['post' => $post, 'comments' => $comments];
    }

    // for admin

    public static function getAllForAdmin(){

        $offset =  Router::$params['page'] * Paginator::$records_per_page - Paginator::$records_per_page ;
        $count = Paginator::$records_per_page;

        $query = "SELECT DISTINCT news.id, news.title, news.date, news.author_id, user.name, category.title AS category,
                (SELECT COUNT(id) FROM `comments` WHERE news_id = news.id) AS comments
                FROM news
                LEFT JOIN user ON news.author_id = user.id
                LEFT JOIN category ON news.category_id = category.id
                LEFT JOIN comments ON news.id = comments.news_id
                ";


        if(!empty(Router::$params['page']) && Router::$params['page'] != 1) {
            $query .= " LIMIT ".$offset.", ".$count."";
            echo $query;
        } else {
            $query .= " LIMIT ".$count;
        }



        return Db::getInstance()->query($query, self::class);
    }

    public static function getOneForAdmin($id){
        $query = "SELECT * FROM news WHERE id =:id ";
        return Db::getInstance()->queryOne($query, self::class,[':id' => $id]);
    }



    public function uploadImg() {

        if(is_uploaded_file($_FILES["img"]["tmp_name"]) && !file_exists(ROOT.'/public/uploads/img/'. $_FILES["img"]["name"])) {

            move_uploaded_file($_FILES["img"]["tmp_name"], ROOT. '/public/uploads/img/'. $_FILES["img"]["name"]);

        }
        else {
//            if(file_exists(ROOT.'/templates/img/'. $_FILES["img"]["tmp_name"])) {
//                $this->img = $_FILES["img"]["tmp_name"];
//            }

      //      echo 'file alredy exist';
        }

    }

    public function addPost() {

        $this->author_id = $_POST['author_id'];
        $this->category_id = $_POST['category_id'];
        $this->title = $_POST['title'];
        $this->date = $_POST['date'];
        $this->text = $_POST['text'];
        $this->img = $_FILES['img']['name'];

        self::uploadImg();
        self::insert();
        $last_id = Db::getInstance();
        $id = $last_id::$db->lastInsertId();
        header("Location: /admin/edit_post/{$id}");
    }

    public function updatePost() {

        $this->author_id = $_POST['author_id'];
        $this->category_id = $_POST['category_id'];
        $this->title = $_POST['title'];
        $this->date = $_POST['date'];
        $this->text = $_POST['text'];

        if(!empty($_FILES['img']['name'])) {
            $this->img = $_FILES['img']['name'] ;
            self::uploadImg();
        }

        self::save();

        header("Location: /admin/edit_post/{$this->id}");
    }

}

