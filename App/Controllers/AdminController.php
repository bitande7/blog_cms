<?php

namespace App\Controllers;
use App\Core\View;
use App\Core\Router;
use App\Models\News;
use App\Models\Admin;
use App\Models\Category;
use App\Components\Auth;


class AdminController
{

    public function actionIndex() {
        
        $view = new View();
        $view->render('/App/views/admin/index.php' );

    }

    public function actionEdit() { // Просто вывести таблицу со всеми новостями. Можно их удалять

        $view = new View();
        $view->news = News::getAllForAdmin();

        $view->render('/App/views/admin/edit_news.php', $view->news);

    }

    public function actionEditPost() { // Вывести одну новость, можно отредактировать, можно удалить
        $id = Router::$params['id'];

        $view = new View();
        $view->post = Admin::getOne($id);  // тут массив с объектами новость и категориями, отрефакторить

        if(isset($_POST['submit'])) {

            $view->post['post']->updatePost(); // тут объект News поэтому метод вызывается таким  способом

        } else {

            $view->render('/App/views/admin/edit_post.php', $view->post);
        }

    }

    public function actionAddNews() {

        if(isset($_POST['submit'])) {
            $news = new News();
            $news->addPost();
        } else {
            $view = new View();
            $view->categories = Category::getCategories();
            $view->render('/App/views/admin/add_news.php', $view->categories);
        }
    }


    public function actionDeletePost() {
        $id = Router::$params['id'];
        $news = News::getOneForAdmin($id);
        $news->delete();

        header("Location: /admin/edit/");


    }

}