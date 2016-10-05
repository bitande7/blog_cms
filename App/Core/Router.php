<?php

namespace App\Core;


class Router {

    private static $routes = [];

    public static $route =[];

    private static $url = '';

    public static $params = [];

    private function setUrl() {

        self::$url = trim($_SERVER['REQUEST_URI'], '/');

       // echo 'REQUEST_URi - '. self::$url;
    }

    public static function add($regexp, $route = []) {
        self::$routes[$regexp] = $route;
    }


    public static function getRoutes()
    {
        return self::$routes;
    }

    public static function matchRoute() {

        self::setUrl();

        foreach (self::$routes as $regexp => $array) { // in array 'controller' => 'Main', 'action' => 'Index'

            if(preg_match("~$regexp~i", self::$url, $matches) ) { // check if array ^ not empty and match array key(regex) with url - news.php(regex key) - news.php(url)

                self::$params['id'] = isset($array['id']) ? $array['id'] : $matches['id'];
                self::$params['page'] = isset($array['page']) ? $array['page'] : $matches['page'];

                self::$route['controller'] = isset($array['controller']) ? $array['controller'] : $matches['controller'];
                self::$route['action'] = isset($array['action']) ? $array['action'] : $matches['action'];


                break;
            }
        } //end foreach

    }

    public static function dispatch() {

        Router::matchRoute();

        $controller = 'App\Controllers\\'.ucfirst(self::$route['controller']).'Controller';

        // Приводит action - edit_post к виду EditPost

        self::$route['action'] = str_replace('_', ' ', self::$route['action']);
        self::$route['action'] = ucwords(self::$route['action']);
        self::$route['action'] = str_replace(' ', '', self::$route['action']);

        $action = 'action'.self::$route['action'];

//        echo 'final object<hr>';
//        var_dump($controller);
//        var_dump($action);

       if(class_exists($controller)) {
            $obj = new $controller;
           } else {
            echo 'controller not found';
        }

        if(method_exists($controller,$action)) {
            $obj->$action();
        } else {
            echo 'method not found';
        }
    }
}


Router::add('^$', ['controller' => 'News', 'action' => 'Index' ]);
Router::add('^index.php$', ['controller' => 'News', 'action' => 'Index' ]);
Router::add("^news/(?P<id>[0-9]+)$", ['controller' => 'News', 'action' => 'One' ]);
Router::add("^page/(?P<id>[0-9]+)$", ['controller' => 'Page', 'action' => 'Index' ]);
Router::add("^admin$", ['controller' => 'Admin', 'action' => 'Index' ]);

// route for pages with paginator***********
Router::add("^(?P<controller>[a-z-]+)/(?P<action>[a-z-_]+)/p/(?P<page>[0-9]+)$");
//**********************

Router::add("^(?P<controller>[a-z-]+)$", ['action' => 'Index' ]);
Router::add("^(?P<controller>[a-z-]+)/(?P<action>[a-z-_]+)$");
Router::add("^(?P<controller>[a-z-]+)/(?P<action>[a-z-_]+)/(?P<id>[0-9]+)$");