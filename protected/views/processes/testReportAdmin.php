<?php
$this->breadcrumbs=array(
	Language::$processes=>array('index'),
	$project->title=>array($_GET['id']),
	Language::$testReport,
);
?>

<div class="page-header">
	<h1><?php echo Language::$testReport; ?></h1>
</div>

<?php
	echo $this->renderPartial('_formTestReport', array('model'=>$model));
?>