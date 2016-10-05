<?php

namespace App\Core;

class View {

    protected $data = [];

    public function __set($key, $value) {
        $this->data[$key] = $value;
    }

    public function __get($key) {
        return $this->data[$key];
    }

    public function render($template, $data = []) {


        require (ROOT. $template);

    }
}