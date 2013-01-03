<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lancy
 * Date: 3/1/13
 * Time: 2:46 PM
 * To change this template use File | Settings | File Templates.
 */

function logout()
{
    session_unset();
    session_destroy();
    $result = array("message" => "success");
    return $result;
}



$result = logout();
return $result;

?>