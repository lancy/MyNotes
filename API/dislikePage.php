<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lancy
 * Date: 3/1/13
 * Time: 4:02 PM
 * To change this template use File | Settings | File Templates.
 */

include "prefix.php";

function dislikePage($pageUid) {
    session_start();
    $userUid = $_SESSION["userUid"];
    if ($userUid) {
        if (dislikePageWithPageUid($pageUid)) {
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
$result = dislikePage($pageUid);
echo json_encode($result);

?>