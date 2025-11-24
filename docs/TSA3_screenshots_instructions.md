# TSA3 — Screenshot & Import Instructions

Purpose
- Provide a focused doc with exact screenshots to take for submission and step-by-step phpMyAdmin import instructions.

Required pages to capture (suggested filenames)
- Login page -> `screenshots/01_login.png`
- Registration page -> `screenshots/02_registration.png`
- Home page (customer view) -> `screenshots/03_home_customer.png`
- Home page (admin view with users list) -> `screenshots/04_home_admin.png`
- Admin users list with pagination visible -> `screenshots/05_admin_users_pagination.png`
- User profile page -> `screenshots/06_user_profile.png`
- Logout action confirmation -> `screenshots/07_logout.png`

Where to take screenshots
- Use the app running locally at `http://localhost/CI4Project/public` (or your configured virtual host). Use consistent browser size (suggested 1366×768).
- Put screenshots in a `screenshots/` folder in the project root before zipping for submission.

phpMyAdmin / SQL import instructions
- Recommended files in this repo:
  - `create_database.sql` — creates the database schema (tables). Import this first.
  - `dealership_seed.sql` — optional sample data for the app (import after the DB schema).
  - `users_table.sql` — use only if you need a minimal users table instead of full schema.

Import steps (phpMyAdmin)
1. Open phpMyAdmin and create a new database (suggested name: `ci4_wheels`), or pick an existing DB.
2. With that database selected, go to the "Import" tab.
3. Click "Choose File" and select `create_database.sql` from the project root.
4. Click "Go" to run the import. Confirm tables are created in the left pane.
5. If you want sample data, import `dealership_seed.sql` next (same Import tab).

Notes and tips
- If import fails due to `CREATE DATABASE` permission, create the DB manually in phpMyAdmin and then import the file again.
- If you only need to restore users, import `users_table.sql` after creating the DB.

Theme & Logo (Wheels, Inc.)
- I added a placeholder CSS theme file at `public/css/wheels_theme.css` with CSS variables for colors.
- After you upload the Wheels logo, I will extract the primary and accent colors and update the theme file and site header/footer.
- To use the theme in templates, include this link in your main layout's head section:

  `<link rel="stylesheet" href="<?= base_url('css/wheels_theme.css') ?>">`

Submission screenshots checklist (what to capture)
- Show validation messages on Login and Registration (capture an invalid submission).
- Show successful login redirect to the correct dashboard (customer OR admin).
- Show session-based content (e.g., username displayed on header when logged in).
- Show admin users list where pagination controls are visible and working.

Filename & screenshot guidelines
- Use the suggested filenames above and put them into a `screenshots/` folder.
- Use PNG format for clarity. Keep file sizes reasonable (compress if necessary).

Next steps I can take for you
- Identify files you want removed from the final project commit and either delete or revert them (I can run git commands to list changes and then revert/delete once you confirm).
- Replace the CSS colors using the uploaded Wheels logo.

Leave your CV to yourself: I will not edit or add CV files.
