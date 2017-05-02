<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'people-form',
	'enableAjaxValidation'=>false,
)); ?>
	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php
			$habilities = array();

			for ($i=0; $i < 15; $i++) {
				array_push($habilities, Language::$habilitiesArray[$i]);
			}

			echo $form->checkBoxList($model, 'habilitiesArray', $habilities); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::htmlButton(Language::$reset, array('type'=>'reset', 'class'=>'btn btn-default')); ?>
		<?php echo CHtml::htmlButton($model->isNewRecord ? Language::$next : Language::$next, array('type'=>'submit', 'class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>