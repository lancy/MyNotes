<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lancy
 * Date: 4/1/13
 * Time: 8:28 PM
 * To change this template use File | Settings | File Templates.
 */

include "prefix.php";

function getPageArray($userUid) {
    session_start();
    $myUserUid = $_SESSION["userUid"];
    if ($myUserUid) {
        $result = getPageUidArrayWithUserUid($userUid);
    } else {
        $result = array("message" => "login first");
    }
    return $result;
}

$userUid = $_POST["userUid"];
$result = getPageArray($userUid);
echo json_encode($result);

?>