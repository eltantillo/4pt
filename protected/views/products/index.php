<?php
$this->breadcrumbs=array(
	Language::$products,
);
?>

<div class="page-header">
	<h1><?php echo Language::$products; ?></h1>
</div>

<?php 
foreach ($projects as $project) {
	$process = processes::model()->findByAttributes(array('project_id'=>$project->id));
	$actOfAcceptance = act_of_acceptance::model()->findByAttributes(array('process_id'=>$process->id));
	if ($actOfAcceptance != null && $actOfAcceptance->client_validated){
		echo '<a href="' . Yii::app()->request->baseUrl . '/products/' . $project->id . '">';
		echo $project->title;
		echo ' (' . $project->acronym . ')</a><br>';
	}
}
?>

