<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lancy
 * Date: 2/1/13
 * Time: 10:31 PM
 * To change this template use File | Settings | File Templates.
 */

include "prefix.php";

function getPage($pageUid) {
    session_start();
    $userUid = $_SESSION["userUid"];
    if ($userUid) {
        $result = getPageWithPageUid($pageUid);
    } else {
        $result = array("message" => "login first");
    }
    return $result;
}

$pageUid = $_POST["pageUid"];
$result = getPage($pageUid);
echo json_encode($result);

?>