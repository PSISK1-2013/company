<?php
/* @var $this AccountController */
/* @var $model Account */

$this->breadcrumbs = array(
    'Konta' => array('index'),
    $model->account_id => array('view', 'id' => $model->account_id),
    'Aktualizuj',
);

$this->menu = array(
    array('label' => 'Lista kont', 'url' => array('index')),
    array('label' => 'Stwórz konto', 'url' => array('create')),
    array('label' => 'Zobacz konto', 'url' => array('view', 'id' => $model->account_id)),
    array('label' => 'Zarządzaj kontami', 'url' => array('admin')),
);
?>

<h1>Update Account <?php echo $model->account_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>