<?php
/* @var $this AccountController */
/* @var $model Account */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'account-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'type'); ?>
        <?php echo $form->dropDownList($model, 'type', CHtml::listData(AccountType::model()->findAll(), 'account_type_id', 'name')); ?>
        <?php echo $form->error($model, 'type'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'login'); ?>
        <?php echo $form->textField($model, 'login', array('size' => 30, 'maxlength' => 30)); ?>
        <?php echo $form->error($model, 'login'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'password'); ?>
        <?php echo $form->passwordField($model, 'password', array('value' => '', 'size' => 60, 'maxlength' => 100, 'autocomplete' => 'off')); ?>
        <?php echo $form->error($model, 'password'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'repeatPassword'); ?>
        <?php echo $form->passwordField($model, 'repeatPassword', array('value' => '', 'size' => 60, 'maxlength' => 100, 'autocomplete' => 'off')); ?>
        <?php echo $form->error($model, 'repeatPassword'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->