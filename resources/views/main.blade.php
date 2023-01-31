<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Backend6</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background-color: #2C2C2C;
        }
        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
        }
        header a {
            font-size: 24px;
            color: #50E3C2;
            text-decoration: none;
            margin-right: 20px;
        }
        header a:hover {
            text-decoration: underline;
        }
        .brand {
            color: #50E3C2;
            font-size: 36px;
        }
        .main-menu {
            margin-top: -50px;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .main-menu a {
            font-size: 24px;
            color: #50E3C2;
            text-decoration: none;
            margin: 0 20px;
        }
        .main-menu a:hover {
            content: "";
            border: 2px solid #50E3C2;
            border-radius: 10px;
            z-index: -1;
            transform: scale(1.1);
            box-shadow: 0px 5px 15px rgba(80, 227, 194, 0.3);
        }
    </style>
</head>
<body>
<header>
    <div class="brand">Backend6</div>
    <div>
        <a href="#">Blogs</a>
        <a href="#">Mockups</a>
        @guest
            <a href="#">Register</a>
            <a href="#">Log in</a>
        @endguest
        @auth
            <a href="#">Hello, user!</a>
            <a href="#">Log out</a>
        @endauth
    </div>
</header>
<div class="main-menu">
    <a href="#">All forums</a>
    <a href="#">Single forums</a>
    <a href="#">Single topic</a>
    <a href="#">Filesystem</a>
</div>
</body>
</html>
