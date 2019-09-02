<?php

require_once realpath(dirname(__FILE__) . "/../database/db.php");
require_once realpath(dirname(__FILE__) . "/../models/account.php");

class AccountRepository
{
    public function create($account)
    {
        $query = "INSERT INTO accounts VALUES ('', :email, :name, :password)";
        $params = array(
            ":email" => $account->getEmail(),
            ":name" => $account->getName(),
            ":password" => $account->getHashedPassword()
        );

        $id = DB::queryInsert($query, $params);
        $account->setId($id);
    }

    public function isEmailTaken($email)
    {
        $query = "SELECT email FROM accounts WHERE email=:email";
        $params = array(":email" => $email);
        $result = DB::queryExists($query, $params);
        return $result;
    }
    
    public function getAccount($email)
    {
        $query = "SELECT * FROM accounts WHERE email=:email";
        $params = array(":email" => $email);
        $result = DB::querySelect($query, $params);
        if (!$result) {
            return NULL;
        }

        return $this->mapToAccount($result[0]);
    }

    private function mapToAccount($row)
    {
        $id = $row["id"];
        $name = $row["name"];
        $email = $row["email"];
        $hashedPassword = $row["password"];
        $account = new Account($name, $email, null, null);
        $account->setId($id);
        $account->setHashedPassword($hashedPassword);
        return $account;
    }

    public function search($search)
    {
        if(empty($search)){
            return array();
        }
        $query = "SELECT * FROM accounts WHERE name LIKE :name OR email LIKE :email";
        $params = array(
            ":name" => "%" . $search . "%",
            ":email" => "%" . $search . "%"
        );
        $result = DB::querySelect($query, $params);
        if (!$result) {
            return array();
        }

        $accounts = array();
        foreach ($result as $row) {
            $accounts[] = $this->mapToAccount($row);
        }

        return $accounts;
    }

}
