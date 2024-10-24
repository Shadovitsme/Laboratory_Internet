<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- registrate + -->
    <div>
        <form id='userAdd' method="POST">
            <input type="text" class='loginAdd' placeholder="login">
            <input type="password" class='passwordAdd' placeholder="password">
            <input type="button" class='registrate' value="registration">
        </form>
    </div>

    <!-- login -->
    <div>
        <form id='auth' method="POST">
            <input type="text" class='login' placeholder="login">
            <input type="password" class='password' placeholder="password">
            <input type="button" value="auth">
        </form>
    </div>

    <!-- update -->
    <div>
        <form id='update' method='POST'>
            <input type="text" class='idUpdate' placeholder="id">
            <input type="text" class='loginUpdate' placeholder="login">
            <input type="password" class='passwordUpdate' placeholder="password">
            <input type="button" class='update' value="update">
        </form>
    </div>

    <!-- delete -->
    <div>
        <form id='delete' method="POST">
            <input type="text" class='login' placeholder="login">
            <input type="password" class='password' placeholder="password">
            <input type="button" value="delete">
        </form>
    </div>

    <!-- getdata -->
    <div>
        <form id='getdata' method="GET">
            <input type="text" placeholder="login">
            <input type="button" value="getinf0">
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="ajax.js"></script>
</body>

</html>