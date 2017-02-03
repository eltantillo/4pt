<div class="view">
	<?php echo '<a href="' . Yii::app()->baseUrl . '/people/' . $data->id . '">'; ?>
	<?php echo CHtml::encode($data->first_name); ?>
	<?php echo CHtml::encode($data->middle_name); ?>
	<?php echo CHtml::encode($data->last_name) . ''; ?>
	<?php echo '</a>'; ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode(Functions::phoneFormat($data->phone)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />
	<br />
</div>