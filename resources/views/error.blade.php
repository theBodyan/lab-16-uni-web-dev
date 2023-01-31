<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Unexpected Error</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background-color: #2C2C2C;
            display: flex;
            align-items: center;
            height: 100vh;
            justify-content: center;
        }
        h1 {
            font-size: 48px;
            color: #50E3C2;
            text-align: center;
            margin-bottom: 40px;
        }
        .links {
            display: flex;
            justify-content: center;
        }
        a {
            font-size: 24px;
            color: #50E3C2;
            text-decoration: none;
            margin: 0 20px;
            position: relative;
            transition: all 0.3s ease-in-out;
        }
        a:hover:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border: 2px solid #50E3C2;
            border-radius: 10px;
            z-index: -1;
            transform: scale(1.1);
            box-shadow: 0px 5px 15px rgba(80, 227, 194, 0.3);
        }
    </style>
</head>
<body>
<div>
    <h1>Ooops, something went wrong</h1>
    <div class="links">
        <a href="#" onclick="weDontHaveSupport()">Contact support</a>
        <a href="/">Main page</a>
    </div>
</div>
</body>
<script>
    function weDontHaveSupport() {
        alert('We don\' have support! Go back to the main page');
    }
</script>
</html>

