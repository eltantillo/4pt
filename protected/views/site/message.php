<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

?>
<h1>Recuperar contraseña</h1>

<?php if ($message == 0 || $message == 5){ ?>
<?php if ($message == 5){ ?>
<div class="alert alert-danger">
  Las contrasenas ingresadas no coinciden.
</div>
<?php } ?>
<p>Ingrese su nueva contrasena</p>
<div class="form">
<form method="post" id="recover">
	<div class="form-group">
		<label><?php echo Language::$password; ?></label>
		<input class="form-control" type="password" name="password">
	</div>
	<div class="form-group">
		<label><?php echo Language::$password2; ?></label>
		<input class="form-control" type="password" name="password2">
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-success">Cambiar</button>
	</div>
</form>
</div>
<?php } ?>

<?php if ($message == 2){ ?>
<p>Se ha enviado un correo electronico con un enlace para recuperar su cuenta a la direccion de correo electronico proporcionada.</p>
<?php } ?>

<?php if ($message == 3 || $message == 4){ ?>
<?php if ($message == 4){ ?>
<div class="alert alert-danger">
  La dirección de correo electrónico no se encuentra en la base de datos.
</div>
<?php } ?>
<p>Ingrese su dirección de correo electrónico para recuperar su contraseña.</p>

<div class="form">
<form method="post" id="email">
	<div class="form-group">
		<label><?php echo Language::$email; ?></label>
		<input class="form-control" type="text" name="email">
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-success">Recuperar</button>
	</div>
</form>
</div>
<?php } ?>