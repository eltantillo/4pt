<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	'Project'=>array($_GET['id']),
	'Create',
);

$this->menu=array(
	array('label'=>'List processes', 'url'=>array('index')),
	array('label'=>'Manage processes', 'url'=>array('admin')),
);
?>

<h1>Create processes</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>