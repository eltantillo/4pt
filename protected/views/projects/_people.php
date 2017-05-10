<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'projects-form',
	'enableAjaxValidation'=>false,
));

$user   = people::model()->findByAttributes(array('id'=>Yii::app()->user->id));
$people = people::model()->findAll('company_id=' . $user->company_id);
foreach ($people as $person) {
	$person->rolesArray = explode(',', $person->roles);
}
$enoughPeople = true;

$count = 0;
foreach ($model->rolesArray as $role) {
	if ($role > 0){
		$e = false;
		foreach ($people as $person) {
			if (in_array($count, $person->rolesArray)){
				$e = true;
			}
		}
		if (!$e){
			$enoughPeople = false;
			break;
		}
		
	}
	$count++;
}
if ($enoughPeople){
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
					<?php
						$subStr = "";
						if ($i > 0){
							$subStr = $i + 1;
						}
						echo $form->labelEx($model, htmlentities(Language::$rolesArray[$j]) . ' ' . $subStr);
					?>
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

<?php }else{ ?>
<div class="jumbotron">
  <h1><?php echo Language::$peopleMissing; ?></h1> 
  <p><?php echo Language::$peopleMissingDesc; ?></p> 
  <p><a class="btn btn-primary btn-lg" href="<?php echo Yii::app()->baseUrl; ?>/people" role="button"><?php echo Language::$people; ?></a></p>
</div>
<?php } ?>
<?php $this->endWidget(); ?>

</div><!-- form -->