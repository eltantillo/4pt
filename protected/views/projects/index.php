<?php
$this->pageTitle=Yii::app()->name . ' - ' . Language::$projects;
$this->breadcrumbs=array(
	Language::$projects,
);

$this->menu=array(
	array(
		'encodeLabel'=>false,
		'label' => '<a class="btn btn-primary btn-sm" href="' . Yii::app()->baseUrl . '/projects/create" role="button"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> ' . Language::$createProject . '</a>',
		),
	array(
		'encodeLabel'=>false,
		'label' => '<a class="btn btn-warning btn-sm" href="' . Yii::app()->baseUrl . '/projects/createTemplate" role="button"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> ' . Language::$createTemplate . '</a>',
		),
);
?>

<h1><?php echo Language::$projects; ?></h1>

<div class="span-5 last">
	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			//'title'=>Language::$operations,
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
	</div><!-- sidebar -->
</div>
<hr>
<h2>Proyectos actuales</h2>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
