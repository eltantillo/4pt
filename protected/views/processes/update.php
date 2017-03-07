<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	'Project'=>array($_GET['id']),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List processes', 'url'=>array('index')),
	array('label'=>'Create processes', 'url'=>array('create')),
	array('label'=>'View processes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage processes', 'url'=>array('admin')),
);
?>

<h1>Update processes <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>