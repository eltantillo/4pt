<?php
$this->pageTitle=Yii::app()->name . ' - ' . Language::$update . ' ' . $model->title;
$this->breadcrumbs=array(
	Language::$projects=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	Language::$update,
);
?>

<h1><?php echo Language::$updateProject . ' ' . $model->title; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>