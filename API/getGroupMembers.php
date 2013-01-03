<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lancy
 * Date: 3/1/13
 * Time: 2:57 PM
 * To change this template use File | Settings | File Templates.
 */

include "prefix.php";

function getGroupMembers($groupUid) {
    session_start();
    $userUid = $_SESSION["userUid"];
    if ($userUid) {
        $result = getUsersUidArrayWIthGroupUid($groupUid);
    } else {
        $result = array("message" => "login first");
    }
    return $result;
}

$groupUid = $_POST["groupUid"];
$result = getGroupMembers($groupUid);
echo json_encode($result);

?>