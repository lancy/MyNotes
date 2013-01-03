<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lancy
 * Date: 3/1/13
 * Time: 3:01 PM
 * To change this template use File | Settings | File Templates.
 */

include "prefix.php";

function getMyFriends() {
    session_start();
    $userUid = $_SESSION["userUid"];
    if ($userUid) {
        $result = getFriendsUidArrayWithUserUid($userUid);
    } else {
        $result = array("message" => "login first");
    }
    return $result;
}

$result = getMyFriends();
echo json_encode($result);

?>