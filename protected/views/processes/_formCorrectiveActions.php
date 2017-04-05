<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'corrective-actions-form',
	'enableAjaxValidation'=>false,
)); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'problem'); ?>
		<?php echo $form->textArea($model,'problem',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'problem'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'solution'); ?>
		<?php echo $form->textArea($model,'solution',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'solution'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'corrective_actions'); ?>
		<?php echo $form->textArea($model,'corrective_actions',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'corrective_actions', array('class'=>'form-control')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'responsible_id'); ?>
		<?php echo $form->textField($model,'responsible_id',array('size'=>10,'maxlength'=>10, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'responsible_id'); ?>
	</div>

	<div class="form-group">
	<div class="row"><div class='col-sm-12'>
		<?php echo $form->labelEx($model,'open_date'); ?>
		<?php echo $form->textField($model,'open_date', array('class'=>'form-control', 'id'=>'datetimepicker')); ?>
		<?php echo $form->error($model,'open_date'); ?>
	</div></div>
	</div>

	<div class="form-group">
	<div class="row"><div class='col-sm-12'>
		<?php echo $form->labelEx($model,'close_date'); ?>
		<?php echo $form->textField($model,'close_date', array('class'=>'form-control', 'id'=>'datetimepicker2')); ?>
		<?php echo $form->error($model,'close_date'); ?>
	</div></div>
	</div>

	<!--<div class="form-group">
		<?php echo $form->checkBox($model,'complete'); ?>
		<?php echo $form->labelEx($model,'complete'); ?>
		<?php echo $form->error($model,'complete'); ?>
	</div>-->

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Language::$create : Language::$update, array('type'=>'submit', 'class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
    $(function () {
        $('#datetimepicker').datetimepicker({
	        format: 'YYYY-MM-DD HH:mm'
	    });
        $('#datetimepicker2').datetimepicker({
	        format: 'YYYY-MM-DD HH:mm'
	    });
    });
</script>