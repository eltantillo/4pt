<?php
$this->breadcrumbs=array(
	Language::$register,
);
?>

<h1><?php echo Language::$registercompany; ?></h1>

<?php echo $this->renderPartial('_registerForm', array('model'=>$model, 'user'=>$user)); ?>