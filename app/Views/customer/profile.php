<?= view('templates/header', ['title' => 'Profile']) ?>

<h2>Profile</h2>
<div class="card" style="max-width:600px;">
    <div class="card-body">
        <p><strong>Name:</strong> <?= esc($user['name']) ?></p>
        <p><strong>Email:</strong> <?= esc($user['email']) ?></p>
        <p><strong>Username:</strong> <?= esc($user['username']) ?></p>
        <p><strong>Role:</strong> <?= esc($user['role']) ?></p>
    </div>
</div>

<?= view('templates/footer') ?>