<html>
    <head>
        <meta charset="utf-8" />
        <title>Help Desk</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <style>
            .card-login {
                padding: 30px 0 0 0;
                width: 350px;
                margin: 0 auto;
            }
        </style>
    </head>

    <body>
        
        <!-- Menu -->
        <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="png/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            Help Desk
        </a>
        </nav>

        <div class="container">    
        <div class="row">

            <div class="card-login">
            <div class="card">
                <div class="card-header">
                Login
                </div>
                <div class="card-body">
                <form action="login.php" method="post">
                    <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="E-mail">
                    </div>
                    <div class="form-group">
                    <input type="password" name="pw" class="form-control" placeholder="Password">
                    </div>

                    <?php if (isset($_GET['login']) && $_GET['login'] == 'error') { ?>
                        <div class="text-danger">Invalid user or password.</div>
                    <?php }; ?>
                    <?php if (isset($_GET['login']) && $_GET['login'] == 'error2') { ?>
                        <div class="text-danger">Enter a valid user and password to access.</div>
                    <?php }; ?>

                    <button class="btn btn-lg btn-info btn-block" type="submit">Sign in</button>
                </form>
                </div>
            </div>
            </div>
        </div>
    </body>
</html>