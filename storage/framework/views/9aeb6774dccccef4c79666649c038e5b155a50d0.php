<?php /*<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>*/ ?>

<!-- Modal -->
<?php /*<div id="myModal" class="modal fade" role="dialog">*/ ?>
<div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><?php echo e(isset($title)?$title:''); ?></h4>
        </div>
        <div class="modal-body">
            <div class="mensaje_modal"></div>
            <?php echo isset($body)?$body:''; ?>

            <?php /*<p>Some text in the modal.</p>*/ ?>
        </div>

        <div class="modal-footer">
            <?php echo isset($footer)?$footer:''; ?>

                <?php /*<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>*/ ?>
        </div>
        </div>

    </div>
<?php /*</div>*/ ?>
