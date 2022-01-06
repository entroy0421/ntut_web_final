<?php
include('include.php');

function xss_clean($data)
{
    // Fix &entity\n;
    $data = str_replace(array('&amp;', '&lt;', '&gt;'), array('&amp;amp;', '&amp;lt;', '&amp;gt;'), $data);
    $data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
    $data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
    $data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

    // Remove any attribute starting with "on" or xmlns
    $data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

    // Remove javascript: and vbscript: protocols
    $data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
    $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
    $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

    // Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
    $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
    $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
    $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

    // Remove namespaced elements (we do not need them)
    $data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

    do {
        // Remove really unwanted tags
        $old_data = $data;
        $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
    } while ($old_data !== $data);

    // we are done...
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SESSION["isadmin"] == 1) {
    $post_title = get_post_param('post_title', '');
    $post_subtitle = get_post_param('post_subtitle', '');
    date_default_timezone_set("Asia/Taipei");
    $date = date('m/d/Y h:i:s a', time());
    $author = $_SESSION["username"];
    $article = xss_clean(get_post_param('editor1', ''));
    $hash = get_post_param('hash', '');
    $action = get_post_param('action', '');

    if ($action == "add_post" && $article != "" && $post_title != "" && $post_subtitle != "") {
        $pdo = get_pdo();
        $hash = md5(time());
        $res = $pdo->exec(sprintf(
            'INSERT INTO posts (`post-title`, `post-subtitle`, `author`, `date`, `article`, `hash`) VALUES (%s, %s, %s, %s, %s, %s)',
            $pdo->quote($post_title),
            $pdo->quote($post_subtitle),
            $pdo->quote($author),
            $pdo->quote($date),
            $pdo->quote($article),
            $pdo->quote($hash)
        ));
        if ($res == 1) {
            echo json_encode(array(
                'status' => 'Success',
                'message' => 'Add post success!'
            ));
        } else {
            echo json_encode(array(
                'status' => 'Error',
                'message' => 'Something wrong!'
            ));
        }
    } else if ($action == "delete_post" && $hash != "") {
        $pdo = get_pdo();
        $res = $pdo->exec(sprintf(
            'DELETE FROM `posts` WHERE `hash` = %s',
            $pdo->quote($hash)
        ));
        if ($res == 1) {
            echo json_encode(array(
                'status' => 'Success',
                'message' => 'Delete post success!'
            ));
        } else {
            echo json_encode(array(
                'status' => 'Error',
                'message' => 'Something wrong!'
            ));
        }
    } else if ($action == "edit_post" && $hash != "") {
        $pdo = get_pdo();
        $res = $pdo->exec(sprintf(
            'UPDATE `posts` SET `post-title` = %s, `post-subtitle` = %s, `date` = %s, `article` = %s WHERE `hash` = %s',
            $pdo->quote($post_title),
            $pdo->quote($post_subtitle),
            $pdo->quote($date),
            $pdo->quote($article),
            $pdo->quote($hash)
        ));
        if ($res == 1) {
            echo json_encode(array(
                'status' => 'Success',
                'message' => 'Edit post success!'
            ));
        } else {
            echo json_encode(array(
                'status' => 'Error',
                'message' => 'Something wrong!'
            ));
        }
    }
}
