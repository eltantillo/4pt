<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	$project->title,
);
?>

<div class="page-header">
	<h1><?php echo $project->title . ' (' . $project->acronym . ')'; ?></h1>
</div>

<?php if(
($softwareRequirements === null ||
(!$softwareRequirements->project_manager_validated ||
!$softwareRequirements->technical_leader_validated)) ||
($userManual === null ||
(!$userManual->project_manager_validated  ||
!$userManual->technical_leader_validated)) ||
($softwareDesign === null ||
(!$softwareDesign->project_manager_validated ||
!$softwareDesign->technical_leader_validated)) ||
($traceabilityRecord === null ||
(!$traceabilityRecord->project_manager_validated ||
!$traceabilityRecord->technical_leader_validated)) ||
($operationManual === null ||
(!$operationManual->project_manager_validated ||
!$operationManual->technical_leader_validated)) ||
($maintenanceManual === null ||
(!$maintenanceManual->project_manager_validated ||
!$maintenanceManual->technical_leader_validated))){ ?>

<?php if(!$projectPlan->project_manager_validated || !$projectPlan->technical_leader_validated){ ?>
<h2>Project Plan</h2>
<div class="row">
<?php 
if (
  (in_array(2, $sessionUser->rolesArray) &&
  ($workStatement === null ||
  !$workStatement->sent ||
  $workStatement->change_request)) ||

  ((in_array(0, $sessionUser->rolesArray) || in_array(1, $sessionUser->rolesArray)) &&
  $workStatement != null  &&
  $workStatement->sent &&
  !$workStatement->change_request) &&
  ((in_array(0, $sessionUser->rolesArray) && !$workStatement->project_manager_validated) ||
  (in_array(1, $sessionUser->rolesArray)) && !$workStatement->technical_leader_validated)
){ ?>
  <div class="col-md-3">
    <div class="thumbnail text-center">
      <span class="glyphicon glyphicon-book gi" aria-hidden="true"></span>
      <div class="caption">
        <h3>Work Statement</h3>
        <p>Descripción del trabajo a ser realizado en relación al desarrollo de software.</p>
        <p><a href="<?php echo Yii::app()->request->baseUrl . '/processes/workstatement/' . $project->id; ?>" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>
<?php }else if($workStatement != null && $workStatement->project_manager_validated && $workStatement->technical_leader_validated && ((in_array(0, $sessionUser->rolesArray) && !$projectPlan->project_manager_validated) || (in_array(1, $sessionUser->rolesArray) && !$projectPlan->technical_leader_validated))) { ?>
  <div class="col-md-3">
    <div class="thumbnail text-center">
      <span class="glyphicon glyphicon-list-alt gi" aria-hidden="true"></span>
      <div class="caption">
        <h3>Delivery Instructions</h3>
        <p>The workstatement is the first step in the ISO-29110 Process execution</p>
        <p><a href="<?php echo Yii::app()->request->baseUrl . '/processes/deliveryinstructions/' . $project->id; ?>" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="thumbnail text-center">
      <span class="glyphicon glyphicon-check gi" aria-hidden="true"></span>
      <div class="caption">
        <h3>Tasks <span class="badge">14</span></h3>
        <p>The workstatement is the first step in the ISO-29110 Process execution</p>
        <p><a href="<?php echo Yii::app()->request->baseUrl . '/processes/tasks/' . $project->id; ?>" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="thumbnail text-center">
      <span class="glyphicon glyphicon-alert gi" aria-hidden="true"></span>
      <div class="caption">
        <h3>Risks</h3>
        <p>The workstatement is the first step in the ISO-29110 Process execution</p>
        <p><a href="<?php echo Yii::app()->request->baseUrl . '/processes/risks/' . $project->id; ?>" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>

<?php }if(in_array(0, $sessionUser->rolesArray) || in_array(2, $sessionUser->rolesArray)){ ?>
  <div class="col-md-3">
    <div class="thumbnail text-center">
      <span class="glyphicon glyphicon-time gi" aria-hidden="true"></span>
      <div class="caption">
        <h3>Minutes</h3>
        <p>Registro de los acuerdos establecidos con el Cliente y/o el equipo de trabajo.</p>
        <p><a href="<?php echo Yii::app()->request->baseUrl . '/processes/minutes/' . $project->id; ?>" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>
<?php }if($minutesValidated && $workStatement != null && $workStatement->project_manager_validated && $workStatement->technical_leader_validated && ((in_array(0, $sessionUser->rolesArray) && !$projectPlan->project_manager_validated) || (in_array(1, $sessionUser->rolesArray) && !$projectPlan->technical_leader_validated))){ ?>

  <div class="col-md-3">
    <div class="thumbnail text-center">
      <span class="glyphicon glyphicon-ok gi" aria-hidden="true"></span>
      <div class="caption">
        <h3>Validation</h3>
        <p>The workstatement is the first step in the ISO-29110 Process execution</p>
        <p><a href="<?php echo Yii::app()->request->baseUrl . '/processes/projectplanvalidate/' . $project->id; ?>" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>
<?php } ?>
</div>

<?php }else{ ?>
<h2>Project Execution</h2>
<div class="row">

  <div class="col-md-3">
    <div class="thumbnail text-center">
      <span class="glyphicon glyphicon-sort-by-attributes gi" aria-hidden="true"></span>
      <div class="caption">
        <h3>Progress Report</h3>
        <p>Registra el estado del proyecto contra el plan del proyecto.</p>
        <p><a href="<?php echo Yii::app()->request->baseUrl . '/processes/progressreports/' . $project->id; ?>" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="thumbnail text-center">
      <span class="glyphicon glyphicon-edit gi" aria-hidden="true"></span>
      <div class="caption">
        <h3>Corrective Actions</h3>
        <p>Identifica las actividades establecidas para corregir una desviación o un problema relativo al cumplimiento del plan.</p>
        <p><a href="<?php echo Yii::app()->request->baseUrl . '/processes/correctiveactions/' . $project->id; ?>" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>

</div>


<h2>Software Implementation</h2>
<div class="row">

<?php 
if (
  ((in_array(2, $sessionUser->rolesArray) || in_array(3, $sessionUser->rolesArray)) &&
  ($softwareRequirements === null ||
  !$softwareRequirements->sent ||
  $softwareRequirements->change_request)) ||

  ((in_array(0, $sessionUser->rolesArray) || in_array(1, $sessionUser->rolesArray)) &&
  $softwareRequirements != null  &&
  $softwareRequirements->sent &&
  !$softwareRequirements->change_request) &&
  ((in_array(0, $sessionUser->rolesArray) && !$softwareRequirements->project_manager_validated) ||
  (in_array(1, $sessionUser->rolesArray)) && !$softwareRequirements->technical_leader_validated)
){?>
  <div class="col-md-3">
    <div class="thumbnail text-center">
      <span class="glyphicon glyphicon-list gi" aria-hidden="true"></span>
      <div class="caption">
        <h3>Requirements</h3>
        <p>The workstatement is the first step in the ISO-29110 Process execution</p>
        <p><a href="<?php echo Yii::app()->request->baseUrl . '/processes/softwarerequirements/' . $project->id; ?>" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>

<?php }else if($softwareRequirements != null && $softwareRequirements->project_manager_validated && $softwareRequirements->technical_leader_validated) { ?>

<?php 
if (
  (in_array(3, $sessionUser->rolesArray) &&

  ($softwareDesign != null &&
  $softwareDesign->project_manager_validated &&
  $softwareDesign->technical_leader_validated) &&

  ($userManual === null ||
  !$userManual->sent ||
  $userManual->change_request)) ||

  ((in_array(0, $sessionUser->rolesArray) || in_array(1, $sessionUser->rolesArray)) &&
  $userManual != null  &&
  $userManual->sent &&
  !$userManual->change_request) &&
  ((in_array(0, $sessionUser->rolesArray) && !$userManual->project_manager_validated) ||
  (in_array(1, $sessionUser->rolesArray)) && !$userManual->technical_leader_validated)
){?>
  <div class="col-md-3">
    <div class="thumbnail text-center">
      <span class="glyphicon glyphicon-question-sign gi" aria-hidden="true"></span>
      <div class="caption">
        <h3>User Manual</h3>
        <p>Describe la forma de uso del software basado en la interfaz de usuario.</p>
        <p><a href="<?php echo Yii::app()->request->baseUrl . '/processes/usermanual/' . $project->id; ?>" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>
<?php }
if (
  ((in_array(3, $sessionUser->rolesArray) || in_array(4, $sessionUser->rolesArray)) &&
  ($softwareDesign === null ||
  !$softwareDesign->sent ||
  $softwareDesign->change_request)) ||

  ((in_array(0, $sessionUser->rolesArray) || in_array(1, $sessionUser->rolesArray)) &&
  $softwareDesign != null  &&
  $softwareDesign->sent &&
  !$softwareDesign->change_request) &&
  ((in_array(0, $sessionUser->rolesArray) && !$softwareDesign->project_manager_validated) ||
  (in_array(1, $sessionUser->rolesArray)) && !$softwareDesign->technical_leader_validated)
){?>
  <div class="col-md-3">
    <div class="thumbnail text-center">
      <span class="glyphicon glyphicon-dashboard gi" aria-hidden="true"></span>
      <div class="caption">
        <h3>Software Design</h3>
        <p>Información textual y gráfica de la estructura del software.</p>
        <p><a href="<?php echo Yii::app()->request->baseUrl . '/processes/softwaredesign/' . $project->id; ?>" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>
<?php }
if (
  ((in_array(3, $sessionUser->rolesArray) || in_array(4, $sessionUser->rolesArray)) &&
  ($traceabilityRecord === null ||
  !$traceabilityRecord->sent ||
  $traceabilityRecord->change_request)) ||

  ((in_array(0, $sessionUser->rolesArray) || in_array(1, $sessionUser->rolesArray)) &&
  $traceabilityRecord != null  &&
  $traceabilityRecord->sent &&
  !$traceabilityRecord->change_request) &&
  ((in_array(0, $sessionUser->rolesArray) && !$traceabilityRecord->project_manager_validated) ||
  (in_array(1, $sessionUser->rolesArray)) && !$traceabilityRecord->technical_leader_validated)
){?>
  <div class="col-md-3">
    <div class="thumbnail text-center">
      <span class="glyphicon glyphicon-stats gi" aria-hidden="true"></span>
      <div class="caption">
        <h3>Traceability Record</h3>
        <p>Documenta la relación entre los requisitos incluidos en la especificación de requisitos, los elementos del diseño de software, los componentes de software, los casos y los procedimientos de prueba.</p>
        <p><a href="<?php echo Yii::app()->request->baseUrl . '/processes/traceabilityrecord/' . $project->id; ?>" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>
<?php }
if (
  (in_array(5, $sessionUser->rolesArray) &&

  $softwareDesign->project_manager_validated &&
  $softwareDesign->technical_leader_validated &&

  ($operationManual === null ||
  !$operationManual->sent ||
  $operationManual->change_request)) ||

  ((in_array(0, $sessionUser->rolesArray) || in_array(1, $sessionUser->rolesArray)) &&
  $operationManual != null  &&
  $operationManual->sent &&
  !$operationManual->change_request) &&
  ((in_array(0, $sessionUser->rolesArray) && !$operationManual->project_manager_validated) ||
  (in_array(1, $sessionUser->rolesArray)) && !$operationManual->technical_leader_validated)
){?>
  <div class="col-md-3">
    <div class="thumbnail text-center">
      <span class="glyphicon glyphicon-info-sign gi" aria-hidden="true"></span>
      <div class="caption">
        <h3>Operation Manual</h3>
        <p>Contiene la información necesaria para instalar y gestionar el software.</p>
        <p><a href="<?php echo Yii::app()->request->baseUrl . '/processes/operationmanual/' . $project->id; ?>" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>
<?php }
if (
  (in_array(5, $sessionUser->rolesArray) &&

  ($maintenanceManual === null ||
  !$maintenanceManual->sent ||
  $maintenanceManual->change_request)) ||

  ((in_array(0, $sessionUser->rolesArray) || in_array(1, $sessionUser->rolesArray)) &&
  $maintenanceManual != null  &&
  $maintenanceManual->sent &&
  !$maintenanceManual->change_request) &&
  ((in_array(0, $sessionUser->rolesArray) && !$maintenanceManual->project_manager_validated) ||
  (in_array(1, $sessionUser->rolesArray)) && !$maintenanceManual->technical_leader_validated)
){?>
  <div class="col-md-3">
    <div class="thumbnail text-center">
      <span class="glyphicon glyphicon-wrench gi" aria-hidden="true"></span>
      <div class="caption">
        <h3>Maintenance Manual</h3>
        <p>Describe la configuración del software y el entorno utilizado para el desarrollo y pruebas (compiladores, herramientas de diseño, construcción y pruebas).</p>
        <p><a href="<?php echo Yii::app()->request->baseUrl . '/processes/maintenancemanual/' . $project->id; ?>" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>
<?php }
if (in_array(5, $sessionUser->rolesArray) &&

  $softwareDesign->project_manager_validated &&
  $softwareDesign->technical_leader_validated &&

  $traceabilityRecord->project_manager_validated &&
  $traceabilityRecord->technical_leader_validated){?>
  <div class="col-md-3">
    <div class="thumbnail text-center">
      <span class="glyphicon glyphicon-screenshot gi" aria-hidden="true"></span>
      <div class="caption">
        <h3>Software Component</h3>
        <p>Un conjunto de unidades de cádigo relacionadas.</p>
        <p><a href="<?php echo Yii::app()->request->baseUrl . '/processes/softwarecomponents/' . $project->id; ?>" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>
<?php }
if (in_array(2, $sessionUser->rolesArray) || in_array(5, $sessionUser->rolesArray)){?>
  <div class="col-md-3">
    <div class="thumbnail text-center">
      <span class="glyphicon glyphicon-console gi" aria-hidden="true"></span>
      <div class="caption">
        <h3>Test Report</h3>
        <p>Documenta la ejecución de las pruebas.</p>
        <p><a href="<?php echo Yii::app()->request->baseUrl . '/processes/testreports/' . $project->id; ?>" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>
<?php }} ?>

</div>
<?php } ?>

<?php } elseif (in_array(0, $sessionUser->rolesArray) || (in_array(2, $sessionUser->rolesArray) && $actOfAcceptance != null)) {?>
<h2>Project Closure</h2>
<div class="row">
  <div class="col-md-12">
    <div class="thumbnail text-center">
      <span class="glyphicon glyphicon-download-alt gi" aria-hidden="true"></span>
      <div class="caption">
        <h3>Act of Acceptance</h3>
        <p>Documentación de la aceptación por parte del cliente de los entregables del proyecto.</p>
        <p><a href="<?php echo Yii::app()->request->baseUrl . '/processes/actofacceptance/' . $project->id; ?>" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>
</div>
<?php } ?>