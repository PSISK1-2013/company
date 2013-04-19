<div class="row">
    <?php echo $form->labelEx($account, 'name'); ?>
    <?php echo $form->textField($account, 'name', array('size' => 30, 'maxlength' => 30)); ?>
    <?php echo $form->error($account, 'name'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($account, 'surname'); ?>
    <?php echo $form->textField($account, 'surname', array('size' => 30, 'maxlength' => 30)); ?>
    <?php echo $form->error($account, 'surname'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($account, 'age'); ?>
    <?php echo $form->textField($account, 'age', array('size' => 30, 'maxlength' => 30)); ?>
    <?php echo $form->error($account, 'age'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($account, 'married'); ?>
    <?php echo $form->checkBox($account, 'married'); ?>
    <?php echo $form->error($account, 'married'); ?>
</div>