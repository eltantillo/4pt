<?php
$this->breadcrumbs=array(
	Language::$processes=>array('index'),
	$project->title,
);

$accessArray = Functions::accessArray(
  $sessionUser,
  $template,
  $projectPlan,
  $workStatement,
  $minutesValidated,
  $softwareRequirements,
  $userManual,
  $softwareDesign,
  $operationManual,
  $maintenanceManual,
  $actOfAcceptance
);
?>

<div class="page-header">
	<h1><?php echo $project->title . ' (' . $project->acronym . ')'; ?></h1>
</div>

<?php if (!$accessArray['projectPlan'] && !$accessArray['projectExecution'] && !$accessArray['softwareImplementation'] && !$accessArray['actOfAcceptance']){
  echo '<p>Por el momento no tiene actividades por desarrollar en este proyecto</p>';
  } ?>

<?php if ($accessArray['projectPlan']){ ?>
<h2><?php echo Language::$projectPlan; ?></h2>
<p>Complete todas las actividades para poder validar el plan de proyecto</p>
<div class="row">
  <?php if($accessArray['workStatement']){ ?>
  <div class="col-md-3">
    <div class="thumbnail processBox text-center">
      <span class="glyphicon glyphicon-book gi" aria-hidden="true"></span>
      <div class="caption">
        <h3><?php echo Language::$workStatement; ?></h3>
        <p>Descripción del trabajo a ser realizado en relación al desarrollo de software.</p>
        <p><a href="<?php echo Yii::app()->request->baseUrl . '/processes/workstatement/' . $project->id; ?>" class="btn btn-primary" role="button"><?php echo $workStatement != null ? Language::$view : Language::$create; ?></a>
      </div>
    </div>
  </div>
  <?php } ?>

  <?php if($accessArray['deliveryInstructions']){ ?>
  <div class="col-md-3">
    <div class="thumbnail processBox text-center">
      <span class="glyphicon glyphicon-list-alt gi" aria-hidden="true"></span>
      <div class="caption">
        <h3><?php echo Language::$deliveryInstructions; ?></h3>
        <p><?php echo Language::$workStatementDescription; ?></p>
        <p><a href="<?php echo Yii::app()->request->baseUrl . '/processes/deliveryinstructions/' . $project->id; ?>" class="btn btn-primary" role="button"><?php echo $deliveryInstructions != null ? Language::$view : Language::$create; ?></a>
      </div>
    </div>
  </div>
  <?php } ?>

  <?php if($accessArray['tasks']){ ?>
  <div class="col-md-3">
    <div class="thumbnail processBox text-center">
      <span class="glyphicon glyphicon-check gi" aria-hidden="true"></span>
      <div class="caption">
        <h3><?php echo Language::$tasks; ?></h3>
        <p><?php echo Language::$tasksDescription; ?></p>
        <p><a href="<?php echo Yii::app()->request->baseUrl . '/processes/tasks/' . $project->id; ?>" class="btn btn-primary" role="button"><?php echo count($tasks) > 0 ? Language::$view : Language::$create; ?></a>
      </div>
    </div>
  </div>
  <?php } ?>

  <?php if($accessArray['risks']){ ?>
  <div class="col-md-3">
    <div class="thumbnail processBox text-center">
      <span class="glyphicon glyphicon-alert gi" aria-hidden="true"></span>
      <div class="caption">
        <h3><?php echo Language::$risks; ?></h3>
        <p><?php echo Language::$risksDescription; ?></p>
        <p><a href="<?php echo Yii::app()->request->baseUrl . '/processes/risks/' . $project->id; ?>" class="btn btn-primary" role="button"><?php echo count($risks) > 0 ? Language::$view : Language::$create; ?></a>
      </div>
    </div>
  </div>
  <?php } ?>

  <?php if($accessArray['minutes']){ ?>
  <div class="col-md-3">
    <div class="thumbnail processBox text-center">
      <span class="glyphicon glyphicon-time gi" aria-hidden="true"></span>
      <div class="caption">
        <h3><?php echo Language::$minutes; ?></h3>
        <p><?php echo Language::$minutesDescription; ?></p>
        <p><a href="<?php echo Yii::app()->request->baseUrl . '/processes/minutes/' . $project->id; ?>" class="btn btn-primary" role="button"><?php echo count($minutes) > 0 ? Language::$view : Language::$create; ?></a>
      </div>
    </div>
  </div>
  <?php } ?>

  <?php if($accessArray['validation']){ ?>
  <div class="col-md-3">
    <div class="thumbnail processBox text-center">
      <span class="glyphicon glyphicon-ok gi" aria-hidden="true"></span>
      <div class="caption">
        <h3><?php echo Language::$validation; ?></h3>
        <p><?php echo Language::$validationDescription; ?></p>
        <p><a href="<?php echo Yii::app()->request->baseUrl . '/processes/projectplanvalidate/' . $project->id; ?>" class="btn btn-primary" role="button">Ver</a>
      </div>
    </div>
  </div>
  <?php } ?>
</div>
<hr>
<?php } ?>

