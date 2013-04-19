<?php

class AccountController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Account;
        $account = $model->getRelated('account_data');
        
        if (!$account) {
            $account = new AccountData;
            $account->account_id = $model->account_id;
        }

        if (isset($_POST['Account'])) {
            if ($this->saveModels($model, $account)) {
                $this->redirect(array('update', 'id' => $model->account_id));
            }
        }

        $this->render('create', array(
            'model' => $model,
            'account' => $account
        ));
    }

    /**
     * Function saves Account and it's related data
     * @param Account $model
     * @return boolean
     */
    protected function saveModels(Account &$model, AccountData &$account) {
        $model->attributes = $_POST['Account'];
        $account->attributes = $_POST['AccountData'];

        if ($model->validate() && $account->validate()) {
            if ($model->save()) {
                $account->account_id = $model->account_id;
                $account->save();
                return true;
            }
        }

        return false;
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $account = $model->getRelated('account_data');
        if (!$account) {
            $account = new AccountData;
            $account->account_id = $model->account_id;
        }

        if (isset($_POST['Account'])) {
            if ($this->saveModels($model, $account)) {
                $this->redirect(array('update', 'id' => $model->account_id));
            }
        }

        $this->render('update', array(
            'model' => $model,
            'account' => $account
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Account', array(
            'criteria' => array(
                'with' => array(
                    'account_data',
                    'account_type'
                ),
                'together' => true
            )
        ));
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Account('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Account']))
            $model->attributes = $_GET['Account'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Account the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Account::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

}
