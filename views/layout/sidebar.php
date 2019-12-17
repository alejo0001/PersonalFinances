<aside id="lateral">
	<div id="login" class="block_aside">

        <?php if(!isset($_SESSION['identity'])):?>
        <h3>Ingresar</h3>
		<form action="<?=base_url?>user/login" method="post">
			<label for="email">Email</label>
			<input type="email" name="email"/>
			<label for="password">Clave</label>
			<input type="password" name="password"/>
			<input type="submit" value="Ingresar" />
		</form>
        <?php else:?>
        <h3><?=$_SESSION['identity']->name?> <?=$_SESSION['identity']->last_name?></h3>
        <br />
         <ul>
            <li><a href="<?=base_url?>user/logout">Cerrar Sesion</a></li>
        </ul>
        <?php endif ?>
        
	</div>
</aside>

<div id="central">