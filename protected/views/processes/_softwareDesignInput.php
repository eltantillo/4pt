<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#softwareDesignModal">
<?php echo Language::$softwareDesign; ?>
</button>

<!-- Modal -->
<div class="modal fade" id="softwareDesignModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo Language::$softwareDesign; ?></h4>
      </div>
      <div class="modal-body">
<?php 
  echo '<h3>' . Language::$highLevelDesign . '</h3>';
  echo $softwareDesign->high_lvl_design;
  echo ($softwareDesign->high_lvl_design_file != null ? '<a href="' . Yii::app()->request->baseUrl . '/' . $softwareDesign->high_lvl_design_file . '" target="_blank">Archivo adjunto</a>' : '');
  echo '<h3>' . Language::$lowLevelDesign . '</h3>';
  echo $softwareDesign->low_lvl_design;
  echo ($softwareDesign->low_lvl_design_file != null ? '<a href="' . Yii::app()->request->baseUrl . '/' . $softwareDesign->low_lvl_design_file . '" target="_blank">Archivo adjunto</a>' : '');
?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>