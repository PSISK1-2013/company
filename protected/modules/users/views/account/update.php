<?php
/* @var $this AccountController */
/* @var $model Account */

$this->breadcrumbs = array(
    'Konta' => array('index'),
    $model->login => array('view', 'id' => $model->account_id),
    'Edycja',
);

$this->menu = array(
    array('label' => 'Utwórz konto', 'url' => array('create')),
    array('label' => 'Lista kont', 'url' => array('index')),    
    array('label' => 'Zarządzaj kontami', 'url' => array('admin')),
    array('label' => 'Usuń konto', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->account_id), 'confirm' => 'Czy jesteś pewien, że chcesz usunąć to konto ?')),
);
?>

<h1>Edytujesz konto <?php echo $model->login; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model, 'account' => $account)); ?>