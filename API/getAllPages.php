<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lancy
 * Date: 3/1/13
 * Time: 3:02 PM
 * To change this template use File | Settings | File Templates.
 */

include "prefix.php";

function getAllPages() {
    session_start();
    $userUid = $_SESSION["userUid"];
    if ($userUid) {
        $result = getAllPagesUidArray();
    } else {
        $result = array("message" => "login first");
    }
    return $result;
}

$result = getAllPages();
echo json_encode($result);

?>