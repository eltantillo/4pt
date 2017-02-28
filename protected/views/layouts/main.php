
<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="language" content="en">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-theme.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">

		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	</head>

	<body>

		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo Yii::app()->baseUrl; ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> <?php echo CHtml::encode(Yii::app()->name); ?></a>
				</div>
				<div id="navbar" class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<?php
							if (Yii::app()->user->isGuest){
								echo '<li><a href="' . Yii::app()->baseUrl . '/companies/create"><span class="glyphicon glyphicon-check" aria-hidden="true"></span> ' . Language::$register  . '</a></li>';
								echo '<li><a href="' . Yii::app()->baseUrl . '/site/login"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> '       . Language::$login     . '</a></li>';
							}
							else{
								echo '<li><a href="' . Yii::app()->baseUrl . '/people"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> '     . Language::$people    . '</a></li>';
								echo '<li><a href="' . Yii::app()->baseUrl . '/projects"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> '   . Language::$projects  . '</a></li>';
								echo '<li><a href="' . Yii::app()->baseUrl . '/processes"><span class="glyphicon glyphicon-random" aria-hidden="true"></span> '    . Language::$processes . '</a></li>';
								echo '<li><a href="' . Yii::app()->baseUrl . '/products"><span class="glyphicon glyphicon-cd" aria-hidden="true"></span> '   . Language::$products  . '</a></li>';
								echo '<li><a href="' . Yii::app()->baseUrl .'/site/logout"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> ' . Language::$logout    . '(' . Yii::app()->user->name . ')</a></li>';
							}
						?>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</nav>

		<div class="container">

			<?php if(isset($this->breadcrumbs)):?>
			<?php $this->widget('zii.widgets.CBreadcrumbs', array(
				'links'=>$this->breadcrumbs,
			)); ?><!-- breadcrumbs -->
			<?php endif?>

			<?php echo $content; ?>

		</div><!-- /.container -->


		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/main.js"></script>
	</body>
</html>
