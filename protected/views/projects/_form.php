<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'projects-form',
	'enableAjaxValidation'=>false,
));
$templatesArray = array();
$templatesArray[Language::$templates] = 'Ninguna';

$user  = People::model()->findByAttributes(array('id'=>Yii::app()->user->id));
$templates = Templates::model()->findAll('company_id=' . $user->company_id);

foreach ($templates as $key) {
	$templatesArray[$key->id] = $key->name;
}
?>

	<p class="note"><?php echo Language::$requiredFields; ?></p>

	<div class="form-group">
		<?php echo $form->errorSummary($model, '', '',
		array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>64, 'class'=>'form-control')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'acronym'); ?>
		<?php echo $form->textField($model,'acronym',array('size'=>16,'maxlength'=>16, 'class'=>'form-control')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'product_type') . '<br>'; ?>
		<?php echo $form->radioButtonList($model,'product_type',array(1 => Language::$product, 2 => Language::$service)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'level'); ?>
		<?php echo $form->dropDownList($model,'level', array(1 => Language::$basic, 2 => Language::$medium, 3 => Language::$advanced), array('class'=>'form-control')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'template'); ?>
		<?php echo $form->dropDownList($model,'template', $templatesArray, array('class'=>'form-control')); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::htmlButton(Language::$reset, array('type'=>'reset', 'class'=>'btn btn-default')); ?>
		<?php echo CHtml::htmlButton(Language::$next, array('type'=>'submit', 'class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->