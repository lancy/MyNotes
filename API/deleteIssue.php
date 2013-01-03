<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lancy
 * Date: 2/1/13
 * Time: 11:04 PM
 * To change this template use File | Settings | File Templates.
 */

include "prefix.php";

function deleteIssue($issueUid) {
    session_start();
    $userUid = $_SESSION["userUid"];
    $issue = getIssueWithIssueUid($issueUid);

    if ($issue["author_uid"] == $userUid or $_SESSION["isAdmin"]) {
        if (deleteIssueWithIssueUid($issueUid)) {
            $result = array("message" => "success");
        } else {
            $result = array("message" => "fail");
        }
    } else {
        $result = array("message" => "not page author");
    }
    return $result;
}

$issueUid = $_POST["issueUid"];

$result = deleteIssue($issueUid);

echo json_encode($result);

?>