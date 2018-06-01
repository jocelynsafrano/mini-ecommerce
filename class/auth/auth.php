<?php

class Auth{
    use genos;

    public function hello($post, $get){
        echo 'hello genos included';
        var_dump($post);
        var_dump($get);
    }
}