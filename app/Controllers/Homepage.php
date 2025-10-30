<?php

namespace App\Controllers;

class Homepage extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Welcome to My App',
            'subtitle' => 'Simple and clean homepage',
            'features' => [
                [
                    'title' => 'Fast',
                    'description' => 'Quick and responsive.'
                ],
                [
                    'title' => 'Simple',
                    'description' => 'Easy to use.'
                ],
                [
                    'title' => 'Clean',
                    'description' => 'Beautiful design.'
                ]
            ]
        ];

        return view('homepage', $data);
    }
}
