<?php
$this->pageTitle=Yii::app()->name . ' - ' . Language::$people;
$this->breadcrumbs=array(
	Language::$people,
);

$this->menu=array(
	array(
		'encodeLabel'=>false,
		'label' => '<a class="btn btn-primary btn-sm" href="' . Yii::app()->baseUrl . '/people/create" role="button"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> ' . Language::$createPerson . '</a>',
		),
	/*array(
		'encodeLabel'=>false,
		'label' => '<a class="btn btn-success btn-sm" href="' . Yii::app()->baseUrl . '/people/admin" role="button"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> ' . Language::$managepeople . '</a>',
		),*/
);
?>

<h1><?php echo Language::$people; ?></h1>

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
<h2>Personas registradas</h2>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
