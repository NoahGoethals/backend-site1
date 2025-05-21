<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Mijn Laravel App</title>
    <style>
        body {
            font-family: sans-serif;
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        a { text-decoration: none; color: #007bff; }
        h1, h3 { color: #333; }
        ul { list-style-type: none; padding: 0; }
        li {
            background: #fff;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }
        small { color: #555; }
    </style>
</head>
<body>
    @yield('content')
</body>
</html>
