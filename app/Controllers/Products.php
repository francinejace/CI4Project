<?php
namespace App\Controllers;
class Products extends BaseController {
    public function index() {
        return "This is the product list.";
    }
    public function details($id) {
        return "Product details for ID: " . $id;
    }
    public function save() {
        $productName = $this->request->getPost('product_name');
        return "Product saved: " . $productName;
    }
}


