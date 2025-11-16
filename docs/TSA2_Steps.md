# TSA 2 — Routing (Improved Auto Routing + Reverse Routing)

This guide is intentionally simple. Follow and screenshot the checkpoints.

## 1) Improved Auto Routing
- File: `app/Config/Routes.php`
  - Auto routing is enabled in improved mode: `$routes->setAutoRoute('improved');`
- File: `app/Controllers/Hello.php`
  - Contains `protected $autoRoutesImproved = true;`
  - Methods: `index()` returns "Hello, World!", `greet($name)` returns greeting.

Checkpoints (take screenshots):
1. Browser at `http://localhost:8080/hello` → shows `Hello, World!`
2. Browser at `http://localhost:8080/hello/greet/Mar` → shows `Hello, Mar`

## 2) Reverse Routing demo
- Route: in `app/Config/Routes.php` we added:
  - `$routes->get('blog/(:num)', 'Blog::view/$1');`
  - `$routes->get('blogs', function () { return view('blog_list'); });`
- Controller: `app/Controllers/Blog.php` has `view($id)`.
- View: `app/Views/blog_list.php` uses `url_to('Blog::view', 5)` etc.

Checkpoints (take screenshots):
3. `http://localhost:8080/blogs` page with the two links visible.
4. Click the first link → URL becomes `/blog/5` and page prints the message containing ID 5.

## 3) How to run (Windows)
From project root `C:\xampp\htdocs\CI4Project`:

```bat
C:\xampp\php\php.exe spark serve --port 8080
```

Optional: if port 8080 is busy, use `--port 8081`.

## Notes
- TSA3 features (login, admin, etc.) are intentionally disabled in `Routes.php` for a clean TSA2 run.
- When you approve, we’ll proceed to TSA5 (Form Validation) next, then TSA3 (Transactional site) with the k‑drama list and SQL import.
