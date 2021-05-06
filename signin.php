<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SignIn || Admin</title>
    <link rel="stylesheet" href="mdb/css/mdb.min.css">
    <link rel="stylesheet" href="style/main.css">
</head>
<body>
<div class="container">
    <form class="signInForm form-submit" method="post">
        <div class="form-outline mb-4">
            <input type="text" id="username" class="form-control -bs" name="log_username" minlength="3" maxlength="15" required/>
            <label class="form-label" for="username">Username</label>
        </div>
        <div class="form-outline mb-4">
            <input type="password" id="loginPass" class="form-control" name="log_password" minlength="5" maxlength="30" required/>
            <label class="form-label" for="loginPass">Password</label>
        </div>
        <button type="submit" name="log_submit" class="btn btn-success btn-block">Sign in</button>
    </form>
</div>

<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="mdb/js/mdb.min.js"></script>
</body>
</html>

