<?php
namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function register()
    {
        helper(['form']);

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'name' => 'required|min_length[3]|max_length[150]',
                'email' => 'required|valid_email|is_unique[users.email]',
                'username' => 'permit_empty|alpha_numeric|min_length[3]|max_length[100]|is_unique[users.username]',
                'password' => 'required|min_length[6]',
                'password_confirm' => 'matches[password]',
            ];

            if (! $this->validate($rules)) {
                return view('auth/register', ['validation' => $this->validator]);
            }

            $userModel = new UserModel();

            $userModel->save([
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'username' => $this->request->getPost('username'),
                'password_hash' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'role' => 'customer',
            ]);

            return redirect()->to('/login')->with('message', 'Registration successful. Please login.');
        }

        return view('auth/register');
    }

    public function login()
    {
        helper(['form']);

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'login' => 'required',
                'password' => 'required'
            ];

            if (! $this->validate($rules)) {
                return view('auth/login', ['validation' => $this->validator]);
            }

            $login = $this->request->getPost('login');
            $password = $this->request->getPost('password');

            $userModel = new UserModel();
            $user = $userModel->where('email', $login)->orWhere('username', $login)->first();

            if ($user && password_verify($password, $user['password_hash'])) {
                $session = session();
                $session->set('user', [
                    'id' => $user['id'],
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'role' => $user['role'],
                ]);

                // Redirect based on role
                if ($user['role'] === 'admin') {
                    return redirect()->to('/admin');
                }

                return redirect()->to('/customer');
            }

            return view('auth/login', ['validation' => $this->validator, 'error' => 'Invalid login credentials']);
        }

        return view('auth/login');
    }

    public function logout()
    {
        session()->remove('user');
        session()->destroy();
        return redirect()->to('/login');
    }
}
