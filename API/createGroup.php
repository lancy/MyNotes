<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lancy
 * Date: 4/12/12
 * Time: 1:22 AM
 * To change this template use File | Settings | File Templates.
 */

include "prefix.php";

function createGroupWithGroupName($groupName) {
    session_start();
    $userUid = $_SESSION["userUid"];
    if ($userUid) {
        $result = array("message" => "success");
        if (!addGroupWithGroupNameAndAdminUid($groupName, $userUid)) {
            $result = array("message" => "fail");
        }
    } else {
        $result = array("message" => "login first");
    }
    return $result;
}

$groupName = $_POST["groupName"];
$result = createGroupWithGroupName($groupName);
echo json_encode($result);

?>