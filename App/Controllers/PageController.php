<?php

namespace App\Controllers;

use App\Core\Router;
use App\Core\View;
use App\Models\Page;

class PageController
{

    public function actionIndex() {

        $id = Router::$params['id'];

        $pageObject = new Page();
        $view = new View();
        $view->page = $pageObject->getOne($id);

        $view->render('/App/views/one/page.php', $view->page);

        echo 'main - one ' .$id;
    }

}