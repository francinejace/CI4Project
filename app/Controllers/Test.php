<?php

namespace App\Controllers;

class Test extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'CodeIgniter 4 Test Page',
            'message' => 'Welcome to your CodeIgniter 4 application!',
            'server_info' => [
                'php_version' => PHP_VERSION,
                'ci_version' => \CodeIgniter\CodeIgniter::CI_VERSION,
                'environment' => ENVIRONMENT,
                'base_url' => base_url(),
            ]
        ];

        return view('test_page', $data);
    }

    public function hello($name = 'World')
    {
        $data = [
            'title' => 'Hello Page',
            'name' => $name,
            'message' => "Hello, {$name}! Your CodeIgniter 4 application is working perfectly."
        ];

        return view('hello_page', $data);
    }
}
