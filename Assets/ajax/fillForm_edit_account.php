<?php

class Ajax
{
    public function connect()
    {
        $db = new mysqli('localhost','root','','personal_finances');
        $db->query("SET NAMES 'utf-8'");
        return $db;

    }

    public function FillForm()
    {

        $connect = $this->connect();

        if(isset($_POST))
        {
            if(isset($_POST['id']))
            {
                $a_id = $_POST['id'];

                $sql = "SELECT * FROM accounts WHERE id = ".$a_id."";
                $c_account = $connect->query($sql);

                $name = "";
                if($c_account)
                {
                    $name = $c_account->num_rows;
                    $account_obj = $c_account->fetch_object();
                    if($account_obj)
                    {
                        $name = $account_obj->name;
                    }

                }

                return $name;
            }

        }
    }

}

$string_name = new Ajax();
$response = $string_name->FillForm();

echo $response;