<?php if($accessArray['projectExecution']){ ?>
<h2><?php echo Language::$projectExecution; ?></h2>
<div class="row">

  <?php if($accessArray['progressReport']){ ?>
  <div class="col-md-3">
    <div class="thumbnail processBox text-center">
      <span class="glyphicon glyphicon-sort-by-attributes gi" aria-hidden="true"></span>
      <div class="caption">
        <h3><?php echo Language::$progressReport; ?></h3>
        <p><?php echo Language::$progressReportDescription; ?></p>
        <p><a href="<?php echo Yii::app()->request->baseUrl . '/processes/progressreports/' . $project->id; ?>" class="btn btn-primary" role="button"><?php echo count($progressReports) > 0 ? Language::$view : Language::$create; ?></a>
      </div>
    </div>
  </div>
  <?php } ?>

  <?php if($accessArray['correctiveActions']){ ?>
  <div class="col-md-3">
    <div class="thumbnail processBox text-center">
      <span class="glyphicon glyphicon-edit gi" aria-hidden="true"></span>
      <div class="caption">
        <h3><?php echo Language::$correctiveActions; ?></h3>
        <p><?php echo Language::$correctiveActionsDescription; ?></p>
        <p><a href="<?php echo Yii::app()->request->baseUrl . '/processes/correctiveactions/' . $project->id; ?>" class="btn btn-primary" role="button"><?php echo count($correctiveActions) > 0 ? Language::$view : Language::$create; ?></a>
      </div>
    </div>
  </div>
  <?php } ?>
</div>
<hr>
<?php } ?>

