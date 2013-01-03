<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lancy
 * Date: 3/1/13
 * Time: 3:16 PM
 * To change this template use File | Settings | File Templates.
 */

include "prefix.php";

function getPageArray($tagUid) {
    session_start();
    $userUid = $_SESSION["userUid"];
    if ($userUid) {
        $result = getPageUidArrayWithTagUid($tagUid);
    } else {
        $result = array("message" => "login first");
    }
    return $result;
}

$tagUid = $_POST["tagUid"];
$result = getPageArray($tagUid);
echo json_encode($result);

?>