<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lancy
 * Date: 3/1/13
 * Time: 4:03 PM
 * To change this template use File | Settings | File Templates.
 */

include "prefix.php";

function dislikeIssue($issueUid) {
    session_start();
    $userUid = $_SESSION["userUid"];
    if ($userUid) {
        if (dislikeIssueWithIssueUid($issueUid)) {
            $result = array("message" => "success");
        } else {
            $result = array("message" => "fail");
        }
    } else {
        $result = array("message" => "login first");
    }
    return $result;
}


$issueUid = $_POST["issueUid"];
$result = dislikeIssue($issueUid);
echo json_encode($result);

?>