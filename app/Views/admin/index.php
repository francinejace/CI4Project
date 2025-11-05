<?= view('templates/header', ['title' => 'Admin']) ?>

<h2>Users</h2>
<?php if (session()->getFlashdata('message')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('message') ?></div>
<?php endif; ?>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $u): ?>
            <tr>
                <td><?= esc($u['id']) ?></td>
                <td><?= esc($u['name']) ?></td>
                <td><?= esc($u['email']) ?></td>
                <td><?= esc($u['role']) ?></td>
                <td>
                    <a class="btn btn-sm btn-outline-primary" href="/admin/edit/<?= $u['id'] ?>">Edit</a>
                    <a class="btn btn-sm btn-outline-danger" href="/admin/delete/<?= $u['id'] ?>"
                        onclick="return confirm('Delete user?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= view('templates/footer') ?>