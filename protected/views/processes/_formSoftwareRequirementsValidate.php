<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'software-requirements-form',
	'enableAjaxValidation'=>false,
)); ?>
	
	<?php
		if ($model->change_request_details != null){
			echo '<div class="alert alert-warning">' . $model->change_request_details . '</div>';
		}
	?>

	<?php 
	  echo '<h3>' . Language::$introduction . '</h3><p>' . $model->introduction . '</p>';
	  echo '<h3>Funcionalidad</h3><p>' . $model->functionality . '</p>';
	  if ($model->functionality_file != null) {
	    echo '<a href="' . Yii::app()->request->baseUrl . '/' . $model->functionality_file . '" target="_blank"><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span> Archivo adjunto</a>';
	  }
	  echo '<h3>' . Language::$userInterface . '</h3><p>' . $model->user_interface . '</p>';
	  if ($model->user_interface_file != null) {
	    echo '<a href="' . Yii::app()->request->baseUrl . '/' . $model->user_interface_file . '" target="_blank"><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span> Archivo adjunto</a>';
	  }
	  echo '<h3>' . Language::$externalInterfaces . '</h3><p>' . $model->external_interfaces . '</p>';
	  if ($model->external_interfaces_file != null) {
	    echo '<a href="' . Yii::app()->request->baseUrl . '/' . $model->external_interfaces_file . '" target="_blank"><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span> Archivo adjunto</a>';
	  }
	  echo '<h3>' . Language::$reliability . '</h3><p>' . $model->reliability . '</p>';
	  if ($model->reliability_file != null) {
	    echo '<a href="' . Yii::app()->request->baseUrl . '/' . $model->reliability_file . '" target="_blank"><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span> Archivo adjunto</a>';
	  }
	  echo '<h3>' . Language::$efficiency . '</h3><p>' . $model->efficiency . '</p>';
	  if ($model->efficiency_file != null) {
	    echo '<a href="' . Yii::app()->request->baseUrl . '/' . $model->efficiency_file . '" target="_blank"><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span> Archivo adjunto</a>';
	  }
	  echo '<h3>' . Language::$maintenance . '</h3><p>' . $model->maintenance . '</p>';
	  if ($model->maintenance_file != null) {
	    echo '<a href="' . Yii::app()->request->baseUrl . '/' . $model->maintenance_file . '" target="_blank"><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span> Archivo adjunto</a>';
	  }
	  echo '<h3>' . Language::$portability . '</h3><p>' . $model->portability . '</p>';
	  if ($model->portability_file != null) {
	    echo '<a href="' . Yii::app()->request->baseUrl . '/' . $model->portability_file . '" target="_blank"><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span> Archivo adjunto</a>';
	  }
	  echo '<h3>Limitaciones/restricciones del diseño y construcción</h3><p>' . $model->limitations . '</p>';
	  if ($model->limitations_file != null) {
	    echo '<a href="' . Yii::app()->request->baseUrl . '/' . $model->limitations_file . '" target="_blank"><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span> Archivo adjunto</a>';
	  }
	  echo '<h3>' . Language::$interoperability . '</h3><p>' . $model->interoperability . '</p>';
	  if ($model->interoperability_file != null) {
	    echo '<a href="' . Yii::app()->request->baseUrl . '/' . $model->interoperability_file . '" target="_blank"><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span> Archivo adjunto</a>';
	  }
	  echo '<h3>' . Language::$reuse . '</h3><p>' . $model->reuse . '</p>';
	  if ($model->reuse_file != null) {
	    echo '<a href="' . Yii::app()->request->baseUrl . '/' . $model->reuse_file . '" target="_blank"><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span> Archivo adjunto</a>';
	  }
	  echo '<h3>' . Language::$legal . '</h3><p>' . $model->legal . '</p>';
	  if ($model->legal_file != null) {
	    echo '<a href="' . Yii::app()->request->baseUrl . '/' . $model->legal_file . '" target="_blank"><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span> Archivo adjunto</a>';
	  }
	?>
	

	<?php if (in_array(0, $sessionUser->rolesArray)){ ?>
	<div class="form-group">
		<?php echo $form->checkBox($model,'project_manager_validated',array('class'=>'cb', 'onchange'=>'cbChange(this)')); ?>
		<?php echo $form->labelEx($model,'project_manager_validated'); ?>
		<?php echo $form->error($model,'project_manager_validated',array('class'=>'alert alert-danger')); ?>
	</div>
	<?php } elseif (in_array(1, $sessionUser->rolesArray)) { ?>

	<div class="form-group">
		<?php echo $form->checkBox($model,'technical_leader_validated',array('class'=>'cb', 'onchange'=>'cbChange(this)')); ?>
		<?php echo $form->labelEx($model,'technical_leader_validated'); ?>
		<?php echo $form->error($model,'technical_leader_validated',array('class'=>'alert alert-danger')); ?>
	</div>
	<?php } ?>

	<div class="form-group">
		<?php echo $form->checkBox($model,'change_request',array('class'=>'cb', 'onchange'=>'cbChange(this)')); ?>
		<?php echo $form->labelEx($model,'change_request'); ?>
		<?php echo $form->error($model,'change_request',array('class'=>'alert alert-danger')); ?>

	<br><br>
	<div class="form-group lool">
		<?php echo $form->labelEx($model,'change_request_details'); ?>
		<?php echo $form->textArea($model,'change_request_details',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'placeholder'=>'')); ?>
		<?php echo $form->error($model,'change_request_details',array('class'=>'alert alert-danger')); ?>
	</div>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Language::$finish : Language::$update, array('type'=>'submit', 'class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
function cbChange(obj) {
    var cbs = document.getElementsByClassName("cb");
    for (var i = 0; i < cbs.length; i++) {
        cbs[i].checked = false;
    }
    obj.checked = true;
}
</script>