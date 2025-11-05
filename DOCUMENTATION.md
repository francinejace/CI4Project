# Coffee Shop - Documentation and Notes

Overview
---------
This project is a minimal transactional Coffee Shop built with CodeIgniter 4. It demonstrates user registration and login using CodeIgniter validation and the Model pattern for database interaction. The UI is intentionally minimalist with a brown/beige palette and uses Bootstrap for layout.

What I implemented (concise)
- User registration and login (Auth controller) using CodeIgniter validation rules (`$this->validate(...)`).
- Passwords hashed with `password_hash()` and verified with `password_verify()`.
- Database interaction via a `UserModel` (CodeIgniter Model) and migrations.
- Customer dashboard (menu + profile) and Admin dashboard (list, edit, delete users).
- Minimal Bootstrap-based templates and a small custom CSS file (`public/css/style.css`) with brown/beige colors.

Database / Migrations
----------------------
Files added:
- `app/Database/Migrations/20251105_create_users_table.php` — creates `users` table.
- `app/Database/Seeds/UserSeeder.php` — inserts an initial admin user.

Run these locally to prepare the database:

```bat
cd /d c:\xampp\htdocs\CI4Project
php spark migrate
php spark db:seed UserSeeder
```

Default admin credentials (seeded)
- Email: admin@example.com
- Password: adminpass

How validation is applied (brief)
--------------------------------
- Registration uses `$this->validate($rules)` with rules:
  - `name` required, min/max length
  - `email` required, valid_email, `is_unique[users.email]`
  - `username` optional, alpha_numeric, `is_unique[users.username]`
  - `password` min length and `password_confirm` matches
- Login validates required fields and then retrieves the user by email _or_ username and checks the password with `password_verify()`.
- Admin edit uses `$this->validate(...)` to ensure required fields are valid before updating.

Chosen DB method
-----------------
I used the CodeIgniter Model (`app/Models/UserModel.php`) which provides a clean, testable interface and uses the framework's query builder under the hood. This matches your selection of the Model approach.

How to run the app locally
--------------------------
1. Ensure PHP (8.1+) and Composer are installed and XAMPP is running if you prefer using its PHP.
2. From project root:

```bat
composer install
php spark migrate
php spark db:seed UserSeeder
php spark serve --port 8080
```

3. Open the app in your browser:
- http://localhost:8080/register  (create a new customer)
- http://localhost:8080/login     (use seeded admin or a registered user)
- http://localhost:8080/customer  (customer dashboard)
- http://localhost:8080/admin     (admin dashboard — requires admin login)

Screenshot checklist (for submission)
-----------------------------------
Capture the following:
1. Project tree showing key files (`app/Controllers/Auth.php`, `app/Models/UserModel.php`, `app/Database/Migrations/20251105_create_users_table.php`, views under `app/Views`).
2. Terminal showing `php spark migrate` success and `php spark db:seed UserSeeder` run.
3. Browser: registration page and error messages (failed validation) screenshot.
4. Browser: successful registration and login flow (customer dashboard).
5. Browser: admin login and admin users list.
6. Browser: customer profile page.

Short reflection (intended learning outcomes)
-----------------------------------------
This exercise demonstrates key CI4 validation techniques (rules via `validate()`), session-based authentication, and Model-based DB access. Using migrations improves reproducibility and keeps schema changes tracked. The minimalist approach keeps the UI focused on functionality while the Bootstrap base ensures responsive layout. A limitation is that email verification and advanced security (rate-limiting, 2FA) are not implemented due to scope.

Notes and next steps
--------------------
- To change the seeded admin credentials, edit `app/Database/Seeds/UserSeeder.php` and re-run the seeder after truncating the users table or rolling back the migration.
- For production, ensure environment config, strong password policies, HTTPS, and other hardening measures are applied.

Contact
-------
If you want any UI tweaks (icons, layout changes), additional fields, or to convert some actions into AJAX, tell me which parts and I will implement them.
