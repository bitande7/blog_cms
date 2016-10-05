<?php

$all_page = new \App\Models\Page();
$pages = $all_page->getMenu();
var_dump($pages);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>

        <?php
        if(\App\Core\Router::$route['controller'] == 'news') {
            echo $data->title;
        } else {
            echo 'Title';
        }

        ?>

    </title>
    <meta charset="utf-8">
    <meta name="author" content="pixelhint.com">

    <link rel="stylesheet" type="text/css" href="/template/css/reset.css">
    <link rel="stylesheet" type="text/css" href="/template/css/main.css">

    <link rel="shortcut icon" href="http://faviconka.ru/ico/faviconka_ru_1013.png" type="image/x-icon">
</head>
<body>

<header>
    <div class="wrapper">
        <a href="/"><img src="/template/img/logo.png" class="h_logo" alt="Blogin" title=""></a>
        <nav>
            <ul class="main_nav">

                <?php

                $class = 'class="current"';
                foreach ($pages as $page ) {

                    if(preg_match("~page/".$page->id."~", $_SERVER['REQUEST_URI'])) {
                        echo '<li class="current"><a href="http://777blog.lo/page/view/'.$page->id.'">'.$page->menu_name.'</a></li>';
                    } else {
                        echo '<li><a href="/page/'.$page->id.'">'.$page->menu_name.'</a></li>';
                    }

                }


                ?>


            </ul>
        </nav>
    </div>
</header><!-- Header End -->