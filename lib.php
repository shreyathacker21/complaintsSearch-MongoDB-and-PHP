<?php
/**
 * Created by PhpStorm.
 * User: randyjp
 * Date: 5/3/15
 * Time: 10:57 AM
 */

//display all messages of the site
function displayMessages($errors = array(), $success = false)
{
    $output = "";
    if(!empty($errors))
    {
        if($success) $output .= "<div class=\"alert alert-success\">";
        else $output .= "<div class=\"alert alert-danger\">";
        //$output .= "Your form contains the following errors:";
        $output .= "<ul>";
        foreach($errors as $key =>$error)
        {
            $output .= "<li>{$error}</li>";
        }
        $output .= "</ul>";
        $output .= "</div>";
    }
    return $output;
}
