<?php
$this->breadcrumbs=array(
	'companies'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List companies', 'url'=>array('index')),
	array('label'=>'Create companies', 'url'=>array('create')),
	array('label'=>'View companies', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage companies', 'url'=>array('admin')),
);
?>

<h1>Update companies <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_updateForm', array('model'=>$model)); ?>