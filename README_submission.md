# Submission checklist and quick run steps

1. Start dev server (project root):

```bat
cd /d c:\xampp\htdocs\CI4Project
php spark serve --port 8080
```

2. Verify pages (open in browser):
- http://localhost:8080/
- http://localhost:8080/products
- http://localhost:8080/products/5
- http://localhost:8080/products/form (submit the form to test POST)

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

5. Troubleshooting notes:
- If "localhost:8080 refused to connect": ensure the server is running as shown in the terminal, use `netstat -aon | findstr :8080` to check port usage, or start the server on another port: `php spark serve --port 8081`.
