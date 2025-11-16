<form action="/products/save" method="post">
    <?= csrf_field() ?>
    <input type="text" name="product_name" />
    <button type="submit">Save Product</button>
</form>

