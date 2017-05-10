<?php
$this->pageTitle=Yii::app()->name . ' - ' . Language::$createProject . ': ' . Language::$assignpeople;
$this->breadcrumbs=array(
	Language::$projects=>array('index'),
	Language::$create,
);
?>

<h1><?php echo Language::$assignpeople; ?></h1>

<p>Seleccione el personal que desee asignar al proyecto.</p>

<?php echo $this->renderPartial('_people', array('model'=>$model)); ?>