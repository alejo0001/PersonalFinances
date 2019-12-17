<?php

require_once 'models/AccountModel.php';
require_once 'models/CategoryModel.php';

class accountController
{
    public function index()
    {
        $account = new Account();
        $accounts = $account->getAll();
        require_once 'views/accounts/principal.php';

    }

    public function details()
    {
        $id_Account = "";
        $amount = "";
        $f_movements = false;
        $user_cat = false;
        if(isset($_POST))
        {
            if(isset($_POST["a_itemId"]))
            {
                $account = new Account();
                $account->setId($_POST["a_itemId"]);
                $s_account = $account->getObject();
                $f_movements = $account->getDetails();
                $user_cat = $account->getSessionCat();
                
                if($account && is_object($account))
                {
                    $id_Account = $s_account->name;
                    $amount = $s_account->initial_balance;
                }

            }

        }

        require_once 'views/accounts/details.php';

    }

    public function save()
    {
        $identity = $_SESSION['identity'];

        if($identity && is_object($identity))
        {
            if(isset($_POST))
            {
                $name = isset($_POST['nombre_c']) ? $_POST['nombre_c'] : false;
                $i_balance = isset($_POST['saldo_i']) ? $_POST['saldo_i'] : false;

                if($name && $i_balance)
                {
                    $new_a = new Account();
                    $new_a->setName($name);
                    $new_a->setUserId((int) $identity->id);
                    $new_a->setBalance((float) $i_balance);



                    $save = $new_a->save();
                    if($save)
                    {
                        $_SESSION['newAccount'] = "complete";
                        header("Location:".base_url);
                    }
                }else{
                    $_SESSION['newAccount'] = "failed";
                    echo "<span>Lo sentimos, algo ha pasado con los tipos de datos guardados</span>";
                }
            }else{
                $_SESSION['newAccount'] = "failed";
                echo "<span>Lo sentimos, algo falló en el envío del formulario</span>";
            }
        }else{
            $_SESSION['newAccount'] = "failed";
            echo "<span>Lo sentimos, al parecer no hay una sesión iniciada</span>";
        }

    }

    public function edit()
    {
        if(isset($_POST))
        {
            $id = $_POST['id'];
            $account = new Account();
            $account->setName($_POST['nombre_c']);
            $e_account = $account->edit($id);

            if($e_account)
            {
                $_SESSION['editAccount'] = 'complete';
                header('Location:'.base_url);
            }else{
                $_SESSION['editAccount'] = 'failed';
                header('Location:'.base_url);
            }

        }
    }

    public function delete()
    {
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $deleted_a = new Account();
            $deleted_a->setId($id);

            $delete = $deleted_a->delete();
            if($delete)
            {
                $_SESSION['deleteAccount'] = 'complete';
                header("Location:".base_url);
            }
        }
    }
}
?>