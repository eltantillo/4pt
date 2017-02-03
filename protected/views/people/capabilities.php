<?php
$this->pageTitle=Yii::app()->name . ' - ' . Language::$capabilities . ' ' . $model->email;
$this->breadcrumbs=array(
	Language::$people=>array('index'),
	$model->email=>array('view','id'=>$model->id),
	Language::$update,
);
?>

<h1><?php echo Language::$capabilities; ?></h1>

<?php echo $this->renderPartial('_capabilities', array('model'=>$model)); ?>