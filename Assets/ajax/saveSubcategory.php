<?php
class Ajax
{
    public function connect()
    {
        $db = new mysqli('localhost','root','','personal_finances');
        $db->query("SET NAMES 'utf-8'");
        return $db;

    }

    public function saveAndReturn($name)
    {
        $connection = $this->connect();
        $sql = "INSERT INTO subcategories VALUES(NULL,'{$name}', '{$_SESSION['identity']->id}')";
        $new_sub = $connection->query($sql);

        $saved_sub = false;
        if($new_sub)
        {
            $saved_sub = $new_sub->fetch_object();

        }
        return $saved_sub;
    }



}

if(isset($_POST))
{
    $list_row = "";
    $subcategory = new Ajax();
    $n_subcategory = $subcategory->saveAndReturn($_POST['Sub_name']);


    if($n_subcategory && is_object($n_subcategory))
    {
        $list_row = '<li id="'.$n_subcategory->id.'">'.$n_subcategory->name.'<button class="editSub btn btn-secondary btn-sm float-right">Editar</button><button class="deleteSub btn btn-warning btn-sm float-right">Eliminar</button></li><br />';
    }

    echo $list_row;
}else {
    echo 'mierda';
}