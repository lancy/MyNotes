<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lancy
 * Date: 4/1/13
 * Time: 8:39 PM
 * To change this template use File | Settings | File Templates.
 */

include "prefix.php";

function addGroupMember($groupUid) {
    session_start();
    $userUid = $_SESSION["userUid"];

    if ($userUid) {
        if (addRelationWithGroupUidAndUserUid($groupUid, $userUid)) {
            $result = array("message" => "success");
        } else {
            $result = array("message" => "fail");
        }
    } else {
        $result = array("message" => "login first");
    }
    return $result;
}



$groupUid = $_POST["groupUid"];

$result = addGroupMember($groupUid);
echo json_encode($result);

?>