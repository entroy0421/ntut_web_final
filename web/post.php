<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Clean Blog</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raty/3.1.1/jquery.raty.min.js"></script>
    <script>
        const ratyOptions = {
            starHalf: "https://cdnjs.cloudflare.com/ajax/libs/raty/3.1.1/images/star-half.png",
            starOff: "https://cdnjs.cloudflare.com/ajax/libs/raty/3.1.1/images/star-off.png",
            starOn: "https://cdnjs.cloudflare.com/ajax/libs/raty/3.1.1/images/star-on.png"
        };
    </script>
    <style type="text/css">
        .css {
            margin-top: 1rem !important;
            margin-bottom: 30px;
            background-color: #eef2f5;
            width: 800px;
            overflow: auto;
            height: 400px;
            padding-bottom: 20px;
            overflow-y: auto; 
        } 

        .addtxt {
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: center;
            font-size: 13px;
            width: 350px;
            background-color: #e5e8ed;
            font-weight: 500
        }

        .form-control .focus {
            color: #000
        }

        .second {
            width: 350px;
            background-color: white;
            border-radius: 4px;
            box-shadow: 10px 10px 5px #aaaaaa
        }

        .text1 {
            font-size: 13px;
            font-weight: 500;
            color: #56575b
        }

        .text2 {
            font-size: 13px;
            font-weight: 500;
            margin-left: 6px;
            color: #56575b
        }

        .text3 {
            font-size: 13px;
            font-weight: 500;
            margin-right: 4px;
            color: #828386
        }

        .text3o {
            color: #00a5f4
        }

        .text4 {
            font-size: 13px;
            font-weight: 500;
            color: #828386
        }

        .text4i {
            color: #00a5f4
        }

        .text4o {
            color: white
        }

        .thumbup {
            font-size: 13px;
            font-weight: 500;
            margin-right: 5px
        }

        .thumbupo {
            color: #17a2b8
        }
    </style>
</head>
<?php
    include("include.php");
