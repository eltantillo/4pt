<?php
$this->pageTitle=Yii::app()->name . ' - ' . Language::$view . ' ' . $model->title;
$this->breadcrumbs=array(
	Language::$projects=>array('index'),
	$model->title,
);

$this->menu=array(
	array(
		'encodeLabel'=>false,
		'label' => '<a class="btn btn-primary btn-sm" href="' . Yii::app()->baseUrl . '/projects/update/' . $model->id  . '" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar proyecto</a>',
	),
	array(
		'url'=>Yii::app()->baseUrl . '/projects/delete/' . $model->id,
		'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('zii',Language::$deleteConfirm)),
		'encodeLabel'=>false,
		'label' => '<form method="POST" action="' . Yii::app()->baseUrl . '/projects/delete/' . $model->id . '"><button class="btn btn-danger btn-sm delete" type="submit"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar proyecto</button></form>',
	),
);
?>

<h1><?php echo Language::$project . ': ' . $model->title; ?></h1>

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

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions' => array('class' => 'table table-bordered table-hover'),
	'attributes'=>array(
		'title',
		'acronym',
		/*array(
			'label'=>Language::$ProjectType,
			'value'=>Functions::productFormat($model->product_type),
		),*/
		array(
			'label'=>Language::$level,
			'value'=>Functions::levelFormat($model->level),
		),
		array(
			'label'=>Language::$template,
			'value'=>Functions::templateFormat($model->template),
		),
		array(
			'label'=>Language::$roles,
			'value'=>Functions::rolesAmountFormat($model->roles),
		),
		array(
			'label'=>Language::$people,
			'value'=>Functions::peopleFormat($model->roles, $model->people),
		),
	),
)); ?>
