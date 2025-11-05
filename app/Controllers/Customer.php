<?php
namespace App\Controllers;

use App\Models\UserModel;

class Customer extends BaseController
{
    public function index()
    {
        // Minimal coffee menu
        $menu = [
            ['name' => 'Espresso', 'price' => '2.50'],
            ['name' => 'Cappuccino', 'price' => '3.00'],
            ['name' => 'Latte', 'price' => '3.50'],
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
