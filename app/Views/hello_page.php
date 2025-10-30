<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #ff6b6b 0%, #feca57 100%);
            margin: 0;
            padding: 20px;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            text-align: center;
            max-width: 500px;
            width: 100%;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
            font-size: 2.5em;
        }
        .message {
            color: #666;
            font-size: 1.3em;
            margin-bottom: 30px;
            line-height: 1.6;
        }
        .name {
            color: #ff6b6b;
            font-weight: bold;
            font-size: 1.2em;
        }
        .links {
            margin-top: 30px;
        }
        .links a {
            display: inline-block;
            margin: 0 10px;
            padding: 12px 24px;
            background: #ff6b6b;
            color: white;
            text-decoration: none;
            border-radius: 25px;
            transition: background 0.3s;
        }
        .links a:hover {
            background: #ff5252;
        }
        .success {
            color: #28a745;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?= $title ?></h1>
        <div class="message">
            <span class="success"><?= $message ?></span>
        </div>

        <div class="links">
            <a href="<?= base_url() ?>">Home</a>
            <a href="<?= base_url('test') ?>">Test Page</a>
        </div>
    </div>
</body>
</html>
