<?php

require_once 'models/CategoryModel.php';

class categoryController
{


    public function index()
    {
        $categoria = new Category();
        $categorias = $categoria->getAll();
        $c_length = $categoria->getCategoriesSize();
        
        require_once 'views/categories/index.php';

    }

    public function save()
    {
        if(isset($_POST))
        {
            $category = new Category();
            $category->setName($_POST['nombre_c']);
            $save = $category->save();

            if($save)
            {
                $_SESSION['newCategory'] = 'complete';
                header('Location:'.base_url.'category/index');
            }else{
                $_SESSION['newCategory'] = 'failed';
                echo 'Algo ha salido mal al guardar los datos';
            }
        }else{
            $_SESSION['newCategory'] = 'failed';
            echo 'Algo ha salido mal al enviar los datos del formulario';
        }
    }

    public function edit()
    {
        if(isset($_POST))
        {
            $id = $_POST['id'];
            $category = new Category();
            $category->setName($_POST['nombre_c']);
            $e_category = $category->edit($id);

            if($e_category)
            {
                $_SESSION['editCategory'] = 'complete';
                header('Location:'.base_url.'category/index');
            }else{
                $_SESSION['editCategory'] = 'failed';
                header('Location:'.base_url.'category/index');
            }

        }
    }

    public function delete()
    {
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $deleted_c = new Category();
            $deleted_c->setId($id);

            $delete = $deleted_c->delete();
            if($delete)
            {
                $_SESSION['deleteCategory'] = 'complete';
                header("Location:".base_url.'category/index');
            }
        }
    }
}
?>