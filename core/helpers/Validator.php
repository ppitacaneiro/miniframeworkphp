<?php 

class Validator
{
    private static $validationsAvaliables = array
    (
        'email' => 'isEmailValid',
        'name' => 'isNameValid'
    );

    public static function validate($input,$type,$message)
    {
        foreach (self::$validationsAvaliables as $key => $method)
        {
            if ($type == $key)
            {
                if (!self::$method($input))
                {
                    return $message;
                }
                
                return false;
            }
        }
    }

    private static function isEmailValid($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    private static function isNameValid($name)
    {
        return preg_match("/^[a-zA-Z-' ]*$/",$name);
    }
}

?>