<?php
require_once('include.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $pdo = get_pdo();

    $res = $pdo->query(sprintf(
        'SELECT * FROM backend_users WHERE username = %s AND password = %s',
        $pdo->quote($username),
        $pdo->quote($password)
    ), PDO::FETCH_ASSOC);
    $row = $res->fetch();
    if ($row && $row['username'] == $username && $row["isadmin"] == 1) {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['isadmin'] = $row['isadmin'];
        $_SESSION["imageURL"] = $row['imageURL'];
        header('Location: /backend/index.php');
        exit();
    } else if ($row && $row['username'] == $username && $row["isadmin"] == 0) {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['isadmin'] = $row['isadmin'];
        echo"<script>history.go(-1);</script>";  
        exit();
    }
} else {
    if(isset($_SESSION['user_id'])) {
        echo"<script>history.go(-1);</script>";  
    }
}
?>

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

    <title>Login Page</title>
</head>

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
                                <h3>Sign In</h3>
                                <p class="mb-4">Do you have an account? Just login in if you have one or register one below!</p>
                            </div>
                            <form action="/backend/login.php" method="post">
                                <div class="form-group first">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username">

                                </div>
                                <div class="form-group last mb-4">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">

                                </div>

                                <div class="d-flex mb-5 align-items-center">
                                    <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                                        <input type="checkbox" checked="checked" />
                                        <div class="control__indicator"></div>
                                    </label>
                                    <span class="ml-auto"><a href="javascript:alert('If you forgot your password, just register one!')" class="forgot-pass">Forgot Password</a></span>
                                </div>

                                <input type="submit" value="Log In" class="btn btn-block btn-primary">

                                <span class="d-block text-left my-4 text-muted" style="float: right;"><a href="/backend/register.php">&mdash; or register &mdash;</a></span>
                                
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