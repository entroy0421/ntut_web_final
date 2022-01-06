<?php
    include('include.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION["user_id"])) {
        $comment = htmlentities(get_post_param('comment', ''));
        $id = get_post_param('id', '');
        $action = get_post_param('action', '');
        $hash = get_post_param("hash", '');

        if($comment != "" && $action == "add") {
            $author = $_SESSION["username"];
            date_default_timezone_set("Asia/Taipei");
            $date = date('m/d/Y h:i:s a', time());
            $hash = md5(time());
            $pdo = get_pdo();
            $res = $pdo->exec(sprintf(
                'INSERT INTO comments (`author`, `comment`, `date`, `articleID`, `hash`) VALUES (%s, %s, %s, %s, %s)',
                $pdo->quote($author),
                $pdo->quote($comment),
                $pdo->quote($date),
                $pdo->quote($id),
                $pdo->quote($hash)
            )); 

            if($res == 1) {
                echo json_encode(array(
                    'status' => 'Success',
                    'message'=> 'Success'
                ));
            } else {
                echo json_encode(array(
                    'status' => 'Error',
                    'message'=> 'Something wrong!'
                ));
            }
        } else if ($hash != "" && $action == "delete") {
            $pdo = get_pdo();
            $res = $pdo->exec(sprintf(
                'DELETE FROM `comments` WHERE `hash` = %s',
                $pdo->quote($hash)
            )); 
        }
    }
?>