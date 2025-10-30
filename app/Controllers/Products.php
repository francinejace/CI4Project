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
        // Only accept POST for saving
        if ($this->request->getMethod() !== 'post') {
            return redirect()->to('/products/form');
        }

        $productName = $this->request->getPost('product_name') ?? '';

        // Keep behavior minimal: show a simple confirmation view with the submitted name
        return view('product_saved', ['name' => $productName]);
    }
}

