<?php
$this->pageTitle=Yii::app()->name . ' - ' . Language::$update . ' ' . $model->email;
$this->breadcrumbs=array(
	Language::$people=>array('index'),
	$model->email=>array('view','id'=>$model->id),
	Language::$update,
);
?>

<h1><?php echo Language::$generalInformation; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>