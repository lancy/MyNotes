<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lancy
 * Date: 2/1/13
 * Time: 10:59 PM
 * To change this template use File | Settings | File Templates.
 */

include "prefix.php";

function getIssue($issueUid) {
    session_start();
    $userUid = $_SESSION["userUid"];
    if ($userUid) {
        $result = getIssueWithIssueUid($issueUid);
    } else {
        $result = array("message" => "login first");
    }
    return $result;
}

$issueUid = $_POST["issueUid"];
$result = getIssue($issueUid);
echo json_encode($result);

?>