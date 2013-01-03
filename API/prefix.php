<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lancy
 * Date: 4/12/12
 * Time: 1:07 AM
 * To change this template use File | Settings | File Templates.
 */

function connectToDefaultDatabase() {
    $serverName = ":/Applications/MAMP/tmp/mysql/mysql.sock";
    $mysqlUsername = "root";
    $mysqlPassword = "root";
    $databaseName = "mynotes";

    $con = mysql_pconnect($serverName, $mysqlUsername, $mysqlPassword);
    if (!$con)
    {
        die('Could not connect: ' . mysql_error());
    }
    mysql_select_db($databaseName, $con);
    return $con;
}

function fetchArrayWithQueryString($queryString) {
    $result = mysql_query($queryString);
    if ($result) {
        $fetchArray = mysql_fetch_array($result);
        return $fetchArray;
    } else {
        die('Error: ' . mysql_error());
    }
}

function fetchAllWithQueryString($queryString) {
    $result = mysql_query($queryString);
    if ($result) {
        $fetchArray = array();
        while ($object = mysql_fetch_array($result)) {
            array_push($fetchArray, $object[0]);
        }
        return $fetchArray;
    } else {
        die('Error: ' . mysql_error());
    }

}

function queryWithQueryString($queryString) {
    if (mysql_query($queryString)) {
        return true;
    } else {
        die('Error: ' . mysql_error());
    }
}

function getUserWithUsername($username) {
    connectToDefaultDatabase();
    $queryString = "SELECT *
                FROM  `User`
                WHERE  username = '$username'";

    return fetchArrayWithQueryString($queryString);
}

function getUserWithUid($userUid) {
    connectToDefaultDatabase();
    $queryString = "SELECT *
                FROM  `User`
                WHERE  `user_uid` = '$userUid'";
    return fetchArrayWithQueryString($queryString);
}

function deleteUserWithUid($userUid) {
    connectToDefaultDatabase();
    $queryString = "Delete
                FROM  `User`
                WHERE  `user_uid` = '$userUid'";
    return queryWithQueryString($queryString);
}

function addUserWithUsernameAndPassword($username, $password) {
    connectToDefaultDatabase();
    $queryString = "INSERT INTO `User` (username, password)
                VALUES ('$username', '$password')";
    return queryWithQueryString($queryString);
}

function addGroupWithGroupNameAndAdminUid($groupName, $adminUid) {
    connectToDefaultDatabase();
    $queryString = "INSERT INTO `Group` (`group_name`, `admin_uid`)
                    VALUES ('$groupName', '$adminUid');";
    if (!queryWithQueryString($queryString))
        return false;
    $group = getGroupWithGroupName($groupName);
    if (!$group) {
        return false;
    }
    if (!addRelationWithGroupUidAndUserUid($group["group_uid"], $adminUid)) {
        return false;
    }
    return true;
}


function getGroupWithGroupName($groupName) {
    connectToDefaultDatabase();
    $queryString = "SELECT *
                    FROM `Group`
                    WHERE `group_name` = '$groupName'";
    return fetchArrayWithQueryString($queryString);}

function getGroupWithGroupUid($groupUid) {
    connectToDefaultDatabase();
    $queryString = "SELECT *
                    FROM `Group`
                    WHERE `group_uid` = '$groupUid'";
    return fetchArrayWithQueryString($queryString);
}

function deleteGroupWithGroupUid($groupUid) {
    connectToDefaultDatabase();
    $queryString = "Delete
                FROM  `Group`
                WHERE  `group_uid` = '$groupUid'";
    return queryWithQueryString($queryString);
}

function addRelationWithGroupUidAndUserUid($groupUid, $userUid) {
    connectToDefaultDatabase();
    $queryString = "INSERT INTO `User_Group_Relation` (`user_uid`, `group_uid`)
                    VALUES ('$userUid', '$groupUid')";
    return queryWithQueryString($queryString);
}

function deleteRelationWithGroupUidAndUserUid($groupUid, $userUid) {
    connectToDefaultDatabase();
    $queryString = "DELETE FROM `User_Group_Relation`
                    WHERE `User_Group_Relation`.`user_uid` = $userUid AND `User_Group_Relation`.`group_uid` = $groupUid";
    return queryWithQueryString($queryString);
}

