<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lancy
 * Date: 2/1/13
 * Time: 11:13 PM
 * To change this template use File | Settings | File Templates.
 */

include "prefix.php";

function addTag($pageUid, $tagContent) {
    session_start();
    $authorUid = $_SESSION["userUid"];
    if ($authorUid) {
        if (addTagToPageWithPageUidAndTagContent($pageUid, $tagContent)) {
            $result = array("message" => "success");
        } else {
            $result = array("message" => "fail");
        }
    } else {
        $result = array("message" => "login first");
    }
    return $result;
}


$pageUid = $_POST["pageUid"];
$tagContent = $_POST["tagContent"];
$result = addTag($pageUid, $tagContent);
echo json_encode($result);

?>