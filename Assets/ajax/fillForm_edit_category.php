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
                $c_id = $_POST['id'];

                
                $sql2 = "SELECT c.name AS cat_name, s.name AS sub_name, s.id AS sub_id FROM categories c LEFT JOIN subcategories s ON s.category_id = c.id WHERE c.id = ".$c_id."";
                $c_cat = $connect->query($sql2);

                $name = "";
                if($c_cat)
                {
                    $arr_category = array();
                    while($join_row = $c_cat->fetch_object())
                    {
                        $arr_category[] = $join_row;
                    }
                   
                    $name = json_encode($arr_category);
                }

                return $name;
            }

        }
    }

}

$s_name = new Ajax();
$response = $s_name->FillForm();

echo $response;






?>

