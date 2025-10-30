# Answers and Explanations (concise)

Q1 — What is MVC and how does CodeIgniter implement it?
- MVC (Model-View-Controller) separates concerns: Model handles data, View handles presentation, Controller handles request flow.
- CI4 maps controllers to `app/Controllers`, models to `app/Models`, and views to `app/Views`. Routes in `app/Config/Routes.php` map URIs to controller methods.

Q2 — Difference between GET and POST
- GET retrieves data (idempotent), parameters in URL. Use for reads.
- POST submits data to change state, sent in request body. Use for creates/updates.

Q3 — Why server-side validation is required
- Client-side validation improves UX but can be bypassed. Server-side validation enforces rules securely and protects data integrity.

Q4 — What is localization and how CI4 supports it
- Localization provides language-specific message files under `app/Language/{locale}`. Load language lines via the Language service or `lang()` helper. The project includes a `lang:sync` command to help synchronize keys between locales.

Q5 — How to run the app and tests (short)
- Start dev server: `php spark serve --port 8080` (from project root)
- Visit: http://localhost:8080
- Run tests: `vendor\\bin\\phpunit` (from project root)

Q6 — Files changed/added for this submission
- `answers.md` (this file)
- `tests/Feature/ProductsTest.php` (basic feature tests for the Products controller)

---
Include these answers in your submission document. Keep them brief and adapt wording if required by your instructor.
