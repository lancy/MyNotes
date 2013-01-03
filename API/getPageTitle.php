<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lancy
 * Date: 3/1/13
 * Time: 3:30 PM
 * To change this template use File | Settings | File Templates.
 */

include "prefix.php";

function getPage($pageTitle) {
    session_start();
    $userUid = $_SESSION["userUid"];
    if ($userUid) {
        $result = getPageWithPageTitle($pageTitle);
    } else {
        $result = array("message" => "login first");
    }
    return $result;
}

$pageTitle = $_POST["pageTitle"];
$result = getPage($pageTitle);
echo json_encode($result);

?>