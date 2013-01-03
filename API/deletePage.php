<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lancy
 * Date: 2/1/13
 * Time: 10:37 PM
 * To change this template use File | Settings | File Templates.
 */

include "prefix.php";

function deletePage($pageUid) {
    session_start();
    $userUid = $_SESSION["userUid"];
    $page = getPageWithPageUid($pageUid);

    if ($page["author_uid"] == $userUid or $_SESSION["isAdmin"]) {
        if (deletePageWithPageUid($pageUid)) {
            $result = array("message" => "success");
        } else {
            $result = array("message" => "fail");
        }
    } else {
        $result = array("message" => "not page author");
    }
    return $result;
}

$pageUid = $_POST["pageUid"];

$result = deletePage($pageUid);

echo json_encode($result);

?>