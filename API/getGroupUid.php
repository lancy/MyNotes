<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lancy
 * Date: 2/1/13
 * Time: 10:11 PM
 * To change this template use File | Settings | File Templates.
 */

include "prefix.php";

function getGroup($groupUid) {
    session_start();
    $userUid = $_SESSION["userUid"];
    if ($userUid) {
        $result = getGroupWithGroupUid($groupUid);
    } else {
        $result = array("message" => "login first");
    }
    return $result;
}

$groupUid = $_POST["groupUid"];
$result = getGroup($groupUid);
echo json_encode($result);

?>