<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lancy
 * Date: 4/12/12
 * Time: 11:31 AM
 * To change this template use File | Settings | File Templates.
 */

include "prefix.php";

function removeGroupMember($groupUid, $toRemoveUserUid) {
    session_start();
    $userUid = $_SESSION["userUid"];
    $group = getGroupWithGroupUid($groupUid);

    if ($group["admin_uid"] == $userUid or $_SESSION["isAdmin"]) {
        if (addRelationWithGroupUidAndUserUid($groupUid, $toRemoveUserUid)) {
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
$toRemoveUserUid = $_POST["toRemoveUserUid"];

$result = removeGroupMember($groupUid, $toRemoveUserUid);
echo json_encode($result);

?>