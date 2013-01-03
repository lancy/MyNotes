<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lancy
 * Date: 3/1/13
 * Time: 1:35 AM
 * To change this template use File | Settings | File Templates.
 */


include "prefix.php";

function deleteTag($tagUid) {
    session_start();
    if ($_SESSION["isAdmin"]) {
        if (deleteTagWithTagUid($tagUid)) {
            $result = array("message" => "success");
        } else {
            $result = array("message" => "fail");
        }
    } else {
        $result = array("message" => "not system admin");
    }
    return $result;
}

$tagUid = $_POST["tagUid"];

$result = deleteTag($tagUid);

echo json_encode($result);

?>