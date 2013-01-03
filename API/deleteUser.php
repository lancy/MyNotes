<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lancy
 * Date: 2/1/13
 * Time: 9:31 PM
 * To change this template use File | Settings | File Templates.
 */

include "prefix.php";

function deleteUser($toDeleteUserUid) {
    session_start();
    if ($_SESSION["isAdmin"]) {
        if (deleteUserWithUid($toDeleteUserUid)) {
            $result = array("message" => "success");
        } else {
            $result = array("message" => "fail");
        }
    } else {
        $result = array("message" => "not system admin");
    }
    return $result;
}

$userUid = $_POST["userUid"];

$result = deleteUser($userUid);

echo json_encode($result);

?>