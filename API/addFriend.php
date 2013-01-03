<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lancy
 * Date: 3/1/13
 * Time: 2:13 PM
 * To change this template use File | Settings | File Templates.
 */

include "prefix.php";

function addFriend($friendUid) {
    session_start();
    $userUid = $_SESSION["userUid"];

    if ($userUid) {
        if (addFriendWithUserUidAndFriendUid($userUid, $friendUid)) {
            $result = array("message" => "success");
        } else {
            $result = array("message" => "fail");
        }
    } else {
        $result = array("message" => "login first");
    }
    return $result;
}



$friendUid = $_POST["friendUid"];

$result = addFriend($friendUid);
echo json_encode($result);

?>