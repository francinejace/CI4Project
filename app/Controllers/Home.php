<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
    public function test(): string
    {
        return "This is just a test.";
    }
    public function test2($id = null): string
    {
        $data['id'] = $id;
        return view('example', $data);
    }
}