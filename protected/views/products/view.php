<?php
$this->breadcrumbs=array(
	Language::$products=>array('index'),
	$project->title,
);
?>

<div class="page-header">
  <h1><?php echo $project->title . ' (' . $project->acronym . ')'; ?></h1>
</div>

<ol>
  <li><a href="#projectPlan"><?php echo Language::$projectPlan; ?></a></li>
  <ol>
    <li><a href="#workStatement"><?php  echo Language::$workStatement; ?></a></li>
    <li><a href="#tasks"><?php echo Language::$tasks; ?></a></li>
    <li><a href="#risks"><?php echo Language::$risks; ?></a></li>
    <li><a href="#minutes"><?php echo Language::$minutes; ?></a></li>
  </ol>
  <li><a href="#projectExecution"><?php echo Language::$projectExecution; ?></a></li>
  <ol>
    <li><a href="#progressReport"><?php echo Language::$progressReport; ?></a></li>
    <li><a href="#correctiveActions"><?php echo Language::$correctiveActions; ?></a></li>
  </ol>
  <li><a href="#softwareImplementation"><?php echo Language::$softwareImplementation; ?></a></li>
  <ol>
    <li><a href="#softwareRequirements"><?php echo Language::$softwareRequirements; ?></a></li>
    <li><a href="#userManual"><?php echo Language::$userManual; ?></a></li>
    <li><a href="#softwareDesign"><?php echo Language::$softwareDesign; ?></a></li>
    <li><a href="#operationManual"><?php echo Language::$operationManual; ?></a></li>
    <li><a href="#maintenanceManual"><?php echo Language::$maintenanceManual; ?></a></li>
    <li><a href="#softwareComponent"><?php echo Language::$softwareComponents; ?></a></li>
    <li><a href="#actOfAcceptance"><?php echo Language::$actOfAcceptance; ?></a></li>
  </ol>
