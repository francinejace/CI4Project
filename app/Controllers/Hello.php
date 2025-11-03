<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class Hello extends Controller
{
    // Allow auto routing for this controller
    protected $autoRoutesImproved = true;

    public function index()
    {
        return "Hello, World!";
    }

    public function greet($name = "Guest")
    {
        return "Hello, " . esc($name);
    }
}
