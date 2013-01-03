<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lancy
 * Date: 3/12/12
 * Time: 11:53 PM
 * To change this template use File | Settings | File Templates.
 */

include "prefix.php";

function loginWithUsernameAndPassword($username ,$password)
{
    $user = getUserWithUsername($username);

    if ($user["password"] == $password) {
        $result = array("message" => "success");
        session_start();
        $_SESSION["userUid"] = $user["user_uid"];
        $_SESSION["username"] = $user["username"];
        $_SESSION["isAdmin"] = $user["is_admin"];
    } else {
        $result = array("message" => "fail");
    }

    return $result;
}



$username = $_POST["username"];
$password = $_POST["password"];

$result = loginWithUsernameAndPassword($username, $password);
echo json_encode($result);

?>