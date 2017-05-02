<?php
$this->pageTitle=Yii::app()->name . ' - ' . Language::$habilities . ' ' . $model->email;
$this->breadcrumbs=array(
	Language::$people=>array('index'),
	$model->email=>array('view','id'=>$model->id),
	Language::$update,
);
?>

<h1><?php echo Language::$habilities; ?></h1>
<p>Seleccione las habilidades que correspondan a la persona</p>

<?php echo $this->renderPartial('_habilities', array('model'=>$model)); ?>