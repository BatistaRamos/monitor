<?php

class VideoController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout='//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters()
    {
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
    public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('index','view','status'),
                'users'=>array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('create','update','delete','admin'),
                'users'=>array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('admin','delete'),
                'users'=>array('admin'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view',array(
            'model'=>$this->loadModel($id),
        ));
    }

    
public function actionStatus()
    {
	/*
	$xml = simplexml_load_file('http://192.168.56.101/:8086/serverinfo');
	$response = array();
	foreach ($xml->VHost->Application as $value) {
	response[] = array('name'=>(String)$value->Name, 'status'=>(String)$value->Status);
	}
	*/
	$response = $this->statusOnServer();
	Yii::app()->end(json_encode($response));
    }
public function actionTotalUsers()
    {
	/*
	$xml = simplexml_load_file('http://192.168.56.101/:8086/serverinfo');
	$response = array();
	foreach ($xml->VHost->Application as $value) {
	response[] = array('name'=>(String)$value->Name, 'status'=>(String)$value->Status);
	}
	*/
	$response = $this->totalUsers();
	Yii::app()->end(json_encode($response);
    }
    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model=new Video;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Video']))
        {
            $model->attributes=$_POST['Video'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->id));
        }

        $this->render('create',array(
            'model'=>$model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model=$this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Video']))
        {
            $model->attributes=$_POST['Video'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->id));
        }

        $this->render('update',array(
            'model'=>$model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if(!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $dataProvider=new CActiveDataProvider('Video');
        $this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model=new Video('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Video']))
            $model->attributes=$_GET['Video'];

        $this->render('admin',array(
            'model'=>$model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Video the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model=Video::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Video $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='video-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }


	private function statusOnServer()
	{
		$regex = '/^(\d{4}-\d{2}-\d{2})\s(\d{2}:\d{2}:\d{2})\s\w+\s(\w+-?)\s\w+\s\w+\s\w+\s(\w+).*$/m';
		$path = "/usr/local/WowzaStreamingEngine/logs/wowzastreamingengine_access.log";

		$content = file_get_contents($path);

		preg_match_all($regex, $content, $matches);

		$videos = array();

		foreach ($matches[4] as $key => $value) {
			$s  = $value.'_v';
			$videos[$s]['data']   = $matches[1][$key].' '.$matches[2][$key];
			$videos[$s]['status'] = $matches[3][$key];
		}
		return $videos;
	}
private function totalUsers(){
		$path = "/var/www/html/monitor/scripts/viewers.txt";

		$content = file_get_contents($path);

		
		return $content;
	}
}