</ol>

  <h2 id="projectPlan"><?php echo Language::$projectPlan; ?></h2><hr>
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
                <h3>' . Language::$productDescription . '</h3>
                <p>' . $model->product_description . '</p>
                <h3>' . Language::$scope . '</h3>
                <p>' . $model->scope . '</p>
                <h3>' . Language::$objectives . '</h3>
                <p>' . $model->objectives . '</p>
                <h3>' . Language::$deliverables . '</h3>
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

    echo '<h4>' . Language::$productDescription . '</h4>' . $workStatement[0]->product_description;
    echo '<h4>' . Language::$scope . '</h4>' . $workStatement[0]->scope;
    echo '<h4>' . Language::$objectives . '</h4>' . $workStatement[0]->objectives;
    echo '<h4>' . Language::$deliverables . '</h4>' . $workStatement[0]->deliverables;
   ?>

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
      <tr>
        <?php
        foreach ($tasks as $task) {
          echo '<td>' . $task->task . '</td>';
          echo '<td>' . $task->duration . '</td>';
          echo '<td>' . $task->start_date . '</td>';
          echo '<td>' . $task->resources . '</td>';
          echo '<td>' . Functions::personFormat($task->people_id) . '</td>';
        }?>
      </tr>
    </table>
  </div>

  <h3 id="risks"><?php echo Language::$risks; ?></h3>
  <div class="table-responsive">
    <table class="table table-hover">
      <tr>
        <th><?php echo Language::$riskDescription; ?></th>
        <th><?php echo Language::$cost; ?></th>
      </tr>
      <tr>
        <?php
        foreach ($risks as $risk) {
        echo '<td>' . $risk->risk . '</td>';
        echo '<td>$ ' . $risk->cost . '</td>';
        }?>
      </tr>
    </table>
  </div>

  <h3 id="minutes"><?php echo Language::$minutes; ?></h3>
  <div class="table-responsive">
    <table class="table table-hover">
      <tr>
        <th><?php echo Language::$purpose; ?></th>
        <th><?php echo Language::$date; ?></th>
        <th><?php echo Language::$place; ?></th>
        <th><?php echo Language::$issuesRaised; ?></th>
        <th><?php echo Language::$openIssues; ?></th>
        <th><?php echo Language::$agreements; ?></th>
        <th><?php echo Language::$nextMeeting; ?></th>
      </tr>
      <tr>
        <?php
        foreach ($minutes as $minute) {
          echo '<td>' . $minute->purpose . '</td>';
          echo '<td>' . $minute->date . '</td>';
          echo '<td>' . $minute->place . '</td>';
          echo '<td>' . $minute->issues_raised . '</td>';
          echo '<td>' . $minute->open_issues . '</td>';
          echo '<td>' . $minute->agreements . '</td>';
          echo '<td>' . $minute->next_meeting . '</td>';
        }?>
      </tr>
    </table>
  </div>

  <h2 id="projectExecution"><?php echo Language::$projectExecution; ?></h2><hr>
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
      <tr>
        <?php
        foreach ($progressReports as $progressReport) {
        echo '<td>' . $progressReport->task_status . '</td>';
        echo '<td>' . $progressReport->results_status . '</td>';
        echo '<td>' . $progressReport->resources_status . '</td>';
        echo '<td>' . $progressReport->costs_status . '</td>';
        echo '<td>' . $progressReport->calendar_status . '</td>';
        echo '<td>' . $progressReport->risks_status . '</td>';
        echo '<td>' . $progressReport->deviations_record . '</td>';
        }?>
      </tr>
    </table>
  </div>

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
      <tr>
        <?php
        foreach ($correctiveActions as $correctiveAction) {
        echo '<td>' . $correctiveAction->problem . '</td>';
        echo '<td>' . $correctiveAction->solution . '</td>';
        echo '<td>' . $correctiveAction->corrective_actions . '</td>';
        echo '<td>' . $correctiveAction->responsible_id . '</td>';
        echo '<td>' . $correctiveAction->open_date . '</td>';
        echo '<td>' . $correctiveAction->close_date . '</td>';
        }?>
      </tr>
    </table>
  </div>

  <h2 id="softwareImplementation"><?php echo Language::$softwareImplementation; ?></h2><hr>
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
                <h3>' . Language::$introduction . '</h3>
                <p>' . $model->introduction . '</p>
                <h3>' . Language::$userInterface . '</h3>
                <p>' . $model->user_interface . '</p>
                <h3>' . Language::$externalInterfaces . '</h3>
                <p>' . $model->external_interfaces . '</p>
                <h3>' . Language::$reliability . '</h3>
                <p>' . $model->reliability . '</p>
                <h3>' . Language::$efficiency . '</h3>
                <p>' . $model->efficiency . '</p>
                <h3>' . Language::$maintenance . '</h3>
                <p>' . $model->maintenance . '</p>
                <h3>' . Language::$portability . '</h3>
                <p>' . $model->portability . '</p>
                <h3>' . Language::$interoperability . '</h3>
                <p>' . $model->interoperability . '</p>
                <h3>' . Language::$reuse . '</h3>
                <p>' . $model->reuse . '</p>
                <h3>' . Language::$legal . '</h3>
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

    echo '<h4>' . Language::$introduction . '</h4>' . $softwareRequirements[0]->introduction;
    echo '<h4>' . Language::$userInterface . '</h4>' . $softwareRequirements[0]->user_interface;
    echo '<h4>' . Language::$externalInterfaces . '</h4>' . $softwareRequirements[0]->external_interfaces;
    echo '<h4>' . Language::$reliability . '</h4>' . $softwareRequirements[0]->reliability;
    echo '<h4>' . Language::$efficiency . '</h4>' . $softwareRequirements[0]->efficiency;
    echo '<h4>' . Language::$maintenance . '</h4>' . $softwareRequirements[0]->maintenance;
    echo '<h4>' . Language::$portability . '</h4>' . $softwareRequirements[0]->portability;
    echo '<h4>' . Language::$interoperability . '</h4>' . $softwareRequirements[0]->interoperability;
    echo '<h4>' . Language::$reuse . '</h4>' . $softwareRequirements[0]->reuse;
    echo '<h4>' . Language::$legal . '</h4>' . $softwareRequirements[0]->legal;
   ?>
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
                <h3>' . Language::$userProcedure . '</h3>
                <p>' . $model->user_procedure . '</p>
                <h3>' . Language::$installationProcedure . '</h3>
                <p>' . $model->installation_procedure . '</p>
                <h3>' . Language::$productDescription . '</h3>
                <p>' . $model->product_description . '</p>
                <h3>' . Language::$providedResources . '</h3>
                <p>' . $model->provided_resources . '</p>
                <h3>' . Language::$requiredEnviroment . '</h3>
                <p>' . $model->required_enviroment . '</p>
                <h3>' . Language::$problemsReport . '</h3>
                <p>' . $model->problems_report . '</p>
                <h3>' . Language::$enterProcedure . '</h3>
                <p>' . $model->enter_procedure . '</p>
                <h3>' . Language::$messages . '</h3>
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

    echo '<h4>' . Language::$userProcedure . '</h4>' . $userManual[0]->user_procedure;
    echo '<h4>' . Language::$installationProcedure . '</h4>' . $userManual[0]->installation_procedure;
    echo '<h4>' . Language::$productDescription . '</h4>' . $userManual[0]->product_description;
    echo '<h4>' . Language::$providedResources . '</h4>' . $userManual[0]->provided_resources;
    echo '<h4>' . Language::$requiredEnviroment . '</h4>' . $userManual[0]->required_enviroment;
    echo '<h4>' . Language::$problemsReport . '</h4>' . $userManual[0]->problems_report;
    echo '<h4>' . Language::$enterProcedure . '</h4>' . $userManual[0]->enter_procedure;
    echo '<h4>' . Language::$messages . '</h4>' . $userManual[0]->messages;
   ?>

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
                <h3>' . Language::$highLevelDesign . '</h3>
                <p>' . $model->high_lvl_design . '</p>
                <h3>' . Language::$lowLevelDesign . '</h3>
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

    echo '<h4>high_lvl_design</h4>' . $softwareDesign[0]->high_lvl_design;
    echo '<h4>low_lvl_design</h4>' . $softwareDesign[0]->low_lvl_design;
   ?>

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
                <h3>' . Language::$operationCriteria . '</h3>
                <p>' . $model->operation_criteria . '</p>
                <h3>' . Language::$operativeEnviroment . '</h3>
                <p>' . $model->operative_enviroment . '</p>
                <h3>' . Language::$securityAlerts . '</h3>
                <p>' . $model->security_alerts . '</p>
                <h3>' . Language::$deploymentSequence . '</h3>
                <p>' . $model->deployment_sequence . '</p>
                <h3>' . Language::$faq . '</h3>
                <p>' . $model->faq . '</p>
                <h3>' . Language::$aditionalSources . '</h3>
                <p>' . $model->aditional_sources . '</p>
                <h3>' . Language::$securityCertification . '</h3>
                <p>' . $model->security_certification . '</p>
                <h3>' . Language::$guaranty . '</h3>
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

    echo '<h4>' . Language::$operationCriteria . '</h4>' . $operationManual[0]->operation_criteria;
    echo '<h4>' . Language::$operativeEnviroment . '</h4>' . $operationManual[0]->operative_enviroment;
    echo '<h4>' . Language::$securityAlerts . '</h4>' . $operationManual[0]->security_alerts;
    echo '<h4>' . Language::$deploymentSequence . '</h4>' . $operationManual[0]->deployment_sequence;
    echo '<h4>' . Language::$faq . '</h4>' . $operationManual[0]->faq;
    echo '<h4>' . Language::$aditionalSources . '</h4>' . $operationManual[0]->aditional_sources;
    echo '<h4>' . Language::$securityCertification . '</h4>' . $operationManual[0]->security_certification;
    echo '<h4>' . Language::$guaranty . '</h4>' . $operationManual[0]->guaranty;
   ?>

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
                <h3>' . Language::$enviroment . '</h3>
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

    echo '<h4>' . Language::$enviroment . '</h4>' . $maintenanceManual[0]->enviroment;
   ?>

  <h3 id="softwareComponent"><?php echo Language::$softwareComponents; ?></h3>
  <div class="table-responsive">
    <table class="table table-hover">
      <tr>
        <th><?php echo Language::$name; ?></th>
        <th><?php echo Language::$description; ?></th>
        <th><?php echo Language::$file; ?></th>
      </tr>
      <tr>
        <?php
        foreach ($softwareComponents as $softwareComponent) {
        echo '<td>' . $softwareComponent->name . '</td>';
        echo '<td>' . $softwareComponent->description . '</td>';
        echo '<td>' . $softwareComponent->file . '</td>';
        }?>
      </tr>
    </table>
  </div>

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
        echo '<td>' . $testReport->resume . '</td>';
        echo '<td>' . $testReport->test_case . '</td>';
        echo '<td>' . Functions::personFormat($testReport->tester_id) . '</td>';
        echo '<td>' . $testReport->defect_level . '</td>';
        echo '<td>' . $testReport->affected_functions . '</td>';
        echo '<td>' . $testReport->origin_date . '</td>';
        echo '<td>' . $testReport->resolution_date . '</td>';
        echo '<td>' . Functions::personFormat($testReport->solver_id) . '</td>';
        }?>
      </tr>
    </table>
  </div>


  <h3 id="actOfAcceptance"><?php echo Language::$actOfAcceptance; ?></h3>
  <?php
    echo '<h4>' . Language::$date . '</h4>' . $actOfAcceptance->date;
    echo '<h4>' . Language::$deliveryRegister . '</h4>' . $actOfAcceptance->register;
    echo '<h4>' . Language::$deliveredItems . '</h4>' . $actOfAcceptance->delivered_items;
    echo '<h4>' . Language::$criteriaVerification . '</h4>' . $actOfAcceptance->criteria_verification;
    echo '<h4>' . Language::$pendingIssues . '</h4>' . $actOfAcceptance->pending_issues;
   ?>
<br><br><br><br>