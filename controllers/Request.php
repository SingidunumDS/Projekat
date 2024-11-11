<?php

namespace app\controllers;

class Request
{
    // vraca putanju koju smo uneli u URL
    public function path() {
        $path = $_SERVER['REQUEST_URI'];
        $position = strpos($path, "?") ?? false;
        if($position === false) return $path;
        return substr($path, 0, $position);
    }

    // vraca metodu (GET ILI POST) koju smo izabrali
    public function method(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}