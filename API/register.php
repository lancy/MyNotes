<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lancy
 * Date: 3/12/12
 * Time: 11:53 PM
 * To change this template use File | Settings | File Templates.
 */

include "prefix.php";

function registerWithUsernameAndPassword($username, $password) {
    if (addUserWithUsernameAndPassword($username, $password)) {
        $result = array("message" => "success");
    } else {
        $result = array("message" => "fail");
    }
    return $result;
}

$username = $_POST["username"];
$password = $_POST["password"];
$result = registerWithUsernameAndPassword($username, $password);
echo json_encode($result);
?>