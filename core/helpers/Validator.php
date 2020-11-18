<?php 

class Validator 
{
    private $errors = array();

    public function validate($data)
    {
        foreach ($data as $type => $value)
        {
            switch ($type)
            {
                case 'required':
                    if (empty($value))
                    {
                        $this->setErrors(VALIDATOR_REQUIRED);
                    }
                break;
                case 'email':
                    if (empty($value) || !$this->isValidEmail($value))
                    {
                        $this->setErrors(VALIDATOR_EMAIL);
                    }
                break;
                case 'password':
                    if (empty($value) || !$this->isValidPassword($value))
                    {
                        $this->setErrors(VALIDATOR_PASSWORD);
                    }
                break;
            }
        }
    }

    public function printErrors()
    {
        $errors = "<ul>";
        foreach ($this->getErrors() as $error)
        {
            
            $errors .= "<li>" . $error . "</li>";
        }
        $errors .= "</ul>";

        return $errors;
    }

    public function isValid()
    {
        return count($this->getErrors()) == 0;
    }

    private function setErrors($error)
    {
        array_push($this->errors,$error);
    }

    public function getErrors()
    {
        return $this->errors;
    }

    private function isValidEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    private function isValidPassword($password)
    {
        $uppercase = preg_match('@[A-Z]@',$password);
        $lowercase = preg_match('@[a-z]@',$password);
        $number = preg_match('@[0-9]@',$password);

        if (!$uppercase || !$lowercase || !$number || strlen($password) < 8)
        {
            return false;
        }

        return true;
    }
}

?>