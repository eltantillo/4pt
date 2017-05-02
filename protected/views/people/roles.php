<?php
$this->pageTitle=Yii::app()->name . ' - ' . Language::$roles . ' ' . $model->email;
$this->breadcrumbs=array(
	Language::$people=>array('index'),
	$model->email=>array('view','id'=>$model->id),
	Language::$update,
);
?>

<h1><?php echo Language::$roles; ?></h1>
<p>Seleccione los roles que puede desempeñar la persona</p>

<?php echo $this->renderPartial('_roles', array('model'=>$model)); ?>