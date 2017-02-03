<?php
$this->pageTitle=Yii::app()->name . ' - ' . Language::$roles . ' ' . $model->email;
$this->breadcrumbs=array(
	Language::$people=>array('index'),
	$model->email=>array('view','id'=>$model->id),
	Language::$update,
);
?>

<h1><?php echo Language::$roles; ?></h1>

<?php echo $this->renderPartial('_roles', array('model'=>$model)); ?>