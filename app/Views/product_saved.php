<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product Saved</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 700px; margin: 40px auto; padding: 20px; }
        .card { background:#fff; padding:20px; border-radius:6px; box-shadow:0 2px 8px rgba(0,0,0,0.08); }
        a.button { display:inline-block; margin-top:16px; padding:10px 14px; background:#007bff; color:#fff; border-radius:4px; text-decoration:none; }
    </style>
 </head>
<body>
    <div class="card">
        <h1>Product saved</h1>
        <p>The product name you submitted is:</p>
        <pre><?php echo esc($name); ?></pre>

        <a class="button" href="/products">Back to products</a>
        <a class="button" style="background:#6c757d; margin-left:8px;" href="/products/form">Add another</a>
    </div>
</body>
</html>
