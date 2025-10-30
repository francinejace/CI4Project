<?php

namespace App\Controllers;

class Sample extends BaseController
{
    public function index(): string
    {
        return '<h1>Sample Page</h1><p>This is a simple sample page.</p><a href="' . base_url() . '">Back to Home</a>';
    }
}