<?php
$this->breadcrumbs=array(
	Language::$processes,
);
?>

<div class="page-header">
	<h1><?php echo Language::$processes; ?></h1>
</div>

<?php 
foreach ($projects as $project) {
	$people = explode(',', $project->people);
	if (in_array($sessionUser->id, $people)){
		$process = processes::model()->findByAttributes(array('project_id'=>$project->id));
		$actOfAcceptance = act_of_acceptance::model()->findByAttributes(array('process_id'=>$process->id));
		if ($actOfAcceptance === null || !$actOfAcceptance->client_validated){
			echo '<a href="' . Yii::app()->request->baseUrl . '/processes/' . $project->id . '">';
			echo $project->title;
			echo ' (' . $project->acronym . ')</a><br>';
		}
	}
}
?>

