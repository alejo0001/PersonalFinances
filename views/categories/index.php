
<div class="info">
    <h1>Gestión Categorías</h1>
    
    <hr />

    <?php if(isset($_SESSION['newCategory']) && $_SESSION['newCategory'] == 'complete') :?>
    <input type="hidden" id="saveCategoryState" value="1" />

    <?php elseif (isset($_SESSION['newCategory']) && $_SESSION['newCategory'] == 'failed'): ?>
    <input type="hidden" id="saveCategoryState" value="2" />

    <?php endif; ?>
    <?php Utils::deleteSession('newCategory');?>

    <?php if(isset($_SESSION['editCategory']) && $_SESSION['editCategory'] == 'complete') :?>
    <input type="hidden" id="editCategoryState" value="1" />

    <?php elseif (isset($_SESSION['editCategory']) && $_SESSION['editCategory'] == 'failed'): ?>
    <input type="hidden" id="editCategoryState" value="2" />

    <?php endif; ?>
    <?php Utils::deleteSession('editCategory');?>

    <?php if(isset($_SESSION['deleteCategory']) && $_SESSION['deleteCategory'] == 'complete'): ?>
    <input type="hidden" name="deleteCategoryState" id="deleteCategoryState" value="1" />

    <?php elseif (isset($_SESSION['deleteCategory']) && $_SESSION['deleteCategory'] == 'failed'): ?>
    <input type="hidden" name="deleteCategoryState" id="deleteCategoryState" value="2" />

    <?php endif; ?>
    <?php Utils::deleteSession('deleteCategory');?>


    <div class="container">
        <div class="header-options">
            <a href="#pop-up2" id="add_category" class="btn btn-primary btn-md float-right" data-toggle="modal">Nueva Categoría</a>
        </div>


        <br />
        <ul class="item-list">
            <input type="hidden" id="categories_length" value="<?= $categoria->getCategoriesSize(); ?>" />

            <?php while($cat = $categorias->fetch_object()):?>

            <li id="item">


                <?= $cat->name; ?>
                <br />
                <a href="#pop-up2" class="edit_category btn btn-primary btn-md" data-toggle="modal" name="<?=$cat->id;?>">Editar</a>
                <input type="button" onclick="deleteCategory('<?=base_url?>category/delete&id=<?=$cat->id?>');" id="deleteCategoryButton" value="Eliminar" />


            </li>
            <?php endwhile ?>
        </ul>
    </div>
</div>

<?php $url_action = base_url.'category/save'; ?>


<!-- Modal: -->

<div id="pop-up2" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Nueva Categoría</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
                <form action="<?=$url_action?>" id="categoryForm" method="post">
                    <div class="modal-body" id="cat_modal_body">
                        <input type="hidden" name="id" id="id" value="" />
                        <label for="nombre_c">Nombre de la Categoría:</label>
                        <input type="text" id="nombre_c" name="nombre_c" value="" required />
                        <input type="button" id="newSub" value="Nueva Subcategoría" />
                        <br />
                        <div id="newSubField" style="display: none;">

                        
                            <a class="btn btn-primary btn-sm float-right" id="createSub">Crear</a>
                            <input class="w-75" type="text" name="n_newSub" value="" id="n_newSub" />
                        

                        </div>
                        <span>Subcategorías:</span>
                        <div class="container">
                            <ul id="SubcategoryList">
                                
                            </ul>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="done" value="Aceptar" />
                    </div>                
                </form>
        </div>
    </div>    
</div>


<script type="text/javascript">
    function deleteCategory(route)
    {

       alertify.confirm('Eliminar Categoría', 'Desea eliminar la categoría y toda su información?', function () {
           window.location.href = route;
       }, function () { }).setting({
        'labels': {
            ok: 'Aceptar',
            cancel: 'Cancelar',
       },
        'reverseButtons' :true,
       });

    }
</script>