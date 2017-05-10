<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'projects-form',
	'enableAjaxValidation'=>false,
));
?>
	<p class="note"><?php echo Language::$enterRolesNumbers; ?></p>

	<div class="form-group">
		<?php echo $form->errorSummary($model, '', '',
		array('class'=>'alert alert-danger')); ?>
	</div>

	<?php 
	for ($i = 0; $i < 6; $i++) {
		if ($i !=0 && $i != 2){
	?>

		<div class="form-group">
			<?php echo $form->labelEx($model, htmlentities(Language::$rolesArray[$i])); ?>
			<?php echo $form->textField($model,'roles[' . $i . ']',array('size'=>32, 'maxlength'=>32, 'class'=>'form-control', 'value'=>$model->rolesArray[$i])); ?>
		</div>

	<?php
		}
		else{
			echo $form->hiddenField($model,'roles[' . $i . ']',array('type'=>"hidden",'size'=>32,'maxlength'=>32, 'value'=>1));
		}
	}
	?>

	<div class="form-group">
		<?php echo CHtml::htmlButton(Language::$reset, array('type'=>'reset', 'class'=>'btn btn-default')); ?>
		<?php echo CHtml::htmlButton(Language::$next, array('type'=>'submit', 'class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->