<?= view('templates/header', ['title' => 'Menu']) ?>

<h2>Menu</h2>
<div class="row">
  <?php foreach ($menu as $item): ?>
    <div class="col-md-4">
      <div class="card mb-3">
        <div class="card-body">
          <h5><?= esc($item['name']) ?></h5>
          <p>Price: ₱<?= esc(number_format((float)$item['price'], 2)) ?></p>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<?= view('templates/footer') ?>
