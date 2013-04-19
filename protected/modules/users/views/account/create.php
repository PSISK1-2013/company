<?php
/* @var $this AccountController */
/* @var $model Account */
/* @var $account AccountData */

$this->breadcrumbs = array(
    'Konta' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'Lista kont', 'url' => array('index')),
    array('label' => 'Zarządzaj kontami', 'url' => array('admin')),
);
?>

<h1>Utwórz konto</h1>

<?php echo $this->renderPartial('_form', array('model' => $model, 'account' => $account)); ?>