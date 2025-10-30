<?php
namespace App\Controllers;
class Products extends BaseController
{
    public function index()
    {
        return "This is the product list.";
    }

    public function details($id)
    {
        return "Product details for ID: " . $id;
    }

    public function form()
    {
        return view('product_form');
    }

    public function save()
    {
        //return "Product saved (this was a POST request).";
        $productName = $this->request->getPost('product_name');
        // Process and save the product
        return "Product saved: " . $productName;
    }
}

