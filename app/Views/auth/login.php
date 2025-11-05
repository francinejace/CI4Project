<?= view('templates/header', ['title' => 'Login']) ?>

<div class="card mx-auto" style="max-width:600px;">
    <div class="card-body">
        <h3 class="card-title">Login</h3>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= esc($error) ?></div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('message')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('message') ?></div>
        <?php endif; ?>
        <?php if (isset($validation)): ?>
            <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
        <?php endif; ?>

        <form method="post" action="/login">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label class="form-label">Email or Username</label>
                <input class="form-control" name="login" value="<?= set_value('login') ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button class="btn btn-brown" type="submit">Login</button>
        </form>
    </div>
</div>

<?= view('templates/footer') ?>