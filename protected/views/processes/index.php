<?php
$this->breadcrumbs=array(
	'Processes',
);
?>

<h1>Processes</h1>

<?php 
foreach ($projects as $project) {
	echo '<a href="' . Yii::app()->request->baseUrl . '/processes/' . $project->id . '">';
	echo $project->title;
	echo ' (' . $project->acronym . ')</a><br>';
}
?>

