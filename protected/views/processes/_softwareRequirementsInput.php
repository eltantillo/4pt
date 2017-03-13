<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#softwareRequirementsModal">
Software Requirements
</button>

<!-- Modal -->
<div class="modal fade" id="softwareRequirementsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Software Requirements</h4>
      </div>
      <div class="modal-body">
<?php 
  echo '<h3>Introduction</h3>';
  echo '<p>' . $softwareRequirements->introduction . '</p>';
  echo '<h3>User Interface</h3>';
  echo $softwareRequirements->user_interface;
  echo '<h3>External Interfaces</h3>';
  echo $softwareRequirements->external_interfaces;
  echo '<h3>Reliability</h3>';
  echo $softwareRequirements->reliability;
  echo '<h3>Efficiency</h3>';
  echo $softwareRequirements->efficiency;
  echo '<h3>Maintenance</h3>';
  echo $softwareRequirements->maintenance;
  echo '<h3>Portability</h3>';
  echo $softwareRequirements->portability;
  echo '<h3>Interoperability</h3>';
  echo $softwareRequirements->interoperability;
  echo '<h3>Reuse</h3>';
  echo $softwareRequirements->reuse;
  echo '<h3>Legal</h3>';
  echo $softwareRequirements->legal;
?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>