function addPageWithPageTitleAndPageTypeAndPageContentAndAuthorUid($pageTitle, $pageType, $pageContent, $authorUid) {
    connectToDefaultDatabase();
    $queryString = "INSERT INTO `Page` (`page_content` ,`author_uid` ,`page_type` ,`page_title`)
                    VALUES ('$pageContent',  '$authorUid',  '$pageType',  '$pageTitle')";
    return queryWithQueryString($queryString);
}



function getPageWithPageUid($pageUid) {
    connectToDefaultDatabase();
    $queryString = "SELECT *
                    FROM Page
                    WHERE `page_uid` = '$pageUid'";
    return fetchArrayWithQueryString($queryString);
}

function getPageWithPageTitle($pageTitle) {
    connectToDefaultDatabase();
    $queryString = "SELECT *
                    FROM Page
                    WHERE `page_title` = '$pageTitle'";
    return fetchArrayWithQueryString($queryString);
}

function deletePageWithPageUid($pageUid) {
    connectToDefaultDatabase();
    $queryString = "DELETE FROM  Page
                WHERE  `page_uid` = '$pageUid'";
    return queryWithQueryString($queryString);
}

function addIssueToPageWithPageUidAndIssueTypeAndIssueContentAndAuthorUidAndIsGroupPublic($pageUid, $issueType, $issueContent, $authorUid, $isGroupPublic)
{
    connectToDefaultDatabase();
    $queryString = "INSERT INTO `Issue` (`issue_type` ,`author_uid` ,`issue_content` ,`page_uid`, `is_group_public`)
                    VALUES ('$issueType',  '$authorUid',  '$issueContent',  '$pageUid', '$isGroupPublic')";
    return queryWithQueryString($queryString);
}

function getIssueWithIssueUid($issueUid) {
    connectToDefaultDatabase();
    $queryString = "SELECT *
                    FROM `Issue`
                    WHERE `issue_uid` = '$issueUid'";
    return fetchArrayWithQueryString($queryString);
}

function deleteIssueWithIssueUid($issueUid) {
    connectToDefaultDatabase();
    $queryString = "DELETE
                FROM  Issue
                WHERE  `issue_uid` = '$issueUid'";
    return queryWithQueryString($queryString);
}

function addTagToPageWithPageUidAndTagContent($pageUid, $tagContent) {
    connectToDefaultDatabase();
    $queryString = "INSERT INTO `Tag` (`page_uid` ,`tag_content`)
                    VALUES ('$pageUid', '$tagContent')";
    return queryWithQueryString($queryString);
}

function getTagWithTagUid($tagUid) {
    connectToDefaultDatabase();
    $queryString = "SELECT *
                    FROM `Tag`
                    WHERE `tag_uid` = '$tagUid'";
    return fetchArrayWithQueryString($queryString);
}

function deleteTagWithTagUid($tagUid) {
    connectToDefaultDatabase();
    $queryString = "DELETE
                FROM  `Tag`
                WHERE  `tag_uid` = '$tagUid'";
    return queryWithQueryString($queryString);
}


function addFriendWithUserUidAndFriendUid($userUid, $friendUid) {
    connectToDefaultDatabase();
    $queryString = "INSERT INTO `Friend_Relation` (`user_uid`, `friend_uid`)
                    VALUES ('$userUid', '$friendUid')";
    queryWithQueryString($queryString);
    $queryString = "INSERT INTO `Friend_Relation` (`user_uid`, `friend_uid`)
                    VALUES ('$friendUid', '$userUid')";
    return queryWithQueryString($queryString);
}

function deleteFriendWithUserUidAndFriendUid($userUid, $friendUid) {
    connectToDefaultDatabase();
    $queryString = "DELETE FROM `Friend_Relation`
                    WHERE `user_uid` = '$userUid' AND `friend_uid` = '$friendUid'";
    queryWithQueryString($queryString);
    $queryString = "DELETE FROM Friend_Relation
                    WHERE `user_uid` = '$friendUid' AND `friend_uid` = '$userUid'";
    return queryWithQueryString($queryString);
}


function getRecentIssueUidArrayWithUserUid($userUid)
{
    connectToDefaultDatabase();
    $queryString = "SELECT `issue_uid`
                    FROM Issue
                    WHERE `author_uid` = '$userUid'
                    ORDER BY `create_timestamp` DESC";
    return fetchArrayWithQueryString($queryString);
}

function getGroupsUidArrayWithUserUid($userUid) {
    connectToDefaultDatabase();
    $queryString = "SELECT `group_uid`
                    FROM `User_Group_Relation`
                    WHERE `user_uid` = '$userUid' ";
    return fetchAllWithQueryString($queryString);
}

