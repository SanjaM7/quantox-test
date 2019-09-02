<?php


class AccountError
{
    const InvalidName = 0;
    const InvalidEmail = 1;
    const InvalidPassword = 2;
    const InvalidPasswordRepeat = 3;
    const EmailTaken = 4;
}

class Account
{
    private $id;
    private $name;
    private $email;
    private $hashedPassword;

    public function __construct($name, $email, $password, $passwordRepeat)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->passwordRepeat = $passwordRepeat;
        $this->hashedPassword = $this->hashPassword($password);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getHashedPassword()
    {
        return $this->hashedPassword;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setHashedPassword($hashedPassword){
        $this->hashedPassword = $hashedPassword;
    }

    private function hashPassword($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public function validate()
    {
        $errors = array();

        if (!preg_match("/^[A-Za-z][A-Za-z\ ]*[A-Za-z]$/", $this->name)) {
            array_push($errors, AccountError::InvalidName);
        }

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, AccountError::InvalidEmail);
        }

        if (strlen($this->password) < 6 || strlen($this->password) > 60) {
            array_push($errors, AccountError::InvalidPassword);
        }

        if ($this->password !== $this->passwordRepeat) {
            array_push($errors, AccountError::InvalidPasswordRepeat);
        }

        return $errors;
    }

    public function isPasswordMatching($password)
    {
        $pwdMatch = password_verify($password, $this->hashedPassword);
        return $pwdMatch;
    }
}
