<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>">My App</a>
            <div class="navbar-nav">
                <a class="nav-link" href="<?= base_url() ?>">Home</a>
                <a class="nav-link" href="<?= base_url('test') ?>">Test</a>
                <a class="nav-link" href="<?= base_url('sample') ?>">Sample</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center">
                    <h1 class="display-4 mb-4"><?= $title ?></h1>
                    <p class="lead mb-4"><?= $subtitle ?></p>
                    
                    <div class="row mt-5">
                        <?php foreach ($features as $feature): ?>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h5><?= $feature['title'] ?></h5>
                                    <p class="text-muted"><?= $feature['description'] ?></p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="mt-5">
                        <a href="<?= base_url('test') ?>" class="btn btn-primary btn-lg me-3">Test Page</a>
                        <a href="<?= base_url('sample') ?>" class="btn btn-outline-primary btn-lg">Sample Page</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
