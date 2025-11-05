<?php
namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function register()
    {
        helper(['form']);

        if ($this->request->getMethod() === 'post') {
            // Quick debug logs to help diagnose registration issues (safe: do not log passwords)
            $logger = \Config\Services::logger();
            $logger->debug('Auth::register - POST received');
            $logger->debug('Auth::register - post keys: ' . implode(',', array_keys($this->request->getPost())));
            // Use validation service with setRules/run as specified
            $validation = \Config\Services::validation();

            $rules = [
                'name' => 'required|min_length[3]|max_length[150]',
                'email' => 'required|valid_email|is_unique[users.email]',
                'username' => 'permit_empty|alpha_numeric|min_length[3]|max_length[100]|is_unique[users.username]',
                'password' => 'required|min_length[6]',
                'password_confirm' => 'matches[password]',
            ];

            $validation->setRules($rules);

            if (! $validation->run($this->request->getPost())) {
                return view('auth/register', ['validation' => $validation]);
            }

            $userModel = new UserModel();

            $data = [
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'username' => $this->request->getPost('username'),
                'password_hash' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'role' => 'customer',
            ];

            // Insert and get inserted ID (wrap to catch DB errors)
            try {
                $logger->debug('Auth::register - inserting user: ' . $data['email']);
                $insertId = $userModel->insert($data);
                $logger->debug('Auth::register - insertId: ' . var_export($insertId, true));
            } catch (\Exception $e) {
                // Log exception then return view with an error message so user sees what went wrong
                $logger->error('Auth::register - insert exception: ' . $e->getMessage());
                return view('auth/register', ['validation' => $validation, 'error' => 'Registration failed: ' . $e->getMessage()]);
            }

            if ($insertId === false) {
                // Unexpected failure without exception - surface a generic error
                return view('auth/register', ['validation' => $validation, 'error' => 'Registration failed. Please try again.']);
            }

            // Auto-login the newly registered user
            $user = $userModel->find($insertId);

            if ($user) {
                $session = session();
                $session->set('user', [
                    'id' => $user['id'],
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'role' => $user['role'],
                ]);

                // flash confirmation message and redirect to customer dashboard
                $session->setFlashdata('message', 'Registration successful. You are now logged in.');
                $logger->info('Auth::register - user auto-logged in id=' . $user['id']);
                return redirect()->to('/customer');
            }

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
