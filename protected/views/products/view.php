<?php
$this->breadcrumbs=array(
	Language::$products=>array('index'),
	$project->title,
);

$workStatementValue = count($workStatement) > 0;
$deliveryInstructionsValue = $deliveryInstructions != null;
$tasksValue = count($tasks) > 0;
$risksValue = count($risks) > 0;
$minutesValue = count($minutes) > 0;

$progressReportValue = count($progressReports) > 0;
$correctiveActionsValue = count($correctiveActions) > 0;

$softwareRequirementsValue = count($softwareRequirements) > 0;
$userManualValue = count($userManual) > 0;
$softwareDesignValue = count($softwareDesign) > 0;
$operationManualValue = count($operationManual) > 0;
$maintenanceManualValue = count($maintenanceManual) > 0;
$softwareComponentsValue = count($softwareComponents) > 0;
$testReportValue = count($testReports) > 0;

$actOfAcceptanceValue = $actOfAcceptance != null;

$projectPlanValue            = $workStatementValue || $deliveryInstructionsValue || $tasksValue || $risksValue || $minutesValue;
$projectExecutionValue       = $progressReportValue || $correctiveActionsValue;
$softwareImplementationValue = $softwareRequirementsValue || $userManualValue || $softwareDesignValue || $operationManualValue || $maintenanceManualValue || $softwareComponentsValue || $testReportValue;
$projectClosureValue         = $actOfAcceptanceValue;

?>

<div class="page-header">
  <h1><?php echo $project->title . ' (' . $project->acronym . ')'; ?></h1>
</div>

<ol>

  <?php if ($projectPlanValue){ ?>
  <li><a href="#projectPlan"><?php echo Language::$projectPlan; ?></a></li>
  <ol>
    <?php if ($workStatementValue){ ?><li><a href="#workStatement"><?php  echo Language::$workStatement; ?></a></li><?php } ?>
    <?php if ($deliveryInstructionsValue){ ?><li><a href="#deliveryInstructions"><?php  echo Language::$deliveryInstructions; ?></a></li><?php } ?>
    <?php if ($tasksValue){ ?><li><a href="#tasks"><?php echo Language::$tasks; ?></a></li><?php } ?>
    <?php if ($risksValue){ ?><li><a href="#risks"><?php echo Language::$risks; ?></a></li><?php } ?>
    <?php if ($minutesValue){ ?><li><a href="#minutes"><?php echo Language::$minutes; ?></a></li><?php } ?>
  </ol>
  <?php } ?>

  <?php if ($projectExecutionValue){ ?>
  <li><a href="#projectExecution"><?php echo Language::$projectExecution; ?></a></li>
  <ol>
    <?php if ($progressReportValue){ ?><li><a href="#progressReport"><?php echo Language::$progressReport; ?></a></li><?php } ?>
    <?php if ($correctiveActionsValue){ ?><li><a href="#correctiveActions"><?php echo Language::$correctiveActions; ?></a></li><?php } ?>
  </ol>
  <?php } ?>

  <?php if ($softwareImplementationValue){ ?>
  <li><a href="#softwareImplementation"><?php echo Language::$softwareImplementation; ?></a></li>
  <ol>
    <?php if ($softwareRequirementsValue){ ?><li><a href="#softwareRequirements"><?php echo Language::$softwareRequirements; ?></a></li><?php } ?>
    <?php if ($userManualValue){ ?><li><a href="#userManual"><?php echo Language::$userManual; ?></a></li><?php } ?>
    <?php if ($softwareDesignValue){ ?><li><a href="#softwareDesign"><?php echo Language::$softwareDesign; ?></a></li><?php } ?>
    <?php if ($operationManualValue){ ?><li><a href="#operationManual"><?php echo Language::$operationManual; ?></a></li><?php } ?>
    <?php if ($maintenanceManualValue){ ?><li><a href="#maintenanceManual"><?php echo Language::$maintenanceManual; ?></a></li><?php } ?>
    <?php if ($softwareComponentsValue){ ?><li><a href="#softwareComponent"><?php echo Language::$softwareComponents; ?></a></li><?php } ?>
    <?php if ($testReportValue){ ?><li><a href="#testReport"><?php echo Language::$testReports; ?></a></li><?php } ?>
  </ol>
  <?php } ?>

  <?php if ($projectClosureValue){ ?>
  <li><a href="#projectClosure"><?php echo Language::$projectClosure; ?></a></li>
  <ol>
    <?php if ($actOfAcceptanceValue){ ?><li><a href="#actOfAcceptance"><?php echo Language::$actOfAcceptance; ?></a></li><?php } ?>
  </ol>
  <?php } ?>

