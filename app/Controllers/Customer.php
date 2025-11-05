<?php
namespace App\Controllers;

use App\Models\UserModel;

class Customer extends BaseController
{
    public function index()
    {
        // Minimal coffee menu
        // Prices updated to realistic values (PHP pesos) - minimum ₱175
        $menu = [
            ['name' => 'Espresso', 'price' => 175.00],
            ['name' => 'Cappuccino', 'price' => 200.00],
            ['name' => 'Latte', 'price' => 225.00],
        ];

        return view('customer/index', ['menu' => $menu]);
    }

    public function profile()
    {
        $user = session()->get('user');
        if (! $user) {
            return redirect()->to('/login');
        }

        $userModel = new UserModel();
        $data = $userModel->find($user['id']);

        return view('customer/profile', ['user' => $data]);
    }
}
