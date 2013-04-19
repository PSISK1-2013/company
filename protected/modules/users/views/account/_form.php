<?php
/* @var $this AccountController */
/* @var $model Account */
/* @var $account AccountData */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'account-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Pola z <span class="required">*</span>są wymagane.</p>
    <?php echo $form->errorSummary(array($model, $account)); ?>
    <?php
    $this->widget('CTabView', array(
        'tabs' => array(
            'tab1' => array(
                'title' => 'Konto użytkownika',
                'view' => 'tabs/_account',
                'data' => array('form' => $form, 'model' => $model)
            ),
            'tab2' => array(
                'title' => 'Dane personalne użytkownika',
                'view' => 'tabs/_personal',
                'data' => array('form' => $form, 'account' => $account)
            ),
        ),
    ))
    ?>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Stwórz' : 'Zapisz'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->