?>
<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index.php">Entroy's Clean Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="about.php">About</a></li>
                    <?php 
                        if (!isset($_SESSION['user_id'])) {
                            echo '<li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="/backend/login.php">Login</a></li>';
                        } else if ($_SESSION["isadmin"] == 1) {
                            echo '<li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="/backend/index.php">Admin Panel</a></li>';
                            echo '<li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="/backend/logout.php">Logout</a></li>';
                        } else {
                            echo '<li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="/backend/logout.php">Logout</a></li>';
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page Header-->
    <?php
    $id = get_get_param('id', 1);
    $id = intval($id);
    $pdo = get_pdo();
    $res = $pdo->query('SELECT * FROM posts WHERE id = ' . $id, PDO::FETCH_ASSOC);
    $posts = $res->fetchAll();

    foreach ($posts as $post) {
        $postPreview = <<<EOT
                    <div class="post-heading">
                        <h1>{$post["post-title"]}</h1>
                        <h2 class="subheading">{$post["post-subtitle"]}</h2>
                        <span class="meta">
                            Posted by
                            <a href="#!">{$post["author"]}</a>
                            {$post["date"]}
                        </span>
                    </div>
                EOT;
    ?>
        <header class="masthead" style="background-image: url('assets/img/post-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <?php echo $postPreview; ?>
                    </div>
                </div>
            </div>
        </header>
        <!-- Post Content-->
        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <?php echo $post["article"]; ?>
                    </div>
                </div>
            </div>
        </article>
        <?php
        $commentRes = $pdo->query('SELECT * FROM comments WHERE articleID = ' . $id, PDO::FETCH_ASSOC);
        $comments = $commentRes->fetchAll();
        $commentsNumber = count($comments);

        if(!isset($_SESSION["user_id"])) {
            echo <<<EOT
                <article class="mb-4">
                <div class="container px-4 px-lg-5">
                    <div class="row gx-4 gx-lg-5 justify-content-center">
                        <div class="col-md-10 col-lg-8 col-xl-7">
                        <p><a href='/backend/login.php'>Login in</a> to read comments!</p>
                        </div>
                    </div>
                </div>
            </article>
            EOT;
        } else {
            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION["user_id"])) {
                $hash = get_post_param('hash', '');
                $score = get_post_param('score', '');
                
                if($hash != "") {
                    $pdo = get_pdo();
                    $res = $pdo->exec(sprintf(
                        'UPDATE `comments` SET score = %s where `hash` = %s',
                        $pdo->quote($score),
                        $pdo->quote($hash)
                    )); 
                    if($res == 0) {
                        echo "<script>alert('Wrong comments')</script>";
                    }
                }
            }

            echo <<<EOT
                <div class="css container justify-content-center mt-5 border-left border-right">
                <div class="d-flex justify-content-center pt-3 pb-2"><input type="text" name="comment" id="add_comment" placeholder="+ Add a note" class="form-control addtxt"></div>
                <script>
                $(document).ready(function() {
                    $("#add_comment").keypress(function(event) {
                        if (event.keyCode == 13) {
                            $.post("/backend/comment.php", {
                                comment: $("#add_comment").val(),
                                action: "add",
                                id: $id
                            });
                            document.location.reload(true);
                        }
                    })
                })
                </script>
            EOT;
            $postScript = "";
            foreach ($comments as $comment) {
                if($comment["author"] == $_SESSION["username"] || $_SESSION["isadmin"] == 1) {
                    echo <<<EOT
                                <div class="d-flex justify-content-center py-2">
                                    <div class="second py-2 px-2"> <span class="text1">{$comment["comment"]}</span><div style="float: right; cursor: pointer;" class="nav" id="delete_comment_{$comment["hash"]}"><i class="fas fa-times-circle"></i></div>
                                        <div class="d-flex justify-content-between py-1 pt-2">
                                            <div><span class="text2">{$comment["author"]}</span></div>
                                            <div style="height: 1px;"><span class="text3"><div class="d-flex justify-content-between py-1 pt-2" id="{$comment["hash"]}"></div></span></div>
                                        </div>
                                    </div>
                                </div>
                        EOT;
                    echo <<<EOT
                    <script>
                    $(document).ready(function() {
                        $("#delete_comment_{$comment["hash"]}").on('click', function(event) {
                            if(confirm('Do you want do delete the comment?')) {
                                $.post("/backend/comment.php", {
                                    hash: "{$comment["hash"]}",
                                    action: "delete"
                                });
                                alert("Deleted!");
                                document.location.reload(true);
                            }
                        })
                    })
                    </script>
                    EOT;
                } else {
                    echo <<<EOT
                                <div class="d-flex justify-content-center py-2">
                                    <div class="second py-2 px-2"> <span class="text1">{$comment["comment"]}</span>
                                        <div class="d-flex justify-content-between py-1 pt-2">
                                            <div><span class="text2">{$comment["author"]}</span></div>
                                            <div style="height: 1px;"><span class="text3"><div class="d-flex justify-content-between py-1 pt-2" id="{$comment["hash"]}"></div></span></div>
                                        </div>
                                    </div>
                                </div>
                        EOT;
                }
                if($comment["author"] == $_SESSION["username"]) {
                    $postScript .= <<<EOT
                    $("#{$comment["hash"]}").raty({
                        half: true,
                        starOn: ratyOptions.starOn,
                        starOff: ratyOptions.starOff,
                        starHalf: ratyOptions.starHalf,
                        score: {$comment["score"]},

                        click: function (score, e) {
                            e.preventDefault();

                            $.post("post.php", { score: score, hash: "${comment["hash"]}" } );
                        }
                    });
                EOT;
                } else {
                    $postScript .= <<<EOT
                    $("#{$comment["hash"]}").raty({
                        half: true,
                        starOn: ratyOptions.starOn,
                        starOff: ratyOptions.starOff,
                        starHalf: ratyOptions.starHalf,
                        score: {$comment["score"]},
                        readOnly: true
                    });
                EOT;
                }
            }
            echo '</div>';
            echo "<script>$postScript</script>";
        }
    }
        ?>
        <!-- Footer-->
        <footer class="border-top">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="small text-center text-muted fst-italic">Copyright &copy; Your Website 2021</div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
</body>

</html>