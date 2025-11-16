# Submission checklist and quick run steps

1. Start dev server (project root):

```bat
cd /d c:\xampp\htdocs\CI4Project
php spark serve --port 8080
```

2. Initialize database (first run only):

```bat
php spark migrate
php spark db:seed UserSeeder
```

3. Verify pages (open in browser):
- http://localhost:8080/
- http://localhost:8080/products
- http://localhost:8080/products/5
- http://localhost:8080/products/form (submit the form to test POST)
 - http://localhost:8080/register (create a customer)
 - http://localhost:8080/login (use customer or seeded admin: admin@example.com / adminpass)
 - http://localhost:8080/customer (customer dashboard)
 - http://localhost:8080/admin (admin dashboard with pagination)

3. Run tests (project root):

```bat
composer install
vendor\bin\phpunit --colors=always
```

4. Files added/changed for this submission:
- `app/Controllers/Products.php` — small change to handle POST and render a confirmation view.
- `app/Views/product_saved.php` — minimal view that shows the submitted product name.
- `tests/Feature/ProductsTest.php` — two simple feature tests for the Products controller.
- `answers.md` and `answers_printable.html` — short answers/explanations for submission.
- `README_submission.md` — this file (checklist and steps).
 - `app/Controllers/Auth.php`, `app/Views/auth/*` — login/registration with validation and sessions.
 - `app/Controllers/Admin.php`, `app/Views/admin/index.php` — admin list with pagination and access control.
 - `app/Controllers/Customer.php`, `app/Views/customer/*` — simple customer pages.
 - `app/Models/UserModel.php`, `app/Database/Migrations/20251105_create_users_table.php`, `app/Database/Seeds/UserSeeder.php` — users table, model, and seed.

5. Troubleshooting notes:
- If "localhost:8080 refused to connect": ensure the server is running as shown in the terminal, use `netstat -aon | findstr :8080` to check port usage, or start the server on another port: `php spark serve --port 8081`.
