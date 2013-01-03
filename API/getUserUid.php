<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lancy
 * Date: 2/1/13
 * Time: 9:25 PM
 * To change this template use File | Settings | File Templates.
 */

include "prefix.php";


function getUser($userUid)
{
    session_start();
    if ($_SESSION["userUid"]) {
        $result = getUserWithUid($userUid);
    } else {
        $result = array("message" => "login first");
    }
    return $result;
}


$userUid = $_POST["userUid"];
$result = getUser($userUid);

echo json_encode($result);

?>