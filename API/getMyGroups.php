<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lancy
 * Date: 3/1/13
 * Time: 2:50 PM
 * To change this template use File | Settings | File Templates.
 */

include "prefix.php";

function getMyGroups() {
    session_start();
    $userUid = $_SESSION["userUid"];
    if ($userUid) {
        $result = getGroupsUidArrayWithUserUid($userUid);
    } else {
        $result = array("message" => "login first");
    }
    return $result;
}

$result = getMyGroups();
echo json_encode($result);

?>