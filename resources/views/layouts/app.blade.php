<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir App</title>
    <style>
        body {
            background-color: #f4f1ee;
            font-family: Arial, sans-serif;
            color: #333;
        }
        .container {
            padding: 20px;
        }
        .card {
            background: #fff;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .btn {
            background-color: #8c715e;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #8c715e;
        }
    </style>
</head>
<body>
    
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
