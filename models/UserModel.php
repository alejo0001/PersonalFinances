<?php
class User
{
    private $id;
    private $name;
    private $last_name;
    private $email;
    private $password;
    private $role;
    private $image;
    private $db;

    public function __construct(){
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

    function getLastName()
    {
        return $this->last_name;
    }

    function getEmail()
    {
        return $this->email;
    }

    function getPassword()
    {
        return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
    }

    function getRole()
    {
        return $this->role;
    }

    function getImage()
    {
        return $this->image;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setName($name)
    {
        $this->name = $this->db->real_escape_string($name);
    }

    function setLastName($last_name)
    {
        $this->last_name = $this->db->real_escape_string($last_name);
    }

    function setEmail($email)
    {
        $this->email = $this->db->real_escape_string($email);
    }

    function setPassword($password)
    {
        $this->password = $password;
    }

    function setRole($role)
    {
        $this->role = $role;
    }

    function setImage($image)
    {
        $this->image = $image;
    }

    public function save()
    {
        $sql = "INSERT INTO users VALUES(NULL, '{$this->getName()}', '{$this->getLastName()}', '{$this->getEmail()}', '{$this->getPassword()}', 'user', null )";
        $save = $this->db->query($sql);

        $result = false;
        if($save)
        {
            $result = true;
        }
        return $result;
    }

    public function login()
    {
        $result = false;
        $email = $this->email;
        $password = $this->password;

        //Comprobar si existe el usuario
        $sql =  "SELECT * FROM users WHERE email = '$email'";
        $login = $this->db->query($sql);

        if($login && $login->num_rows==1)
        {
            $usuario = $login->fetch_object();


            //Verificar la contraseņa
            $verify = password_verify($password, $usuario->password);

            if($verify)
            {
                $result = $usuario;
            }

        }
        return $result;
    }

}


?>