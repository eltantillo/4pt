<?php
$this->breadcrumbs=array(
	Language::$processes=>array('index'),
	$project->title=>array($_GET['id']),
	Language::$correctiveActions,
);
?>

<div class="page-header">
	<h1><?php echo Language::$correctiveActions; ?></h1>
</div>

<?php
	echo $this->renderPartial('_formCorrectiveActions', array('model'=>$model,'project'=>$project));
?>