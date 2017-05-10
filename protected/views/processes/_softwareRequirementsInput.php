<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#softwareRequirementsModal">
<?php echo Language::$softwareRequirements; ?>
</button>

<!-- Modal -->
<div class="modal fade" id="softwareRequirementsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo Language::$softwareRequirements; ?></h4>
      </div>
      <div class="modal-body">
<?php 
  echo '<h3>' . Language::$introduction . '</h3>';
  echo '<p>' . $softwareRequirements->introduction . '</p>';
  echo '<h3>' . Language::$userInterface . '</h3>';
  echo $softwareRequirements->user_interface;
  echo '<h3>' . Language::$externalInterfaces . '</h3>';
  echo $softwareRequirements->external_interfaces;
  echo '<h3>' . Language::$reliability . '</h3>';
  echo $softwareRequirements->reliability;
  echo '<h3>' . Language::$efficiency . '</h3>';
  echo $softwareRequirements->efficiency;
  echo '<h3>' . Language::$maintenance . '</h3>';
  echo $softwareRequirements->maintenance;
  echo '<h3>' . Language::$portability . '</h3>';
  echo $softwareRequirements->portability;
  echo '<h3>' . Language::$interoperability . '</h3>';
  echo $softwareRequirements->interoperability;
  echo '<h3>' . Language::$reuse . '</h3>';
  echo $softwareRequirements->reuse;
  echo '<h3>' . Language::$legal . '</h3>';
  echo $softwareRequirements->legal;
?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>