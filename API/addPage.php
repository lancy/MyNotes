<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lancy
 * Date: 4/12/12
 * Time: 5:28 PM
 * To change this template use File | Settings | File Templates.
 */

include "prefix.php";

function addPageWithPageTitleAndPageTypeAndPageContent($pageTitle, $pageContent, $pageType) {
    session_start();
    $authorUid = $_SESSION["userUid"];
    if ($authorUid) {
        $result = array("message" => "success");
        if (!addPageWithPageTitleAndPageTypeAndPageContentAndAuthorUid($pageTitle, $pageType, $pageContent, $authorUid)) {
            $result = array("message" => "fail");
        }
    } else {
            $result = array("message" => "login first");
    }
    return $result;
}

$pageTitle = $_POST["pageTitle"];
$pageContent = $_POST["pageContent"];
$pageType = $_POST["pageType"];
$result = addPageWithPageTitleAndPageTypeAndPageContent($pageTitle, $pageContent, $pageType);
echo json_encode($result);

?>