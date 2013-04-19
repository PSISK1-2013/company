<?php
/* @var $this AccountController */
/* @var $data Account */
/* @var $account_data AccountData */
/* @var $account_type AccountType */

$account_type = $data->getRelated('account_type');
$account_data = $data->getRelated('account_data');
?>

<a class="view" href="<?php echo $this->createUrl('update', array('id' => $data->account_id)) ?>">

    <b><?php echo CHtml::encode($data->getAttributeLabel('account_id')); ?>:</b>
    <?php echo CHtml::encode($data->login); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
    <?php echo CHtml::encode($account_type->name); ?>
    <br />

</a>