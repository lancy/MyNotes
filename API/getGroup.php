<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lancy
 * Date: 2/1/13
 * Time: 10:07 PM
 * To change this template use File | Settings | File Templates.
 */

include "prefix.php";

function getGroup($groupName) {
    session_start();
    $userUid = $_SESSION["userUid"];
    if ($userUid) {
        $result = getGroupWithGroupName($groupName);
    } else {
        $result = array("message" => "login first");
    }
    return $result;
}

$groupName = $_POST["groupName"];
$result = getGroup($groupName);
echo json_encode($result);

?>