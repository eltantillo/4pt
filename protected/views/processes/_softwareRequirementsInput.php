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
  echo '<h3>' . Language::$introduction . '</h3><p>' . $softwareRequirements->introduction . '</p>';
  echo '<h3>Funcionalidad</h3><p>' . $softwareRequirements->functionality . '</p>';
  if ($softwareRequirements->functionality_file != null) {
    echo '<a href="' . Yii::app()->request->baseUrl . '/' . $softwareRequirements->functionality_file . '" target="_blank"><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span> Archivo adjunto</a>';
  }
  echo '<h3>' . Language::$userInterface . '</h3><p>' . $softwareRequirements->user_interface . '</p>';
  if ($softwareRequirements->user_interface_file != null) {
    echo '<a href="' . Yii::app()->request->baseUrl . '/' . $softwareRequirements->user_interface_file . '" target="_blank"><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span> Archivo adjunto</a>';
  }
  echo '<h3>' . Language::$externalInterfaces . '</h3><p>' . $softwareRequirements->external_interfaces . '</p>';
  if ($softwareRequirements->external_interfaces_file != null) {
    echo '<a href="' . Yii::app()->request->baseUrl . '/' . $softwareRequirements->external_interfaces_file . '" target="_blank"><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span> Archivo adjunto</a>';
  }
  echo '<h3>' . Language::$reliability . '</h3><p>' . $softwareRequirements->reliability . '</p>';
  if ($softwareRequirements->reliability_file != null) {
    echo '<a href="' . Yii::app()->request->baseUrl . '/' . $softwareRequirements->reliability_file . '" target="_blank"><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span> Archivo adjunto</a>';
  }
  echo '<h3>' . Language::$efficiency . '</h3><p>' . $softwareRequirements->efficiency . '</p>';
  if ($softwareRequirements->efficiency_file != null) {
    echo '<a href="' . Yii::app()->request->baseUrl . '/' . $softwareRequirements->efficiency_file . '" target="_blank"><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span> Archivo adjunto</a>';
  }
  echo '<h3>' . Language::$maintenance . '</h3><p>' . $softwareRequirements->maintenance . '</p>';
  if ($softwareRequirements->maintenance_file != null) {
    echo '<a href="' . Yii::app()->request->baseUrl . '/' . $softwareRequirements->maintenance_file . '" target="_blank"><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span> Archivo adjunto</a>';
  }
  echo '<h3>' . Language::$portability . '</h3><p>' . $softwareRequirements->portability . '</p>';
  if ($softwareRequirements->portability_file != null) {
    echo '<a href="' . Yii::app()->request->baseUrl . '/' . $softwareRequirements->portability_file . '" target="_blank"><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span> Archivo adjunto</a>';
  }
  echo '<h3>Limitaciones/restricciones del diseño y construcción</h3><p>' . $softwareRequirements->limitations . '</p>';
  if ($softwareRequirements->limitations_file != null) {
    echo '<a href="' . Yii::app()->request->baseUrl . '/' . $softwareRequirements->limitations_file . '" target="_blank"><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span> Archivo adjunto</a>';
  }
  echo '<h3>' . Language::$interoperability . '</h3><p>' . $softwareRequirements->interoperability . '</p>';
  if ($softwareRequirements->interoperability_file != null) {
    echo '<a href="' . Yii::app()->request->baseUrl . '/' . $softwareRequirements->interoperability_file . '" target="_blank"><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span> Archivo adjunto</a>';
  }
  echo '<h3>' . Language::$reuse . '</h3><p>' . $softwareRequirements->reuse . '</p>';
  if ($softwareRequirements->reuse_file != null) {
    echo '<a href="' . Yii::app()->request->baseUrl . '/' . $softwareRequirements->reuse_file . '" target="_blank"><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span> Archivo adjunto</a>';
  }
  echo '<h3>' . Language::$legal . '</h3><p>' . $softwareRequirements->legal . '</p>';
  if ($softwareRequirements->legal_file != null) {
    echo '<a href="' . Yii::app()->request->baseUrl . '/' . $softwareRequirements->legal_file . '" target="_blank"><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span> Archivo adjunto</a>';
  }
?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>