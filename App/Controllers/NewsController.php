<?php

namespace App\Controllers;

use App\Models\News;
use App\Core\View;
use App\Core\Router;

class NewsController
{

    public function actionIndex() {

        echo'<br><br>NewsController - actionDefault<br><br>';

        $newsObject = new News();
        $view = new View();
        $view->news = $newsObject->getAll();

        $view->render('/App/views/main/index.php', $view->news);

    }

    public function actionOne() {
        echo'<br><br>NewsController - actionOne<br><br>';
        $id = Router::$params['id'];

        $newsObject = new News();
        $view = new View();
        $view->post = $newsObject->getOne($id);

        $view->render('/App/views/one/news.php', $view->post);

        echo 'main - one ' .$id;
    }


}