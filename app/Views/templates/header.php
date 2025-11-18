<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title><?= isset($title) ? $title : 'Wheels Service' ?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/style.css">
    </head>
    <body class="bg-beige">
        <nav class="navbar navbar-expand-lg navbar-light" style="background:#0d6efd;">
            <div class="container">
                <a class="navbar-brand text-white" href="/">Wheels Service</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="mainNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link text-white" href="/services">Services</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="/brands">Brands</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="/careers">Careers</a></li>
                        <?php if (session()->get('user')): ?>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="/customer">Dashboard</a>
                            </li>
                            <?php if (session()->get('user')['role'] === 'admin'): ?>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="/admin">Admin</a>
                                </li>
                            <?php endif; ?>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="/logout">Logout</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="/login">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="/register">Register</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

            <div class="container my-4">
                <?php if (session()->getFlashdata('message')): ?>
                    <div class="alert alert-success"><?= esc(session()->getFlashdata('message')) ?></div>
                <?php endif; ?>
