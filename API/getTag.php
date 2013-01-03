<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lancy
 * Date: 2/1/13
 * Time: 11:21 PM
 * To change this template use File | Settings | File Templates.
 */

include "prefix.php";

function getTag($tagUid) {
    session_start();
    $userUid = $_SESSION["userUid"];
    if ($userUid) {
        $result = getTagWithTagUid($tagUid);
    } else {
        $result = array("message" => "login first");
    }
    return $result;
}

$tagUid = $_POST["tagUid"];
$result = getTag($tagUid);
echo json_encode($result);

?>