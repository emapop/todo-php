
<!DOCTYPE html>
<html>

<head>
    <title>TODO list</title>
    <link rel="stylesheet" type="text/css" href="style.css?v=<?php echo time(); ?>">
</head>

<body>
    <nav class="navbar-main">
        <div class="navbar-container">
            <a class="navbar-text">Listă de sarcini</a>
        </div>
    </nav>
    </div>
    <form class="form-login" action = "auth_server.php" onsubmit = "return validation()" method = "POST">
        <div class="input-group-login">
            <label>Nume</label>
            <input type="text" name="user" value="" placeholder="nume cont" required>
        </div>
        <div class="input-group-login">
            <label>Parolă</label>
            <input type="password" name="pass" value="" placeholder="parolă" required>
        </div>
        <div class="input-group-btn-login">
            <button class="btn-login" type="submit">Loghează-te</button>
            <a>Nu ai cont?</a>
        </div>
    </form>
    </div>
</body>

</html>
