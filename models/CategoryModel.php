<?php

class Category
{
    private $id;
    private $name;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    function getId()
    {
        return $this->id;
    }

    function getName()
    {
        return $this->name;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setName($name)
    {
        $this->name = $this->db->real_escape_string($name);
    }

    public function getAll()
    {
        $categories = $this->db->query("SELECT * FROM categories");
        return $categories;
    }

    public function getCategoriesSize()
    {
        $count = $this->db->query("SELECT COUNT(id) AS total FROM categories");


        return $count->fetch_object()->total;

    }

    public function save()
    {
        if(isset($_POST))
        {
            $sql = "INSERT INTO categories VALUES(NULL,'{$this->getName()}','{$_SESSION['identity']->id}')";
            $save = $this->db->query($sql);

            $result = false;
            if($save)
            {
                $result = true;
            }

            return $result;
        }
    }

    public function edit($id)
    {
        if(isset($_POST))
        {
            $sql = "UPDATE categories SET name='{$this->getName()}' WHERE id = '$id'";
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
        $sql = "DELETE FROM categories WHERE id={$this->id}";
        $delete = $this->db->query($sql);

        $result = false;
        if($delete)
        {
            $result = true;
        }

        return $result;
    }


}

