<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	$model->id,
);
?>

<h1><?php echo $model->title . ' (' . $model->acronym . ')'; ?></h1>


<a href="workstatement/<?php echo $model->id; ?>">Enunciado de trabajo</a>