<?= view('templates/header', ['title' => 'Register']) ?>

<div class="card mx-auto" style="max-width:600px;">
    <div class="card-body">
        <h3 class="card-title">Register</h3>
        <?php if (isset($validation)): ?>
            <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
        <?php endif; ?>
        <form method="post" action="/register">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label class="form-label">Full name</label>
                <input class="form-control" name="name" value="<?= set_value('name') ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input class="form-control" name="email" value="<?= set_value('email') ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Username (optional)</label>
                <input class="form-control" name="username" value="<?= set_value('username') ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirm">
            </div>
            <button class="btn btn-brown" type="submit">Register</button>
        </form>
    </div>
</div>

<?= view('templates/footer') ?>