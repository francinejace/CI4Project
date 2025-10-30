<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Form - Testing POST Route</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        input[type="text"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
        }
        input[type="text"]:focus {
            border-color: #007bff;
            outline: none;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }
        button:hover {
            background-color: #0056b3;
        }
        .instructions {
            background-color: #e9ecef;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
            border-left: 4px solid #007bff;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Product Form</h1>
        
        <div class="instructions">
            <strong>Instructions:</strong> This form tests the POST route for product saving. 
            Enter a product name and click "Save Product" to test the /products/save endpoint.
        </div>

        <form action="/products/save" method="post">
            <div class="form-group">
                <label for="product_name">Product Name:</label>
                <input type="text" name="product_name" id="product_name" placeholder="Enter product name" required>
            </div>
            <button type="submit">Save Product</button>
        </form>
        
        <div style="margin-top: 30px; padding: 15px; background-color: #f8f9fa; border-radius: 4px;">
            <h3>Testing Instructions:</h3>
            <ul>
                <li><strong>GET /products</strong> - Should return "This is the product list."</li>
                <li><strong>GET /products/5</strong> - Should return "Product details for ID: 5"</li>
                <li><strong>POST /products/save</strong> - Use this form to test</li>
            </ul>
        </div>
    </div>
</body>
</html>
