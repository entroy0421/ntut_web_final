<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>Register Page</title>
</head>
<?php
include('../frontend/include.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = get_post_param('username', '');
    $password = get_post_param('password', '');
    $action = get_post_param('action', '');

    if ($action == "Register") {
        $pdo = get_pdo();
        $res = $pdo->query(sprintf(
            'SELECT * FROM backend_users WHERE username = %s',
            $pdo->quote($username)
        ), PDO::FETCH_ASSOC);
        $row = $res->fetch();
        if ($row) {
            echo "<script>alert('Username is already exist!)</script>";
        } else {
            $res = $pdo->exec(sprintf(
                'INSERT INTO `backend_users` (`username`, `password`, `isadmin`) VALUES (%s, %s, %s)',
                $pdo->quote($username),
                $pdo->quote($password),
                $pdo->quote(0)
            ));
            echo "<script>alert('Add user success!'); document.location.replace('/backend/login.php')</script>";
        }
    }
}
?>

<body>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3>Sign Up</h3>
                                <p class="mb-4">Type your username and password and enjoy the blog!</p>
                            </div>
                            <form action="register.php" method="post">
                                <div class="form-group first">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username">

                                </div>
                                <div class="form-group  ">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">

                                </div>

                                <div class="form-group mb-4">
                                    <label for="retype_password">Password Check</label>
                                    <input type="password" class="form-control" id="retype_password" name="retype_password">

                                </div>

                                <input type="submit" id="add_user" name="action" value="Register" class="btn btn-block btn-primary">

                                <span class="d-block text-left my-4 text-muted" style="float: right;"><a href="/backend/login.php">&mdash; back to login &mdash;</a></span>
                                <script>
                                    $(document).ready(function() {
                                        $("#add_user").on('click', function(event) {
                                            
                                            if ($("#password").val() !== $("#retype_password").val()) {
                                                alert('Please check your password!');
                                                return false;
                                            }
                                        })
                                    })
                                </script>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>