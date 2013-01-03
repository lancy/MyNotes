<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lancy
 * Date: 2/1/13
 * Time: 10:15 PM
 * To change this template use File | Settings | File Templates.
 */


include "prefix.php";

function deleteGroup($groupUid) {
    session_start();
    $userUid = $_SESSION["userUid"];
    $group = getGroupWithGroupUid($groupUid);

    if ($group["admin_uid"] == $userUid or $_SESSION["isAdmin"]) {
        if (deleteGroupWithGroupUid($groupUid)) {
            $result = array("message" => "success");
        } else {
            $result = array("message" => "fail");
        }
    } else {
        $result = array("message" => "not group admin");
    }
    return $result;
}

$groupUid = $_POST["groupUid"];

$result = deleteGroup($groupUid);

echo json_encode($result);

?>