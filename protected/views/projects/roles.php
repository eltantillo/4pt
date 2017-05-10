<?php
$this->pageTitle=Yii::app()->name . ' - ' . Language::$createProject . ': ' . Language::$assignRoles;
$this->breadcrumbs=array(
	Language::$projects=>array('index'),
	Language::$create,
);
?>

<h1>Asignar No. de Personas con Respecto al Rol</h1>

<?php echo $this->renderPartial('_roles', array('model'=>$model)); ?>