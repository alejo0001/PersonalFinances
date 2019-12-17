<?php

class Account
{
    private $id;
    private $user_id;
    private $name;
    private $initial_balance;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    function getId()
    {
        return $this->id;
    }

    function getUserId()
    {
        return $this->user_id;
    }

    function getName()
    {
        return $this->name;
    }

    function getBalance()
    {
        return $this->initial_balance;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setUserId($u_id)
    {
        $this->user_id = $u_id;
    }

    function setName($name)
    {
        $this->name = $this->db->real_escape_string($name);
    }

    function setBalance($initial_b)
    {
        $this->initial_balance = $initial_b;
    }

    public function getAll()
    {
        $accounts = $this->db->query("SELECT * FROM accounts");
        return $accounts;
    }

    public function getObject()
    {
        $account = false;
        $sql = "SELECT * FROM accounts WHERE id = '{$this->getId()}'";
        $selected = $this->db->query($sql);
        if($selected && $selected->num_rows == 1)
        {
            $account = $selected->fetch_object();
        }
        return $account;
    }

    public function getDetails()
    {
        $sql = "SELECT * FROM movements WHERE account_id = '{$this->getId()}'";
        $details = $this->db->query($sql);
        return $details;
    }

    public function getSessionCat()
    {
        $sql ="SELECT * FROM categories WHERE user_id = '{$_SESSION['identity']->id}'";
        $cat_list = $this->db->query($sql);
        return $cat_list;
    }

    public function save()
    {

        $sql = "INSERT INTO accounts VALUES(NULL, '{$this->getName()}', '{$this->getUserId()}', '{$this->getBalance()}')";
        $save = $this->db->query($sql);

        $result = false;
        if($save)
        {
            $result = true;
        }
        return $result;
    }

    public function edit($id)
    {
        if(isset($_POST))
        {
            $sql = "UPDATE accounts SET name='{$this->getName()}' WHERE id = '$id'";
            $edit = $this->db->query($sql);

            $result = false;
            if($edit)
            {
                $result = true;
            }

            return $result;
        }

    }

    public function delete()
    {
        $sql = "DELETE FROM accounts WHERE id={$this->id}";
        $delete = $this->db->query($sql);

        $result = false;
        if($delete)
        {
            $result = true;
        }

        return $result;
    }
}