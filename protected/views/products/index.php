<?php
$this->breadcrumbs=array(
	Language::$products,
);
?>

<div class="page-header">
	<h1><?php echo Language::$products; ?></h1>
</div>

<div class="list-group">
<?php 
foreach ($projects as $project) {
	$process = processes::model()->findByAttributes(array('project_id'=>$project->id));
	echo '
		  <a href="' . Yii::app()->request->baseUrl . '/products/' . $project->id . '" class="list-group-item">
		    <h4 class="list-group-item-heading">' . $project->title . '</h4>
		    <p class="list-group-item-text">(' . $project->acronym . ')</p>
		  </a>
		';
}
?>
</div>