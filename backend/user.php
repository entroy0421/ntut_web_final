<?php
    require_once('include.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST' && $_SESSION["isadmin"] == 1) {
        $username = get_post_param('username', '');
        $password = get_post_param('password', '');
        $isadmin = get_post_param('isadmin', '0');
        $imageURL = get_post_param('ImageURL', '');
        $description = get_post_param('description', '');
        $action = get_post_param('action', '');

        if($action == "add_user" && $username != "" && $password != "") {
            $pdo = get_pdo();
            $res = $pdo->query(sprintf(
                'SELECT * FROM backend_users WHERE username = %s',
                $pdo->quote($username)
            ), PDO::FETCH_ASSOC);
            $row = $res->fetch();
            if($row) {
                echo json_encode(array(
                    'status' => 'Error',
                    'message'=> 'Username is already exist!'
                ));
                exit();
            }
            $res = $pdo->exec(sprintf(
                'INSERT INTO `backend_users` (`username`, `password`, `isadmin`, `imageURL`, `description`) VALUES (%s, %s, %s, %s, %s)',
                $pdo->quote($username),
                $pdo->quote($password),
                $pdo->quote((int)$isadmin),
                $pdo->quote($imageURL),
                $pdo->quote($description)
            )); 
            echo json_encode(array(
                'status' => 'Success',
                'message'=> 'Add user success!'
            ));
        } else if($action == "delete_user" && $username != "") {
            $pdo = get_pdo();
            $res = $pdo->exec(sprintf(
                'DELETE FROM `backend_users` WHERE `username` = %s',
                $pdo->quote($username)
            )); 
            if($res == 1) {
                echo json_encode(array(
                    'status' => 'Success',
                    'message'=> 'Delete user success!'
                ));
            } else {
                echo json_encode(array(
                    'status' => 'Error',
                    'message'=> 'Something wrong!'
                ));
            }
        } else if($action == "edit_user" && $password != "" && $username != "") {
            $pdo = get_pdo();
            $res = $pdo->exec(sprintf(
                'UPDATE `backend_users` SET `password` = %s, `isadmin` = %s, `imageURL` = %s, `description` = %s WHERE `username` = %s',
                $pdo->quote($password),
                $pdo->quote($isadmin),
                $pdo->quote($imageURL),
                $pdo->quote($description),
                $pdo->quote($username)
            )); 
            if($res == 1) {
                echo json_encode(array(
                    'status' => 'Success',
                    'message'=> 'Edit user success!'
                ));
            } else {
                echo json_encode(array(
                    'status' => 'Error',
                    'message'=> 'Something wrong!'
                ));
            }
        }
    }
?>