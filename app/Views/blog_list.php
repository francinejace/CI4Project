<!DOCTYPE html>
<html>
<head>
    <title>Blog List</title>
</head>
<body>
    <h1>Blog Posts</h1>

    <!-- Instead of writing /blog/5 manually -->
    <a href="<?= url_to('Blog::view', 5) ?>">Read Blog #5</a>
    <br>
    <a href="<?= url_to('Blog::view', 10) ?>">Read Blog #10</a>

</body>
</html>
