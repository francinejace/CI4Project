<?php
namespace App\Controllers;

use App\Models\UserModel;

class Admin extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $users = $userModel->findAll();

        return view('admin/index', ['users' => $users]);
    }

    public function edit($id)
    {
        helper(['form']);
        $userModel = new UserModel();
        $user = $userModel->find($id);

        if (! $user) {
            return redirect()->to('/admin');
        }

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'name' => 'required|min_length[3]|max_length[150]',
                'email' => 'required|valid_email',
            ];

            if (! $this->validate($rules)) {
                return view('admin/edit_user', ['user' => $user, 'validation' => $this->validator]);
            }

            $data = [
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'username' => $this->request->getPost('username'),
            ];

            // Update password only if provided
            $pw = $this->request->getPost('password');
            if ($pw) {
                $data['password_hash'] = password_hash($pw, PASSWORD_DEFAULT);
            }

            $userModel->update($id, $data);

            return redirect()->to('/admin')->with('message', 'User updated');
        }

        return view('admin/edit_user', ['user' => $user]);
    }

    public function delete($id)
    {
        $userModel = new UserModel();
        $userModel->delete($id);
        return redirect()->to('/admin')->with('message', 'User deleted');
    }
}
