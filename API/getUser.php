<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lancy
 * Date: 2/1/13
 * Time: 9:01 PM
 * To change this template use File | Settings | File Templates.
 */

include "prefix.php";


function getUser($username)
{
    session_start();
    $result = array();
    if ($_SESSION["userUid"]) {
        $result = getUserWithUsername($username);
    } else {
        $result = array("message" => "login first");
    }
    return $result;
}


$username = $_POST["username"];

$result = getUser($username);
echo json_encode($result);

?>