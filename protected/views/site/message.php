<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

?>

<h1>Recuperar contraseña</h1>
<p>Ingrese su dirección de correo electrónico para recuperar su contraseña.</p>

<div class="form">
<form>
	<div class="form-group">
		<label><?php echo Language::$email; ?></label>
		<input class="form-control" type="text" name="email">
	</div>
</form>
</div>