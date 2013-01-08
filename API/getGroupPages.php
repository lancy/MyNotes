<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lancy
 * Date: 8/1/13
 * Time: 2:02 PM
 * To change this template use File | Settings | File Templates.
 */

include "prefix.php";

function getPageUidArray($groupUid) {
    session_start();
    $userUid = $_SESSION["userUid"];
    if ($userUid) {
        $result = getPageUidArrayWithGroupUid($groupUid);
    } else {
        $result = array("message" => "login first");
    }
    return $result;
}

$groupUid = $_POST["groupUid"];
$result = getPageUidArray($groupUid);
echo json_encode($result);

?>