</ol>

  <?php if ($projectPlanValue){ ?>
  <h2 id="projectPlan"><?php echo Language::$projectPlan; ?></h2><hr>
  <?php if ($workStatementValue){ ?>
  <h3 id="workStatement"><?php echo Language::$workStatement; ?></h3>
  <?php
  $version = count($workStatement);
    foreach ($workStatement as $model) {
      echo '
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#workStatementModal' . $version . '">
        ' . Language::$version .' <span class="badge">' . $version . '</span>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="workStatementModal' . $version . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">' . Language::$workStatement .' ' . Language::$version .' ' . $version . '</h4>
              </div>
              <div class="modal-body">
                <h4>' . Language::$productDescription . '</h4>
                <p>' . $model->product_description . '</p>
                <h4>' . Language::$scope . '</h4>
                <p>' . $model->scope . '</p>
                <h4>' . Language::$objectives . '</h4>
                <p>' . $model->objectives . '</p>
                <h4>' . Language::$deliverables . '</h4>
                <p>' . $model->deliverables . '</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      ';
      $version--;
    }

    echo '<h4>' . Language::$productDescription . '</h4><p>' . $workStatement[0]->product_description . '</p>';
    echo '<h4>' . Language::$scope . '</h4><p>' . $workStatement[0]->scope . '</p>';
    echo '<h4>' . Language::$objectives . '</h4><p>' . $workStatement[0]->objectives . '</p>';
    echo '<h4>' . Language::$deliverables . '</h4><p>' . $workStatement[0]->deliverables . '</p>';
   ?>
   <?php } ?>

  <?php if ($deliveryInstructionsValue){ ?>
  <h3 id="deliveryInstructions"><?php echo Language::$deliveryInstructions; ?></h3>
  <?php
    echo '<h4>' . Language::$releaseRequirements . '</h4><p>' . $deliveryInstructions->release_requirements . '</p>';
    echo '<h4>' . Language::$deliveryRequirements . '</h4><p>' . $deliveryInstructions->delivery_requirements . '</p>';
    ?>
  <?php } ?>

  <?php if ($tasksValue){ ?>
  <h3 id="tasks"><?php echo Language::$tasks; ?></h3>
  <div class="table-responsive">
    <table class="table table-hover">
      <tr>
        <th><?php echo Language::$taskDescription; ?></th>
        <th><?php echo Language::$duration; ?></th>
        <th><?php echo Language::$startDate; ?></th>
        <th><?php echo Language::$resources; ?></th>
        <th><?php echo Language::$people; ?></th>
      </tr>
        <?php
        foreach ($tasks as $task) {
          echo '<tr>';
          echo '<td>' . $task->task . '</td>';
          echo '<td>' . $task->duration . '</td>';
          echo '<td>' . $task->start_date . '</td>';
          echo '<td>' . $task->resources . '</td>';
          echo '<td>' . Functions::personFormat($task->people_id) . '</td>';
          echo '</tr>';
        }?>
    </table>
  </div>
  <?php } ?>

  <?php if ($risksValue){ ?>
  <h3 id="risks"><?php echo Language::$risks; ?></h3>
  <div class="table-responsive">
    <table class="table table-hover">
      <tr>
        <th><?php echo Language::$riskDescription; ?></th>
        <th><?php echo Language::$cost; ?></th>
      </tr>
        <?php
        foreach ($risks as $risk) {
          echo '<tr>';
          echo '<td>' . $risk->risk . '</td>';
          echo '<td>$ ' . $risk->cost . '</td>';
          echo '</tr>';
        }?>
    </table>
  </div>
  <?php } ?>

  <?php if ($minutesValue){ ?>
  <h3 id="minutes"><?php echo Language::$minutes; ?></h3>
  <div class="table-responsive">
    <table class="table table-hover">
      <tr>
        <th><?php echo Language::$purpose; ?></th>
        <th><?php echo Language::$date; ?></th>
        <th><?php echo Language::$assistants; ?></th>
        <th><?php echo Language::$place; ?></th>
        <th><?php echo Language::$issuesRaised; ?></th>
        <th><?php echo Language::$openIssues; ?></th>
        <th><?php echo Language::$agreements; ?></th>
        <th><?php echo Language::$nextMeeting; ?></th>
      </tr>
        <?php
        foreach ($minutes as $minute) {
          echo '<tr>';
          echo '<td>' . $minute->purpose . '</td>';
          echo '<td>' . $minute->date . '</td>';
          echo '<td>' . $minute->assistants . '</td>';
          echo '<td>' . $minute->place . '</td>';
          echo '<td>' . $minute->issues_raised . '</td>';
          echo '<td>' . $minute->open_issues . '</td>';
          echo '<td>' . $minute->agreements . '</td>';
          echo '<td>' . $minute->next_meeting . '</td>';
          echo '</tr>';
        }?>
    </table>
  </div>
  <?php }} ?>

  <?php if ($projectExecutionValue){ ?>
  <h2 id="projectExecution"><?php echo Language::$projectExecution; ?></h2><hr>
  <?php if ($progressReportValue){ ?>
  <h3 id="progressReport"><?php echo Language::$progressReport; ?></h3>

  <div class="table-responsive">
    <table class="table table-hover">
      <tr>
        <th><?php echo Language::$taskStatus; ?></th>
        <th><?php echo Language::$resultsStatus; ?></th>
        <th><?php echo Language::$resourcesStatus; ?></th>
        <th><?php echo Language::$costsStatus; ?></th>
        <th><?php echo Language::$calendarStatus; ?></th>
        <th><?php echo Language::$risksStatus; ?></th>
        <th><?php echo Language::$deviationsRecord; ?></th>
      </tr>
        <?php
        foreach ($progressReports as $progressReport) {
          echo '<tr>';
          echo '<td>' . $progressReport->task_status . '</td>';
          echo '<td>' . $progressReport->results_status . '</td>';
          echo '<td>' . $progressReport->resources_status . '</td>';
          echo '<td>' . $progressReport->costs_status . '</td>';
          echo '<td>' . $progressReport->calendar_status . '</td>';
          echo '<td>' . $progressReport->risks_status . '</td>';
          echo '<td>' . $progressReport->deviations_record . '</td>';
          echo '</tr>';
        }?>
    </table>
  </div>
  <?php } ?>

  <?php if ($correctiveActionsValue){ ?>
  <h3 id="correctiveActions"><?php echo Language::$correctiveActions; ?></h3>
  <div class="table-responsive">
    <table class="table table-hover">
      <tr>
        <th><?php echo Language::$problem; ?></th>
        <th><?php echo Language::$solution; ?></th>
        <th><?php echo Language::$correctiveActions; ?></th>
        <th><?php echo Language::$responsible; ?></th>
        <th><?php echo Language::$openDate; ?></th>
        <th><?php echo Language::$closeDate; ?></th>
      </tr>
        <?php
        foreach ($correctiveActions as $correctiveAction) {
          echo '<tr>';
          echo '<td>' . $correctiveAction->problem . '</td>';
          echo '<td>' . $correctiveAction->solution . '</td>';
          echo '<td>' . $correctiveAction->corrective_actions . '</td>';
          echo '<td>' . $correctiveAction->responsible_id . '</td>';
          echo '<td>' . $correctiveAction->open_date . '</td>';
          echo '<td>' . $correctiveAction->close_date . '</td>';
          echo '</tr>';
        }?>
    </table>
  </div>
  <?php }} ?>

  <?php if ($softwareImplementationValue){ ?>
  <h2 id="softwareImplementation"><?php echo Language::$softwareImplementation; ?></h2><hr>
  <?php if ($softwareRequirementsValue){ ?>
  <h3 id="softwareRequirements"><?php echo Language::$softwareRequirements; ?></h3>
  <?php
    $version = count($softwareRequirements);
    foreach ($softwareRequirements as $model) {
      echo '
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#softwareRequirementsModal' . $version . '">
        ' . Language::$version .' <span class="badge">' . $version . '</span>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="softwareRequirementsModal' . $version . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">' . Language::$softwareRequirements . ' ' . Language::$version .' ' . $version . '</h4>
              </div>
              <div class="modal-body">
                <h4>' . Language::$introduction . '</h4>
                <p>' . $model->introduction . '</p>
                <h4>' . Language::$userInterface . '</h4>
                <p>' . $model->user_interface . '</p>
                <h4>' . Language::$externalInterfaces . '</h4>
                <p>' . $model->external_interfaces . '</p>
                <h4>' . Language::$reliability . '</h4>
                <p>' . $model->reliability . '</p>
                <h4>' . Language::$efficiency . '</h4>
                <p>' . $model->efficiency . '</p>
                <h4>' . Language::$maintenance . '</h4>
                <p>' . $model->maintenance . '</p>
                <h4>' . Language::$portability . '</h4>
                <p>' . $model->portability . '</p>
                <h4>' . Language::$interoperability . '</h4>
                <p>' . $model->interoperability . '</p>
                <h4>' . Language::$reuse . '</h4>
                <p>' . $model->reuse . '</p>
                <h4>' . Language::$legal . '</h4>
                <p>' . $model->legal . '</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      ';
      $version--;
    }

    echo '<h4>' . Language::$introduction . '</h4><p>' . $softwareRequirements[0]->introduction . '</p>';
    echo '<h4>' . Language::$userInterface . '</h4><p>' . $softwareRequirements[0]->user_interface . '</p>';
    echo '<h4>' . Language::$externalInterfaces . '</h4><p>' . $softwareRequirements[0]->external_interfaces . '</p>';
    echo '<h4>' . Language::$reliability . '</h4><p>' . $softwareRequirements[0]->reliability . '</p>';
    echo '<h4>' . Language::$efficiency . '</h4><p>' . $softwareRequirements[0]->efficiency . '</p>';
    echo '<h4>' . Language::$maintenance . '</h4><p>' . $softwareRequirements[0]->maintenance . '</p>';
    echo '<h4>' . Language::$portability . '</h4><p>' . $softwareRequirements[0]->portability . '</p>';
    echo '<h4>' . Language::$interoperability . '</h4><p>' . $softwareRequirements[0]->interoperability . '</p>';
    echo '<h4>' . Language::$reuse . '</h4><p>' . $softwareRequirements[0]->reuse . '</p>';
    echo '<h4>' . Language::$legal . '</h4><p>' . $softwareRequirements[0]->legal . '</p>';
   ?>
   <?php } ?>

  <?php if ($userManualValue){ ?>
  <h3 id="userManual"><?php echo Language::$userManual; ?></h3>
  <?php
    $version = count($userManual);
    foreach ($userManual as $model) {
      echo '
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#userManualModal' . $version . '">
        ' . Language::$version .' <span class="badge">' . $version . '</span>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="userManualModal' . $version . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">' . Language::$userManual . ' ' . Language::$version .' ' . $version . '</h4>
              </div>
              <div class="modal-body">
                <h4>' . Language::$userProcedure . '</h4>
                <p>' . $model->user_procedure . '</p>
                <h4>' . Language::$installationProcedure . '</h4>
                <p>' . $model->installation_procedure . '</p>
                <h4>' . Language::$productDescription . '</h4>
                <p>' . $model->product_description . '</p>
                <h4>' . Language::$providedResources . '</h4>
                <p>' . $model->provided_resources . '</p>
                <h4>' . Language::$requiredEnviroment . '</h4>
                <p>' . $model->required_enviroment . '</p>
                <h4>' . Language::$problemsReport . '</h4>
                <p>' . $model->problems_report . '</p>
                <h4>' . Language::$enterProcedure . '</h4>
                <p>' . $model->enter_procedure . '</p>
                <h4>' . Language::$messages . '</h4>
                <p>' . $model->messages . '</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      ';
      $version--;
    }

    echo '<h4>' . Language::$userProcedure . '</h4><p>' . $userManual[0]->user_procedure . '</p>';
    echo '<h4>' . Language::$installationProcedure . '</h4><p>' . $userManual[0]->installation_procedure . '</p>';
    echo '<h4>' . Language::$productDescription . '</h4><p>' . $userManual[0]->product_description . '</p>';
    echo '<h4>' . Language::$providedResources . '</h4><p>' . $userManual[0]->provided_resources . '</p>';
    echo '<h4>' . Language::$requiredEnviroment . '</h4><p>' . $userManual[0]->required_enviroment . '</p>';
    echo '<h4>' . Language::$problemsReport . '</h4><p>' . $userManual[0]->problems_report . '</p>';
    echo '<h4>' . Language::$enterProcedure . '</h4><p>' . $userManual[0]->enter_procedure . '</p>';
    echo '<h4>' . Language::$messages . '</h4><p>' . $userManual[0]->messages . '</p>';
   ?>
   <?php } ?>

  <?php if ($softwareDesignValue){ ?>
  <h3 id="softwareDesign"><?php echo Language::$softwareDesign; ?></h3>
  <?php
    $version = count($softwareDesign);
    foreach ($softwareDesign as $model) {
      echo '
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#softwareDesignModal' . $version . '">
        ' . Language::$version .' <span class="badge">' . $version . '</span>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="softwareDesignModal' . $version . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">' . Language::$softwareDesign . ' ' . Language::$version .' ' . $version . '</h4>
              </div>
              <div class="modal-body">
                <h4>' . Language::$highLevelDesign . '</h4>
                <p>' . $model->high_lvl_design . '</p>
                <h4>' . Language::$lowLevelDesign . '</h4>
                <p>' . $model->low_lvl_design . '</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      ';
      $version--;
    }

    echo '<h4>' . Language::$highLevelDesign . '</h4><p>' . $softwareDesign[0]->high_lvl_design . '</p>';
    echo '<h4>' . Language::$lowLevelDesign . '</h4><p>' . $softwareDesign[0]->low_lvl_design . '</p>';
   ?>
   <?php } ?>

  <?php if ($operationManualValue){ ?>
  <h3 id="operationManual"><?php echo Language::$operationManual; ?></h3>
  <?php
    $version = count($operationManual);
    foreach ($operationManual as $model) {
      echo '
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#operationManualModal' . $version . '">
        ' . Language::$version .' <span class="badge">' . $version . '</span>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="operationManualModal' . $version . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">' . Language::$operationManual . ' ' . Language::$version .' ' . $version . '</h4>
              </div>
              <div class="modal-body">
                <h4>' . Language::$operationCriteria . '</h4>
                <p>' . $model->operation_criteria . '</p>
                <h4>' . Language::$operativeEnviroment . '</h4>
                <p>' . $model->operative_enviroment . '</p>
                <h4>' . Language::$securityAlerts . '</h4>
                <p>' . $model->security_alerts . '</p>
                <h4>' . Language::$deploymentSequence . '</h4>
                <p>' . $model->deployment_sequence . '</p>
                <h4>' . Language::$faq . '</h4>
                <p>' . $model->faq . '</p>
                <h4>' . Language::$aditionalSources . '</h4>
                <p>' . $model->aditional_sources . '</p>
                <h4>' . Language::$securityCertification . '</h4>
                <p>' . $model->security_certification . '</p>
                <h4>' . Language::$guaranty . '</h4>
                <p>' . $model->guaranty . '</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      ';
      $version--;
    }

    echo '<h4>' . Language::$operationCriteria . '</h4><p>' . $operationManual[0]->operation_criteria . '</p>';
    echo '<h4>' . Language::$operativeEnviroment . '</h4><p>' . $operationManual[0]->operative_enviroment . '</p>';
    echo '<h4>' . Language::$securityAlerts . '</h4><p>' . $operationManual[0]->security_alerts . '</p>';
    echo '<h4>' . Language::$deploymentSequence . '</h4><p>' . $operationManual[0]->deployment_sequence . '</p>';
    echo '<h4>' . Language::$faq . '</h4><p>' . $operationManual[0]->faq . '</p>';
    echo '<h4>' . Language::$aditionalSources . '</h4><p>' . $operationManual[0]->aditional_sources . '</p>';
    echo '<h4>' . Language::$securityCertification . '</h4><p>' . $operationManual[0]->security_certification . '</p>';
    echo '<h4>' . Language::$guaranty . '</h4><p>' . $operationManual[0]->guaranty . '</p>';
   ?>
   <?php } ?>

  <?php if ($maintenanceManualValue){ ?>
  <h3 id="maintenanceManual"><?php echo Language::$maintenanceManual; ?></h3>
  <?php
    $version = count($maintenanceManual);
    foreach ($maintenanceManual as $model) {
      echo '
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#maintenanceManualModal' . $version . '">
        ' . Language::$version .' <span class="badge">' . $version . '</span>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="maintenanceManualModal' . $version . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">' . Language::$maintenanceManual . ' ' . Language::$version .' ' . $version . '</h4>
              </div>
              <div class="modal-body">
                <h4>' . Language::$enviroment . '</h4>
                <p>' . $model->enviroment . '</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      ';
      $version--;
    }

    echo '<h4>' . Language::$enviroment . '</h4><p>' . $maintenanceManual[0]->enviroment . '</p>';
   ?>
   <?php } ?>

  <?php if ($softwareComponentsValue){ ?>
  <h3 id="softwareComponent"><?php echo Language::$softwareComponents; ?></h3>
  <div class="table-responsive">
    <table class="table table-hover">
      <tr>
        <th><?php echo Language::$name; ?></th>
        <th><?php echo Language::$description; ?></th>
        <th><?php echo Language::$file; ?></th>
      </tr>
        <?php
        foreach ($softwareComponents as $softwareComponent) {
          echo '<tr>';
          echo '<td>' . $softwareComponent->name . '</td>';
          echo '<td>' . $softwareComponent->description . '</td>';
          echo '<td>' . $softwareComponent->file . '</td>';
          echo '</tr>';
        }?>
    </table>
  </div>
  <?php } ?>

  <?php if ($testReportValue){ ?>
  <h3 id="testReport"><?php echo Language::$testReports; ?></h3>
  <div class="table-responsive">
    <table class="table table-hover">
      <tr>
        <th><?php echo Language::$resume; ?></th>
        <th><?php echo Language::$testCase; ?></th>
        <th><?php echo Language::$tester; ?></th>
        <th><?php echo Language::$defectLevel; ?></th>
        <th><?php echo Language::$affectedFunctions; ?></th>
        <th><?php echo Language::$originDate; ?></th>
        <th><?php echo Language::$resolutionDate; ?></th>
        <th><?php echo Language::$solver; ?></th>
      </tr>
      <tr>
        <?php
        foreach ($testReports as $testReport) {
          echo '<tr>';
          echo '<td>' . $testReport->resume . '</td>';
          echo '<td>' . $testReport->test_case . '</td>';
          echo '<td>' . Functions::personFormat($testReport->tester_id) . '</td>';
          echo '<td>' . $testReport->defect_level . '</td>';
          echo '<td>' . $testReport->affected_functions . '</td>';
          echo '<td>' . $testReport->origin_date . '</td>';
          echo '<td>' . $testReport->resolution_date . '</td>';
          echo '<td>' . Functions::personFormat($testReport->solver_id) . '</td>';
          echo '</tr>';
        }?>
      </tr>
    </table>
  </div>
  <?php }} ?>

  <?php if ($projectClosureValue){ ?>
  <h2 id="projectClosure"><?php echo Language::$projectClosure; ?></h2><hr>
  <?php if ($actOfAcceptanceValue){ ?>
  <h3 id="actOfAcceptance"><?php echo Language::$actOfAcceptance; ?></h3>
  <?php
    echo '<h4>' . Language::$date . '</h4><p>' . $actOfAcceptance->date . '</p>';
    echo '<h4>' . Language::$deliveryRegister . '</h4><p>' . $actOfAcceptance->register . '</p>';
    echo '<h4>' . Language::$deliveredItems . '</h4><p>' . $actOfAcceptance->delivered_items . '</p>';
    echo '<h4>' . Language::$criteriaVerification . '</h4><p>' . $actOfAcceptance->criteria_verification . '</p>';
    echo '<h4>' . Language::$pendingIssues . '</h4><p>' . $actOfAcceptance->pending_issues . '</p>';
    ?>
  <?php }} ?>
<br><br><br><br>