<?php if($accessArray['softwareImplementation']){ ?>
<h2><?php echo Language::$softwareImplementation; ?></h2>
<div class="row">

  <?php if($accessArray['softwareRequirements']){ ?>
  <div class="col-md-3">
    <div class="thumbnail processBox text-center">
      <span class="glyphicon glyphicon-list gi" aria-hidden="true"></span>
      <div class="caption">
        <h3><?php echo Language::$softwareRequirements; ?></h3>
        <p><?php echo Language::$softwareRequirementsDescription; ?></p>
        <p><a href="<?php echo Yii::app()->request->baseUrl . '/processes/softwarerequirements/' . $project->id; ?>" class="btn btn-primary" role="button"><?php echo $softwareRequirements != null ? Language::$view : Language::$create; ?></a>
      </div>
    </div>
  </div>
  <?php } ?>

  <?php if($accessArray['userManual']){ ?>
  <div class="col-md-3">
    <div class="thumbnail processBox text-center">
      <span class="glyphicon glyphicon-question-sign gi" aria-hidden="true"></span>
      <div class="caption">
        <h3><?php echo Language::$userManual; ?></h3>
        <p><?php echo Language::$userManualDescription; ?></p>
        <p><a href="<?php echo Yii::app()->request->baseUrl . '/processes/usermanual/' . $project->id; ?>" class="btn btn-primary" role="button"><?php echo $userManual != null ? Language::$view : Language::$create; ?></a>
      </div>
    </div>
  </div>
  <?php } ?>

  <?php if($accessArray['softwareDesign']){ ?>
  <div class="col-md-3">
    <div class="thumbnail processBox text-center">
      <span class="glyphicon glyphicon-dashboard gi" aria-hidden="true"></span>
      <div class="caption">
        <h3><?php echo Language::$softwareDesign; ?></h3>
        <p><?php echo Language::$softwareDesignDescription; ?></p>
        <p><a href="<?php echo Yii::app()->request->baseUrl . '/processes/softwaredesign/' . $project->id; ?>" class="btn btn-primary" role="button"><?php echo $softwareDesign != null ? Language::$view : Language::$create; ?></a>
      </div>
    </div>
  </div>
  <?php } ?>

  <?php if($accessArray['operationManual']){ ?>
  <div class="col-md-3">
    <div class="thumbnail processBox text-center">
      <span class="glyphicon glyphicon-info-sign gi" aria-hidden="true"></span>
      <div class="caption">
        <h3><?php echo Language::$operationManual; ?></h3>
        <p><?php echo Language::$operationManualDescription; ?></p>
        <p><a href="<?php echo Yii::app()->request->baseUrl . '/processes/operationmanual/' . $project->id; ?>" class="btn btn-primary" role="button"><?php echo $operationManual != null ? Language::$view : Language::$create; ?></a>
      </div>
    </div>
  </div>
  <?php } ?>

  <?php if($accessArray['maintenanceManual']){ ?>
  <div class="col-md-3">
    <div class="thumbnail processBox text-center">
      <span class="glyphicon glyphicon-wrench gi" aria-hidden="true"></span>
      <div class="caption">
        <h3><?php echo Language::$maintenanceManual; ?></h3>
        <p><?php echo Language::$maintenanceManualDescription; ?></p>
        <p><a href="<?php echo Yii::app()->request->baseUrl . '/processes/maintenancemanual/' . $project->id; ?>" class="btn btn-primary" role="button"><?php echo $maintenanceManual != null ? Language::$view : Language::$create; ?></a>
      </div>
    </div>
  </div>
  <?php } ?>

  <?php if($accessArray['softwareComponents']){ ?>
  <div class="col-md-3">
    <div class="thumbnail processBox text-center">
      <span class="glyphicon glyphicon-screenshot gi" aria-hidden="true"></span>
      <div class="caption">
        <h3><?php echo Language::$softwareComponents; ?></h3>
        <p><?php echo Language::$softwareComponentsDescription; ?></p>
        <p><a href="<?php echo Yii::app()->request->baseUrl . '/processes/softwarecomponents/' . $project->id; ?>" class="btn btn-primary" role="button"><?php echo $softwareComponents != null ? Language::$view : Language::$create; ?></a>
      </div>
    </div>
  </div>
  <?php } ?>
</div>
<hr>
<?php } ?>

<?php if($accessArray['projectClosure']){ ?>
<h2><?php echo Language::$projectClosure; ?></h2>
<div class="row">
  <?php if($accessArray['actOfAcceptance']){ ?>
  <div class="col-md-12">
    <div class="thumbnail text-center">
      <span class="glyphicon glyphicon-download-alt gi" aria-hidden="true"></span>
      <div class="caption">
        <h3><?php echo Language::$actOfAcceptance; ?></h3>
        <p><?php echo Language::$actOfAcceptanceDescription; ?></p>
        <p><a href="<?php echo Yii::app()->request->baseUrl . '/processes/actofacceptance/' . $project->id; ?>" class="btn btn-primary" role="button"><?php echo $actOfAcceptance != null ? Language::$view : Language::$create; ?></a>
      </div>
    </div>
  </div>
  <?php } ?>
</div>
<?php } ?>