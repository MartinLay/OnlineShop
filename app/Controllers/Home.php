<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        return view('hello/world',['data'=>'Hello world juga']);
    }
}
