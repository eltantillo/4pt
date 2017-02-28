<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'projects-form',
	'enableAjaxValidation'=>false,
));

$user   = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));
$people = people::model()->findAll('company_id=' . $user->company_id);

?>

	<div class="form-group">
		<?php echo $form->errorSummary($model, '', '',
		array('class'=>'alert alert-danger')); ?>
	</div>

	<?php
	$j = 0;
	$k = 0;
	foreach ($model->rolesArray as $key) {
		if ($key > 0){
			$peopleRoles = array();

			foreach ($people as $person) {
				$person->rolesArray = explode(',', $person->roles);
				foreach($person->rolesArray as $role){
					if ($role != null && $role == $j){
						$peopleRoles[$person->id] = $person->first_name;
					}
				}
			}

			for ($i=0; $i < $key; $i++) { 
	?>

				<div class="form-group">
					<?php echo $form->labelEx($model,Language::$rolesArray[$j] . ' ' . ($i + 1)); ?>
					<?php
					echo $form->dropDownList($model,'people[' . $k  . ']', $peopleRoles, array('class'=>'form-control'));
					$k++;
					?>
				</div>

	<?php
			}
		}
		$j++;
	}
	?>

	<div class="form-group">
		<?php echo CHtml::htmlButton(Language::$reset, array('type'=>'reset', 'class'=>'btn btn-default')); ?>
		<?php echo CHtml::htmlButton(Language::$finish, array('type'=>'submit', 'class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->