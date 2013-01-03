<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lancy
 * Date: 3/1/13
 * Time: 3:13 PM
 * To change this template use File | Settings | File Templates.
 */

include "prefix.php";

function getIssueArray($pageUid) {
    session_start();
    $userUid = $_SESSION["userUid"];
    if ($userUid) {
        $result = getIssueUidArrayWithUserUidAndPageUid($userUid, $pageUid);
    } else {
        $result = array("message" => "login first");
    }
    return $result;
}

$pageUid = $_POST["pageUid"];
$result = getIssueArray($pageUid);
echo json_encode($result);

?>