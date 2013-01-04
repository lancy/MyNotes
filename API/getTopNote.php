<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lancy
 * Date: 4/1/13
 * Time: 9:43 PM
 * To change this template use File | Settings | File Templates.
 */

include "prefix.php";

function getTop() {
    session_start();
    $userUid = $_SESSION["userUid"];
    if ($userUid) {
        $result = getTopNote();
    } else {
        $result = array("message" => "login first");
    }
    return $result;
}

$result = getTop();
echo json_encode($result);

?>