**Final Project — Submission Brief**

**Project Summary:**
- **Title:** Wheels, Inc. — CI4 Project Enhancement
- **Goal:** Implement form validation, session management, pagination, file upload/image manipulation, email sample, and full website pages (landing + admin + user). Uses CodeIgniter 4 MVC and Bootstrap.

**Quick Run / Import Instructions**
- **Prerequisites:** XAMPP running (Apache + MySQL) or PHP + MySQL available.
- **Option A — phpMyAdmin import (recommended):**
  - Open `http://localhost/phpmyadmin` → create/select database (e.g., `ci4project`) → Import → choose `scripts/dealership_seed.sql` → Click `Go`.
- **Option B — CLI import (cmd.exe):**
  - Open `cmd.exe`, then:

```bat
cd C:\xampp\htdocs\CI4Project
mysql -u root -p ci4project < scripts\dealership_seed.sql
```

- **Or use CodeIgniter migrations + seeders:**

```bat
cd C:\xampp\htdocs\CI4Project
php spark migrate
php spark db:seed UserSeeder
php spark serve
```

- **Access the app:**
  - If using XAMPP and this repo is at `C:\xampp\htdocs\CI4Project`, open: `http://localhost/CI4Project/public/`
  - If using `php spark serve`, open: `http://localhost:8080/`

**Seeded admin credentials** (from `scripts/dealership_seed.sql`):
- **Email:** `admin@example.com`
- **Password:** `password`

**Files & Where Features Live**
- **Authentication & Validation:** `app/Controllers/Auth.php` — register/login with CI4 Validation and `password_hash`/`password_verify`.
- **User model:** `app/Models/UserModel.php` — allowed fields, timestamps.
- **Admin + Pagination:** `app/Controllers/Admin.php` + `app/Views/admin/index.php` — `paginate(10)` and `$pager->links()` implemented.
- **Routes:** `app/Config/Routes.php` — site pages (`site/home`, `services`, `brands`, `careers`) and auth routes (`register`, `login`, `logout`).
- **Branding & CSS:** `public/css/style.css` and `app/Views/templates/header.php` — Wheels brand colors and logo path.
- **Seed SQL:** `scripts/dealership_seed.sql` — creates DB/tables and inserts admin, services, brands, positions.

**Checklist of Required Features (mapping to assignment)**
- **Form Validation:** Implemented for registration/login in `Auth.php`. Validation rules are present and messages displayed in views.
- **Session Management:** On successful login, session stores `id`, `name`, `email`, and `role` (see `Auth::login`).
- **Pagination:** Admin user listing uses CI4 model `paginate()` and `$pager` in the view.
- **Email Sending:** Sample SMTP not yet fully configured — brief instructions included in this doc and `.env.example` should be used to add credentials before sending in production.
- **File Upload & Image Manipulation:** Upload endpoints scaffolded but full resize/watermark is pending (planned task in repo TODOs). Implementation notes included below.
- **Complete Website Pages:** Landing (`/`), Services (`/services`), Brands (`/brands`), Careers (`/careers`) created as views. Admin and Customer controllers exist (Admin listing, Customer profile).
- **Design:** Bootstrap 5 used across templates and custom CSS variables for brand.

**Screenshot Checklist (capture these pages)**
- Landing page (hero + nav) — `/` or `/CI4Project/public/`
- Services listing — `/services`
- Brands listing — `/brands`
- Careers / positions — `/careers`
- Register form — `/register`
- Login form — `/login`
- Admin users list (show pagination) — `/admin` (login as admin first)
- Example: product add / saved confirmation (if using demo product form)

**How to place logo image**
- Place your logo at `public/images/wheels-logo.png`. Header and hero reference `<?= esc(base_url('images/wheels-logo.png')) ?>`.

**Code Snippet Examples**
- Registration validation (see `app/Controllers/Auth.php`):

```php
$rules = [
    'email' => 'required|valid_email|is_unique[users.email]',
    'password' => 'required|min_length[6]'
];
if (! $this->validate($rules)) {
    return view('auth/register', ['validation' => $this->validator]);
}
```

- Pagination usage (see `app/Controllers/Admin.php`):

```php
$users = $this->userModel->paginate(10);
$pager = $this->userModel->pager;
return view('admin/index', compact('users','pager'));
```

**Notes on Pending / Optional Enhancements**
- File upload & image manipulation: add a controller method using CI4 `IncomingRequest->getFile()` and use `
$image = 
\Config\Services::image()->withFile($file)->resize(800,600)->save($newPath);
` to resize. Consider adding watermark with GD or ImageMagick.
- Email: place SMTP settings in `.env` (example keys documented below), then use `\CodeIgniter\Email\Email` service to send.

**Example `.env` SMTP keys (do NOT commit real credentials):**

```ini
CI_ENVIRONMENT = development
email.protocol = smtp
email.SMTPHost = smtp.example.com
email.SMTPUser = youruser@example.com
email.SMTPPass = yourpassword
email.SMTPPort = 587
email.SMTPTimeout = 5
```

**Reflection (short)**
- The project demonstrates core CI4 features: MVC separation, validation, session handling, and pagination. The dealership theme showcases a realistic dataset (brands, services, positions). Implementing file uploads and email requires careful configuration of server resources and credentials.
- Alignment to SDGs: Enabling reliable, documented digital services (quality education and industry innovation) can support local businesses and job creation (SDG 8: Decent Work and Economic Growth).

**Where to find things in the repo**
- `app/Controllers/Auth.php` — login/register
- `app/Controllers/Admin.php` — user listing + pagination
- `app/Models/UserModel.php` — user persistence
- `app/Views/site/*` — landing, services, brands, careers
- `public/css/style.css` — brand styles
- `scripts/dealership_seed.sql` — DB schema + seed

**Next actions I can do for you (pick one)**
- Wire `services` and `brands` views to read from DB (controllers + models).
- Implement file upload + server-side image resize & watermark and a demo page.
- Add SMTP sample and a contact form that sends an email (documented only).

---
Generated: automatic submission brief for instructor-ready screenshots and run steps. If you want, I can also convert this file to PDF and add the dynamic controllers now.
