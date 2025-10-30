<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
            max-width: 600px;
            width: 100%;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
            font-size: 2.5em;
        }
        .message {
            color: #666;
            font-size: 1.2em;
            margin-bottom: 30px;
        }
        .info-box {
            background: #f8f9fa;
            border-left: 4px solid #667eea;
            padding: 20px;
            margin: 20px 0;
            text-align: left;
            border-radius: 5px;
        }
        .info-box h3 {
            margin-top: 0;
            color: #333;
        }
        .info-item {
            margin: 10px 0;
            display: flex;
            justify-content: space-between;
        }
        .info-label {
            font-weight: bold;
            color: #555;
        }
        .info-value {
            color: #667eea;
        }
        .links {
            margin-top: 30px;
        }
        .links a {
            display: inline-block;
            margin: 0 10px;
            padding: 12px 24px;
            background: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 25px;
            transition: background 0.3s;
        }
        .links a:hover {
            background: #5a6fd8;
        }
        .success {
            color: #28a745;
            font-weight: bold;
            font-size: 1.1em;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?= $title ?></h1>
        <div class="message success"><?= $message ?></div>
        
        <div class="info-box">
            <h3>Server Information</h3>
            <div class="info-item">
                <span class="info-label">PHP Version:</span>
                <span class="info-value"><?= $server_info['php_version'] ?></span>
            </div>
            <div class="info-item">
                <span class="info-label">CodeIgniter Version:</span>
                <span class="info-value"><?= $server_info['ci_version'] ?></span>
            </div>
            <div class="info-item">
                <span class="info-label">Environment:</span>
                <span class="info-value"><?= $server_info['environment'] ?></span>
            </div>
            <div class="info-item">
                <span class="info-label">Base URL:</span>
                <span class="info-value"><?= $server_info['base_url'] ?></span>
            </div>
        </div>

        <div class="links">
            <a href="<?= base_url() ?>">Home</a>
            <a href="<?= base_url('test/hello/CodeIgniter') ?>">Hello Test</a>
            <a href="<?= base_url('test/hello/YourName') ?>">Custom Hello</a>
        </div>
    </div>
</body>
</html>
