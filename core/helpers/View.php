<?php

Class View
{
    public static function generateUrl($controller,$action)
    {
        $urlString = "index.php?controller=" . $controller . "&action=". $action;
        
        return $urlString;
    }

    public static function sanitize($input)
    {
        $inputSanitized = trim($input);
        $inputSanitized = htmlspecialchars($inputSanitized);

        return $inputSanitized;
    }

    public static function setValueInputText($nameInputText)
    {
        return (isset($_POST[$nameInputText])) ? $_POST[$nameInputText] : '';
    }
}

?>