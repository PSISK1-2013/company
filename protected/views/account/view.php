<?php
/* @var $this AccountController */
/* @var $model Account */

$this->breadcrumbs = array(
    'Konta' => array('index'),
    $model->account_id,
);

$this->menu = array(
    array('label' => 'Lista kont', 'url' => array('index')),
    array('label' => 'Stwórz konto', 'url' => array('create')),
    array('label' => 'Aktualizuj konto', 'url' => array('update', 'id' => $model->account_id)),
    array('label' => 'Usuń konto', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->account_id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Zarządzaj kontami', 'url' => array('admin')),
);
?>

<h1>View Account #<?php echo $model->account_id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'account_id',
        'type',
        'login',
        'password'
    ),
));
?>
