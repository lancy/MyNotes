# MyNotes API Document
# Data Manage     API: 
## User Manage
### 1. Get user with user name
#### URL: getUser
#### Post Value:

    <input type="text" name="username">

#### Return Value:
Dictionary: User

    {
        "user_uid":"2",
        "username":"lancy",
        "password":"123",
        "is_admin":"0"
    }
    
#### Note:
$result = array("message" => "login first")

----
### 2. Get user with user uid
#### URL: getUserUid
#### Post Value:

    <input type="text" name="userUid">

#### Return Value:
Dictionary: User

    {
        "user_uid":"2",
        "username":"lancy",
        "password":"123",
        "is_admin":"0"
    }

----
### 3. Delete user with user uid
#### URL: deleteUser
#### Post Value:

    <input type="text" name="userUid">

#### Return Value:
Dictionary: message

    $result = array("message" => "success");
    $result = array("message" => "fail");
    $result = array("message" => "not system admin");


## Group Manage
###  1. Create Group With Group Name
#### URL: createGroup
#### Post Value:
    <input type="text" name="groupName">
#### Return Value:
    $result = array("message" => "success");
    $result = array("message" => "fail");
    $result = array("message" => "login first");


----
###   2. Get group with group name
#### URL: getGroup
#### Post Value:
    <input type="text" name="groupName">
#### Return Value:
    {
        "group_uid":"2",
        "group_name":"AppleClub",
        "admin_uid":"2"
    }

----
###   3. Get group with group uid
#### URL: getGroupUid
#### Post Value:
    <input type="text" name="groupUid">
#### Return Value:
    {
        "group_uid":"2",
        "group_name":"AppleClub",
        "admin_uid":"2"
    }


----
###   4. Delete group with group uid
#### URL: deleteGroup
#### Post Value:
    <input type="text" name="groupUid">
#### Return Value:
Dictionary: message

    $result = array("message" => "success");
    $result = array("message" => "fail");
    $result = array("message" => "not admin");


----
###   5. Add Group Member With Group uid and User uid
#### URL: addGroupMember
#### Post Value:
    <input type="type" name="groupUid">
    <input type="type" name="toAddUserUid">
#### Return Value:
    $result = array("message" => "success");
    $result = array("message" => "fail");
    $result = array("message" => "not group admin");


----
###   6. Remove Group Member With Group uid and User uid
#### URL: removeGroupMember
#### Post Value:
    $groupUid = $_POST["groupUid"];
    $toRemoveUserUid = $_POST["toRemoveUserUid"];
#### Return Value:
    $result = array("message" => "success");
    $result = array("message" => "fail");
    $result = array("message" => "not group admin");



## Page Manage
###   1. Add Page With Page Title And Page Type And Page Content
#### URL: addPage
#### Post Value:
    <input type="text" name="pageTitle">
    <input type="radio" name="pageType" value="book" checked="checked">
    <input type="radio" name="pageType" value="webpage">
    <input type="radio" name="pageType" value="paper">
    <textarea name="pageContent"></textarea>

#### Return Value:
    $result = array("message" => "success");
    $result = array("message" => "fail");
    $result = array("message" => "login first");

----

###   2. Get page with page uid
#### URL: getPage
#### Post Value:
    <input type="text" name="pageUid">
#### Return Value:
    {
        "page_uid":"1",
        "page_content":"good day",
        "author_uid":"2",
        "page_type":"book",
        "page_title":"Hello World"
    }
----

###   3. Delete Page with page uid
#### URL: deletePage
#### Post Value: 
    <input type="text" name="pageUid">

#### Return Value:
    $result = array("message" => "success");
    $result = array("message" => "fail");
    $result = array("message" => "not page author");
    
###   4. Get page with page title
#### URL: getPageTitle
#### Post Value:
    <input type="text" name="pageTitle">
#### Return Value:
    {
        "page_uid":"1",
        "page_content":"good day",
        "author_uid":"2",
        "page_type":"book",
        "page_title":"Hello World"
    }
----
    


## Issue Manage
###   1. addIssueToPageWithPageUidAndIssueTypeAndIssueContentAndIsGroupPublic
#### URL: addIssue
#### Post Value:
    Add Issue<br>
    Page Uid:<input type="text" name="pageUid"><br>
    Issue Type:
    <input type="radio" name="issueType" value="note" checked="checked"> note
    <input type="radio" name="issueType" value="comment"> comment <br>
    Issue Content:
    <textarea name="issueContent"></textarea>
    Is group public:
    <input type="checkbox" name="isGroupPublic" checked="checked">

#### Return Value:
    $result = array("message" => "success");
    $result = array("message" => "fail");
    $result = array("message" => "login first");

----

###   2. getIssueWithIssueUid
#### URL: getIssue
#### Post Value:
    <input type="text" name="issueUid">
#### Return Value:
    {
        "issue_uid":"2",
        "author_uid":"1",
        "issue_type":"note",
        "issue_content":"nice",
        "page_uid":"1",
        "is_group_public":"0"
    }
----

###   3. deleteIssueWithIssueUid
#### URL: deleteIssue
#### Post Value:
    <input type="text" name="issueUid">
