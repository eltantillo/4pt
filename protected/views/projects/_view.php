<div class="view">
	<?php echo '<a href="' . Yii::app()->baseUrl . '/projects/' . $data->id . '">'; ?>
	<?php //echo CHtml::encode('(' . $data->id . ')'); ?>
	<?php echo CHtml::encode($data->title); ?>
	<?php echo '</a>'; ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('acronym')); ?>:</b>
	<?php echo CHtml::encode($data->acronym); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('level')); ?>:</b>
	<?php echo CHtml::encode(Functions::levelFormat($data->level)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('template')); ?>:</b>
	<?php echo CHtml::encode(Functions::templateFormat($data->template)); ?>
	<br />

</div>
<br>