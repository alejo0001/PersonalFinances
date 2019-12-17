<?php

require_once 'models/UserModel.php';

class userController
{
    public function index()
    {
        echo "Controlador Usuarios, Acción index";
    }

    public function registration()
    {
        require_once 'views/users/registration.php';
    }

    public function save()
    {
        if(isset($_POST))
        {

            $name = isset($_POST['nombre']) ? $_POST['nombre'] : false;    
            $lastName = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
            $email = isset($_POST['Email']) ? $_POST['Email'] : false;
            $password = isset($_POST['clave']) ? $_POST['clave'] : false;

            if($name && $lastName && $email && $password)
            {
                $usuario = new User();
                $usuario->setName($name);
                $usuario->setLastName($lastName);
                $usuario->setEmail($email);
                $usuario->setPassword($password);

            
                $save = $usuario->save();
                if($save){
                    $_SESSION['register'] = "complete";
                }else{
                    $_SESSION['register'] = "failed";
                }
            }else{
                $_SESSION['register'] = "failed";
            }
        }else{
            $_SESSION['register'] = "failed";
        }
        header("Location:".base_url.'user/registration');
    }

    public function login()
    {
        if(isset($_POST))
        {
            //Identificar al usuario
            //Consulta a la base de datos
            $usuario = new User();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);

            $identity = $usuario->login();

            if($identity && is_object($identity))
            {
                $_SESSION['identity'] = $identity;

                if($identity->role == 'admin')
                {
                    $_SESSION['admin'] = true;
                }
            }else{
                $_SESSION['error_login'] = 'Identificación fallida !!';
            }
            //Crear una sesión
        }
        header("Location:".base_url);
    }

    public function logout()
    {
        if(isset($_SESSION['identity']))
        {
            unset($_SESSION['identity']);
        }

        if(isset($_SESSION['admin']))
        {
            unset($_SESSION['admin']);
        }

        header("Location:".base_url);
    }
}

?>