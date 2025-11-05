<?= view('templates/header', ['title' => 'Edit User']) ?>

<div class="card mx-auto" style="max-width:600px;">
  <div class="card-body">
    <h3>Edit User</h3>
    <?php if (isset($validation)): ?>
      <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
    <?php endif; ?>
    <form method="post" action="/admin/edit/<?= $user['id'] ?>">
      <?= csrf_field() ?>
      <div class="mb-3">
        <label class="form-label">Full name</label>
        <input class="form-control" name="name" value="<?= esc($user['name']) ?>">
      </div>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input class="form-control" name="email" value="<?= esc($user['email']) ?>">
      </div>
      <div class="mb-3">
        <label class="form-label">Username</label>
        <input class="form-control" name="username" value="<?= esc($user['username']) ?>">
      </div>
      <div class="mb-3">
        <label class="form-label">New Password (leave blank to keep)</label>
        <input type="password" class="form-control" name="password">
      </div>
      <button class="btn btn-brown" type="submit">Save</button>
    </form>
  </div>
</div>

<?= view('templates/footer') ?>
