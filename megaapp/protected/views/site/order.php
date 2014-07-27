<?php echo CHtml::beginForm(); ?>

    <div class="form">

        <div class="row">
            <?php echo CHtml::activeLabel($phone,'phoneNumber'); ?>
            <?php echo CHtml::activeTextField($phone,'phoneNumber'); ?>
        </div>

        <div class="row buttons">
            <?php echo CHtml::submitButton('Submit'); ?>
        </div>

    </div>

<?php echo CHtml::endForm(); ?>