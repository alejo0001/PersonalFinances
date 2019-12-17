<h1>Registrarse</h1>


<?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete') : ?>
    <strong class="alert_green">Registro completado correctamente</strong>
<?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
    <strong class="alert_red">Registro fallido, introduce bien los datos</strong>
<?php endif; ?>

<?php Utils::deleteSession('register'); ?>

<form action="<?=base_url?>user/save" method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" required/>
    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos" required/>
    <label for="Email">Email</label>
    <input type="email" name="Email" required/>
    <label for="clave">Clave</label>
    <input type="password" name="clave" required/>
    <input type="submit" value="Registrarse"/>
</form>