# Simple Transactional Website (CI4) — Submission Pack

This document collects the required deliverables: code snippets, screenshot guide, implementation steps, and reflection.

## Code snippets

### 1) Validation (Registration)
File: `app/Controllers/Auth.php`

```php
$rules = [
    'name' => 'required|min_length[3]|max_length[150]',
    'email' => 'required|valid_email|is_unique[users.email]',
    'username' => 'permit_empty|alpha_numeric|min_length[3]|max_length[100]|is_unique[users.username]',
    'password' => 'required|min_length[6]',
    'password_confirm' => 'matches[password]',
];

$validation = \Config\Services::validation();
$validation->setRules($rules);

if (! $validation->run($this->request->getPost())) {
    return view('auth/register', ['validation' => $validation]);
}
```

### 2) Validation (Login)
File: `app/Controllers/Auth.php`

```php
$rules = [
    'login' => 'required',
    'password' => 'required'
];

if (! $this->validate($rules)) {
    return view('auth/login', ['validation' => $this->validator]);
}
```

### 3) Session management (set, use, destroy)
File: `app/Controllers/Auth.php`

```php
// On successful login or after registration
$session = session();
$session->set('user', [
    'id' => $user['id'],
    'name' => $user['name'],
    'email' => $user['email'],
    'role' => $user['role'],
]);

// Access in controllers
$user = session()->get('user');

// Logout
session()->remove('user');
session()->destroy();
```

### 4) Pagination (Admin user list)
File: `app/Controllers/Admin.php` and `app/Views/admin/index.php`

```php
// Controller
$perPage = 10;
$users = $userModel->orderBy('id', 'ASC')->paginate($perPage);
$pager = $userModel->pager;
return view('admin/index', ['users' => $users, 'pager' => $pager]);
```

```php
// View (at the bottom of the table)
<?php if (isset($pager)): ?>
  <div class="mt-3">
    <?= $pager->links() ?>
  </div>
<?php endif; ?>
```

### 5) Role-based access control (Admin only)
File: `app/Controllers/Admin.php`

```php
$sessionUser = session()->get('user');
if (! $sessionUser || ($sessionUser['role'] ?? '') !== 'admin') {
    if ($sessionUser) return redirect()->to('/customer');
    return redirect()->to('/login');
}
```

## Screenshot guide (exact places and what to capture)

Take one clean screenshot per bullet. Use the route shown in parentheses.

1. Registration page (GET) — empty form (`/register`).
2. Registration validation — submit with empty fields showing errors (`/register`).
3. Registration success — after valid submit, capture flash message or redirect (`/customer`).
4. Login page (GET) — empty form (`/login`).
5. Login validation — submit invalid credentials to show error (`/login`).
6. Customer dashboard — menu cards visible (`/customer`).
7. Customer profile — shows your own details from DB (`/customer/profile`).
8. Admin dashboard — list of users table (`/admin`).
9. Admin pagination — bottom of the list with page links visible (`/admin`).
10. Admin edit user — the edit form for a selected user (`/admin/edit/{id}`).
11. Logout redirect — after clicking logout, landing on login (`/logout` -> `/login`).

Tip: If you don’t see an admin yet, seed one via:
- Email: `admin@example.com`
- Password: `adminpass`
- Command already in README: `php spark db:seed UserSeeder`

## Step-by-step implementation notes

1. Database
   - Added migration `app/Database/Migrations/20251105_create_users_table.php` to create `users` table.
   - Added seeder `app/Database/Seeds/UserSeeder.php` to create an initial admin.
   - Run: `php spark migrate` then `php spark db:seed UserSeeder`.

2. Model
   - `app/Models/UserModel.php` enables `$allowedFields`, timestamps, and returns arrays.

3. Registration
   - `Auth::register()` uses the Validation service; hashes password with `password_hash` and saves via `UserModel`.
   - On success, auto-logs in the user and redirects to `/customer`.

4. Login/Logout
   - `Auth::login()` validates input, fetches user by email or username, verifies password via `password_verify`, sets session, and redirects by role (`admin` -> `/admin`, else `/customer`).
   - `Auth::logout()` clears session and redirects to `/login`.

5. Dashboards
   - `Customer::index()` shows a minimal menu; `Customer::profile()` fetches current user from DB.
   - `Admin::index()` enforces admin role and uses `paginate(10)`; view renders `<?= $pager->links() ?>`.
   - `Admin::edit()` and `delete()` protected with the same admin check.

6. Routes
   - In `app/Config/Routes.php` added `register`, `login`, `logout`, `customer`, `customer/profile`, `admin`, `admin/edit`, and `admin/delete`.

7. Views
   - `app/Views/auth/login.php` and `auth/register.php` render validation errors and CSRF field.
   - `app/Views/admin/index.php` shows the paginated users table.
   - `app/Views/customer/*` for menu and profile.

## Reflection

- Learnings
  - CI4 Validation service simplifies complex rule sets and integrates smoothly with views (via `$validation->listErrors()`).
  - Sessions are straightforward with the helper `session()` and work well with role-based redirects.
  - Built-in `Model::paginate()` plus `$pager->links()` provides pagination with minimal code.

- Challenges
  - Ensuring unique email/username rules (`is_unique`) require the correct table/column names and migrations to be in place.
  - Remembering to protect admin routes server-side; client-side checks are not enough.
  - Getting Bootstrap styles for pager links to look good; theme tweaks might be needed.

- Next steps
  - Add Filters to globally guard `/admin/*` and authenticated routes.
  - Provide per-page selector and search in admin list.
  - Add form request objects or custom validation messages for better UX.
