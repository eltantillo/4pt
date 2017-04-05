<?php
$this->breadcrumbs=array(
	Language::$processes=>array('index'),
	$project->title=>array($_GET['id']),
	Language::$softwareComponents,
);
?>

<div class="page-header">
	<h1><?php echo Language::$softwareComponents; ?></h1>
</div>

<?php
	echo $this->renderPartial('_softwareDesignInput', array('softwareDesign'=>$softwareDesign,));
	/*echo $this->renderPartial('_traceabilityRecordInput', array('traceabilityRecord'=>$traceabilityRecord,)) . '<br><br>';*/
	echo $this->renderPartial('_formSoftwareComponent', array('model'=>$model));
?>