<div class="info">
    <h1>Mis Cuentas</h1>
   
    <hr />
   
    <?php if(isset($_SESSION['newAccount']) && $_SESSION['newAccount'] == 'complete') :?>
    <input type="hidden" name="saveAccountState" id="saveAccountState" value="1" />
   
    <?php elseif (isset($_SESSION['newAccount']) && $_SESSION['newAccount'] == 'failed'): ?>
    <input type="hidden" name="saveAccountState" id="saveAccountState" value="2" />
   
    <?php endif; ?>
    <?php Utils::deleteSession('newAccount');?>


    <?php if(isset($_SESSION['editAccount']) && $_SESSION['editAccount'] == 'complete') :?>
    <input type="hidden" id="editAccountState" value="1" />

    <?php elseif (isset($_SESSION['editAccount']) && $_SESSION['editAccount'] == 'failed'): ?>
    <input type="hidden" id="editAccountState" value="2" />

    <?php endif; ?>
    <?php Utils::deleteSession('editAccount');?>


    <?php if(isset($_SESSION['deleteAccount']) && $_SESSION['deleteAccount'] == 'complete'): ?>
    <input type="hidden" name="deleteAccountState" id="deleteAccountState" value="1" />

    <?php elseif (isset($_SESSION['deleteAccount']) && $_SESSION['deleteAccount'] == 'failed'): ?>
    <input type="hidden" name="deleteAccountState" id="deleteAccountState" value="2" />

    <?php endif; ?>
    <?php Utils::deleteSession('deleteAccount');?>
   
    
   
    <div class="container">
        <div class="header-options">
            <a href="#pop-up1" id="add_account" class="btn btn-primary btn-md float-right" data-toggle="modal">Nueva Cuenta</a>
        </div>
       

        <ul class="item-list">


            <?php while($account = $accounts->fetch_object()):?>
            <li class="account_item" id="account_item">
                <form action="<?=base_url?>account/details" method="post" class="detailsForm">
                    <input type="hidden" name="a_itemId" id="" value="<?=$account->id;?>" />
                </form>
                <?= $account->name; ?>
                <br />
                <label for="balance">Saldo</label>
                <span name="balance">
                    $ <?= $account->initial_balance; ?>
                </span>
                <a href="#pop-up1" class="edit_account btn btn-primary btn-md" data-toggle="modal" name="<?=$account->id;?>">Editar</a>
                <input type="button" onclick="deleteAccount('<?=base_url?>account/delete&id=<?=$account->id?>');" id="deleteAccountButton" value="Eliminar" />
            </li>

            <?php endwhile ?>


        </ul>

    </div>
</div>

<div id="pop-up1" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Nueva Cuenta</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden ="true">&times;</button>
                
            </div>
            <form action="<?=base_url?>account/save" id="account_form" method="post">
                <div class="modal-body">


                    <input type="hidden" name="id" id="id_a" value="" />
                    <label for="nombre_c">Nombre de la Cuenta</label>
                    <input type="text" name="nombre_c" id="nombre_c" value="" required/ />
                    <div id="ammountField">
                        <label for="saldo_i">Saldo Inicial ($)</label>
                        <input type="number" step="50" name="saldo_i" value="0.00" />
                    </div>



                </div>
                <div class="modal-footer">
                    <input type="submit" id="account_submit" name="done" value="Aceptar" />
                </div>
            </form>
        </div>
    </div>
    
</div>

<script type="text/javascript">
    function deleteAccount(route)
    {
       
       alertify.confirm('Eliminar Cuenta', 'Desea eliminar la cuenta y toda su información?', function () {
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