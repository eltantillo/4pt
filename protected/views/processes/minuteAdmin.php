<?php
$this->breadcrumbs=array(
	Language::$processes=>array('index'),
	$project->title=>array($_GET['id']),
	Language::$minutes,
);
?>

<div class="page-header">
	<h1><?php echo Language::$minutes; ?></h1>
</div>

<?php echo $this->renderPartial('_formMinutes', array('model'=>$model, 'sessionUser'=>$sessionUser)); ?>