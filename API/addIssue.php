<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lancy
 * Date: 2/1/13
 * Time: 10:43 PM
 * To change this template use File | Settings | File Templates.
 */

include "prefix.php";

function addIssue($pageUid, $issueType, $issueContent, $isGroupPublic) {
    session_start();
    $authorUid = $_SESSION["userUid"];
    if ($authorUid) {
        $result = array("message" => "success");
        if (!addIssueToPageWithPageUidAndIssueTypeAndIssueContentAndAuthorUidAndIsGroupPublic($pageUid,$issueType,$issueContent,$authorUid,$isGroupPublic)) {
            $result = array("message" => "fail");
        }
    } else {
        $result = array("message" => "login first");
    }
    return $result;
}


$pageUid = $_POST["pageUid"];
$issueType = $_POST["issueType"];
$issueContent = $_POST["issueContent"];
$isGroupPublic = $_POST["isGroupPublic"];
if ($_POST["isGroupPublic"] == "on")
    $isGroupPublic = 1;
else
    $isGroupPublic = 0;

$result = addIssue($pageUid,$issueType,$issueContent,$isGroupPublic);
echo json_encode($result);

?>