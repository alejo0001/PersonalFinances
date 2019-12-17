
<div class="container">
 
    <span class="float-right" >Saldo: $ <?=$amount?></span>
    <h1>
        Detalles <?=$id_Account?>
    </h1>
    
    <hr />

   <a href="#pop-up3" class="btn btn-success btn-sm float-right" data-toggle="modal">Añadir</a>
    <br />
    <table id="details_table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Categoría</th>
                <th>Subcategoría</th>
                <th>Valor</th>
                <th>Fecha</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while($movement = $f_movements->fetch_object()):?>
            <tr>
                <td><?=$movement->title;?></td>
                <td><?=$movement->description;?></td>
                <td><?=$movement->category_id;?></td>
                <td><?=$movement->subcategory_id;?></td>
                <td><?=$movement->amount;?></td>
                <td><?=$movement->date;?></td>
                <td>
                    <a href="#pop-up3" class="btn btn-primary btn-sm" data-toggle="modal" name="<?=$movement->id?>">Editar</a>
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                </td>

            </tr>
            <?php endwhile?>         
        </tbody>
        <tr>
            <td></td>
        </tr>
    </table>
</div>

<div class="modal fade" id="pop-up3">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/" method="post">
                <div class="modal-header">
                    <h3 class="modal-title">Nuevo: </h3>
                
                    <select>
                        <option value="">...Seleccione</option>
                        <option value="1">Ingreso</option>
                        <option value="2">Gasto</option>
                    </select>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <label for="title">Título:</label>
                    <input type="text" name="title" value="" />
                    <label for="categoryList">Categoría:</label>
                    <select name="categoryList">
                        <option value="">...Seleccione</option>
                        <?php while($itemCat = $user_cat->fetch_object()):?>
                            <option value="<?=$itemCat->id; ?>"><?=$itemCat->name; ?></option>
                        <?php endwhile?>
                    </select>
                    <label for="subcategories">Subcategoría:</label>
                    <select name="subcategories">
                        <option value="">...Seleccione</option>
                    </select>
                    
                    <label for="description">Descripción:</label>
                    <input type="text" name="description" value="" />
                    <label for="amount">Valor($):</label>
                    <input type="number" step="50" name="amount" value="0.00" />
                    <label for="date">Fecha:</label>
                    <input type="date" name="date" value="" />
                </div>
                <div class="modal-footer">
                    <input type="submit" name="name" value="Aceptar" />
                </div>
            </form>
        </div>
    </div>
</div>