#### Return Value:
    $result = array("message" => "success");
    $result = array("message" => "fail");
    $result = array("message" => "not issue author");

----

## Tag Manage
###   1. addTagToPageWithPageUidAndTagContent
#### URL: addTag
#### Post Value:
    $pageUid = $_POST["pageUid"];
    $tagContent = $_POST["tagContent"];

#### Return Value:
    $result = array("message" => "success");
    $result = array("message" => "fail");
    $result = array("message" => "login first");

----

###   2. getTagWithTagUid
#### URL: getTag
#### Post Value:
    $tagUid = $_POST["tagUid"];

#### Return Value:
    {
        "tag_uid":"1",
        "page_uid":"1"
        tag_content":"ok"
    }
----

###   3. deleteTagWithTagUid
#### URL: deleteTag
#### Post Value:
    $tagUid = $_POST["tagUid"];

#### Return Value:
    $result = array("message" => "success");
    $result = array("message" => "fail");
    $result = array("message" => "not admin");

----

## Friend Manage
###   1. add friend with friend uid
#### URL: addFriend
#### Post Value:
    $friendUid = $_POST["friendUid"];
#### Return Value:
    $result = array("message" => "success");
    $result = array("message" => "fail");
    $result = array("message" => "login first");

----

###   2. delete friend with friend uid
#### URL: deleteFriend
#### Post Value:
    $friendUid = $_POST["friendUid"];
#### Return Value:
    $result = array("message" => "success");
    $result = array("message" => "fail");
    $result = array("message" => "login first");
----


# Service Logic API:

## User:
###   1. registerWithUsernameAndPassword
#### URL: register
#### Post Value:
    Username:<input type="text" name="username"><br>
    Password:<input type="password" name="password"><br>

#### Return Value:
        $result = array("message" => "success");
        $result = array("message" => "fail");

----

###   2. loginWithUsernameAndPassword
#### URL: login
#### Post Value:
    Username:<input type="text" name="username"><br>
    Password:<input type="password" name="password"><br>

#### Return Value:
        $result = array("message" => "success");
        $result = array("message" => "fail");

----

###   3. getRecentIssueUidArrayWithUserUid (deprecated)
#### URL: 
#### Post Value:
#### Return Value:

----

###   4. logout
#### URL: logout
#### Post Value:
#### Return Value:
    $result = array("message" => "success");

----

## Group
###   1. groupsUidArrayWithUserUid
#### URL: getMyGroups
#### Post Value:
#### Return Value:
一个group uid array

----

###   2. usersUidArrayWithGroupUid
#### URL: getGourpMembers
#### Post Value:
    $groupUid = $_POST["groupUid"];

#### Return Value:
一个user uid array

----

## Friend:
###   1. getFriendsUidArray
#### URL: getMyFriends
#### Post Value:    
#### Return Value:
一个user uid array

----

## Page:
###   1. get all Page Uid Array
#### URL: getAllPages
#### Post Value:
#### Return Value:
一个page uid array

----

## Issue:
###   1. getIssueUidArrayWithPageUid (封装了逻辑，只会得到当前登录用户能看到的，公开的，好友的，组公开的）
#### URL: getIssueArray    
#### Post Value:
#### Return Value:
一个issue uid array

----

## Tag:
###   1. getTagUidArrayWithPageUid
#### URL: getTagArray
#### Post Value:
    $pageUid = $_POST["pageUid"];
#### Return Value:
一个tag uid array

----

###   2. getPageUidArrayWithTagUid
#### URL: getPageArray
#### Post Value:
     $tagUid = $_POST["tagUid"];
#### Return Value:
一个page uid array

----

## Like:

### likePage
#### URL: likePage
#### Post Value:
    $pageUid = $_POST["pageUid"];
#### Return Value:
    $result = array("message" => "success");
    $result = array("message" => "fail");
    $result = array("message" => "login first");
----

### dislikePage
#### URL: dislikePage
#### Post Value:
    $pageUid = $_POST["pageUid"];
#### Return Value:
    $result = array("message" => "success");
    $result = array("message" => "fail");
    $result = array("message" => "login first");
----

### likeIssue
#### URL: likeIssue
#### Post Value:
    $issueUid = $_POST["issueUid"];
#### Return Value:
    $result = array("message" => "success");
    $result = array("message" => "fail");
    $result = array("message" => "login first");
----

### dislikeIssue
#### URL: dislikeIssue
#### Post Value:
    $issueUid = $_POST["issueUid"];
#### Return Value:
    $result = array("message" => "success");
    $result = array("message" => "fail");
    $result = array("message" => "login first");
----

## New API

### get page uid array with user uid
#### URL: getUserPage
#### Post Value:
    $userUid = $_POST["userUid"];
#### Return value:
一个page uid array

----

### join group with group uid
#### URL: joinGroup
#### Post Value:
    $groupUid = $_POST["groupUid"];
#### Return value
    $result = array("message" => "success");
    $result = array("message" => "fail");
    $result = array("message" => "login first");


### get top note
#### URL: getTopNote
#### Post Value:
#### Return Value:
    issue data model….(you know what)

### get top comment
#### URL: getTopComment
#### Post Value:
#### Return Value:
    issue data model….(you know what)

