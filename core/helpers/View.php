<?php

Class View
{
    public static function generateUrl($controller,$action)
    {
        $urlString = "index.php?controller=" . $controller . "&action=". $action;
        
        return $urlString;
    }
}

?>