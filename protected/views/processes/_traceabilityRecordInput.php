<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#traceabilityRecordModal">
Traceability Record
</button>

<!-- Modal -->
<div class="modal fade" id="traceabilityRecordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="Close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Traceability Record</h4>
      </div>
      <div class="modal-body">
<?php 
  echo '<h3>Huh?</h3>';
  echo $traceabilityRecord->traceability_recordcol;
?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>