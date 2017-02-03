<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	Language::$login,
);
?>

<h1><?php echo Language::$login; ?></h1>

<p><?php echo Language::$fillCredentials; ?></p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<div class="form-group">
		<?php echo $form->errorSummary($model, '', '',
		array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,Language::$email); ?>
		<?php echo $form->textField($model,'username', array('class'=>'form-control')); ?>
		<?php //echo $form->error($model,'username', array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,Language::$password); ?>
		<?php echo $form->passwordField($model,'password', array('class'=>'form-control')); ?>
		<?php //echo $form->error($model,'password', array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<div class="row">
		<div class="col-xs-6">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,Language::$rememberMe); ?>
		</div>
		<div class="col-xs-6 text-right"><a href="<?php echo Yii::app()->baseUrl . '/site/recover/' ?>"><?php echo Language::$forgotPass; ?></a></div>
		</div>
	</div>

	<div class="form-group">
		<?php echo CHtml::htmlButton(Language::$login, array('type'=>'submit', 'class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