function getUsersUidArrayWIthGroupUid($groupUid) {
    connectToDefaultDatabase();
    $queryString = "SELECT `user_uid`
                    FROM `User_Group_Relation`
                    WHERE `group_uid` = '$groupUid' ";
    return fetchAllWithQueryString($queryString);
}

function getFriendsUidArrayWithUserUid($userUid) {
    connectToDefaultDatabase();
    $queryString = "SELECT `user_uid`
                    FROM `Friend_Relation`
                    WHERE `friend_uid` = '$userUid'";
    return fetchAllWithQueryString($queryString);
}

function getAllPagesUidArray() {
    connectToDefaultDatabase();
    $queryString = "SELECT `page_uid`
                    FROM `Page`
                    ORDER BY `create_timestamp` DESC";
    return fetchAllWithQueryString($queryString);
}

function getIssueUidArrayWithUserUidAndPageUid($userUid, $pageUid) {
    connectToDefaultDatabase();
    $queryComment = "SELECT DISTINCT `issue_uid`
                     FROM `Issue`
                     WHERE `Issue`.`page_uid` = '$pageUid'
                     AND `Issue`.`issue_type` = 'comment'";
    $commentsArray = fetchAllWithQueryString($queryComment);
    $queryFriendsIssue = "SELECT DISTINCT `issue_uid`
                     FROM `Issue`, `Friend_Relation`
                     WHERE `Issue`.`page_uid` = '$pageUid'
                     AND `Friend_Relation`.`user_uid` = '$userUid'
                     AND `Issue`.`author_uid` = `Friend_Relation`.`friend_uid`";
    $friendsIssueArray = fetchAllWithQueryString($queryFriendsIssue);
    $queryGroupIssue = "SELECT DISTINCT `issue_uid`
                        FROM `Issue`, `User_Group_Relation` AS `UserA_Group`, `User_Group_Relation` AS `UserB_Group`
                        WHERE `Issue`.`page_uid` = '$pageUid'
                        AND `Issue`.`is_group_public` = 1
                        AND `UserA_Group`.`user_uid` = '$userUid'
                        AND `UserB_Group`.`user_uid` = `Issue`.`author_uid`
                        AND `UserA_Group`.`group_uid` = `UserB_Group`.`group_uid`";
    $groupIssueArray = fetchAllWithQueryString($queryGroupIssue);

    $result = array();
    if ($commentsArray) {
        $result = array_merge(array_diff($result, $commentsArray), $commentsArray);
    }
    if ($friendsIssueArray) {
        $result = array_merge(array_diff($result, $friendsIssueArray), $friendsIssueArray);
    }
    if ($groupIssueArray) {
        $result = array_merge(array_diff($result, $groupIssueArray), $groupIssueArray);
    }

    return $result;
}

function getTagUidArrayWithPageUid($pageUid) {
    connectToDefaultDatabase();
    $queryString = "SELECT `tag_uid`
                    FROM `Tag`
                    WHERE `page_uid` = '$pageUid'";
    return fetchAllWithQueryString($queryString);
}

function getPageUidArrayWithTagUid($tagUid) {
    connectToDefaultDatabase();
    $queryString = "SELECT `page_uid`
                    FROM `Tag`
                    WHERE `tag_uid` = '$tagUid'";
    return fetchAllWithQueryString($queryString);
}

function likePageWithPageUid($pageUid) {
    connectToDefaultDatabase();
    $queryString = "UPDATE `Page`
                    SET `like` = `like` + 1
                    WHERE `page_uid` = '$pageUid'";
    return queryWithQueryString($queryString);
}

function dislikePageWithPageUid($pageUid) {
    connectToDefaultDatabase();
    $queryString = "UPDATE `Page`
                    SET `like` = `like` - 1
                    WHERE `page_uid` = '$pageUid'";
    return queryWithQueryString($queryString);
}

function likeIssueWithIssueUid($issueUid) {
    connectToDefaultDatabase();
    $queryString = "UPDATE `Issue`
                    SET `like` = `like` + 1
                    WHERE `issue_uid` = '$issueUid'";
    return queryWithQueryString($queryString);
}

function dislikeIssueWithIssueUid($issueUid) {
    connectToDefaultDatabase();
    $queryString = "UPDATE `Issue`
                    SET `like` = `like` - 1
                    WHERE `issue_uid` = '$issueUid'";
    return queryWithQueryString($queryString);
}



?>