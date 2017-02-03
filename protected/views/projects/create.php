<?php
$this->pageTitle=Yii::app()->name . ' - ' . Language::$createProject;
$this->breadcrumbs=array(
	Language::$projects=>array('index'),
	Language::$create,
);
?>

<h1><?php echo Language::$createProject; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>