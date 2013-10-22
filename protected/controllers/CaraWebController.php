<?php

class CaraWebController extends Controller
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
				'actions'=>array('index','view','SaveFoto'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','SaveFoto','Edit','delete'),
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

	//Checar PATH y permisos 777, y algoritmo de nombre o url a donde se envian y cuidado con la funcion date()
	public function actionSaveFoto(){
        if(isset($_GET['NoExpediente'])){
        		
    		 $filename =Yii::app()->session['usuario_id'].'1337.jpg';
             $filepath= Yii::app()->basePath.'/../AvatarCaras/tmp/';
			 $filepathname =  $filepath.$filename;
			
    		if($filepath == null)
                   throw new Exception ("Null filepath!");

    	   
    	    $contents = file_get_contents('php://input');
    		$result = file_put_contents( $filepathname, $contents);

            /*if($result){
    		    
    		     $model=new CaraWeb;
                 $Existe_foto=$model->findByPk(Yii::app()->session['usuario_id']);

                 if(count($Existe_foto)>0){
                 	if(file_exists($filepath.$Existe_foto->url)){
                        unlink($filepath.$Existe_foto->url);
                    }
                    $model=$this->loadModel(Yii::app()->session['usuario_id']);
                    $model->url=$filename;
                    $model->save();


                 }else if($Existe_foto==0){
                    $model->avatar_id=Yii::app()->session['usuario_id'];
    		        $model->url=$filename;
    		        $model->save();

                 }
    		      
    		     echo 'http://apps.t2omedia.com.mx/php2/jcuervo/AvatarCaras/tmp/'.$filename;

            } */
    		
    		echo 'http://apps.t2omedia.com.mx/php2/jcuervo/AvatarCaras/tmp/'.$filename;

    		if (!$result) {
                 print "ERROR: Failed to write data to $filename, check permissions\n";
                 exit();
            } 
       
        }else{
       	    throw new CHttpException(404,'The specified post cannot be found.');
       }
        
   }


    public function actionEdit(){

   	  	if(isset($_POST)){

	        $filepath= Yii::app()->basePath.'/../AvatarCaras/tmp/';

	     	if(file_exists($filepath.Yii::app()->session['usuario_id']."1337.jpg")){

	            $targ_w = $targ_h = 150;
	            $jpeg_quality = 100;
	            $src = $filepath.Yii::app()->session['usuario_id']."1337.jpg";
	            $img_r = imagecreatefromjpeg($src);
	            $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

	            imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],$targ_w,$targ_h,$_POST['w'],$_POST['h']);
	            if(imagejpeg($dst_r,$src,$jpeg_quality)){
	              
	               echo 'https://apps.t2omedia.com.mx/php2/jcuervo/AvatarCaras/tmp/'.Yii::app()->session['usuario_id']."1337.jpg";
	            }
	        }        		    
	        else {
	            echo "no existe pic";
	        }
	  	}
    }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new CaraWeb;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CaraWeb']))
		{
			$model->attributes=$_POST['CaraWeb'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->avatar_id));
		}
	
	    $this->renderPartial('//caraWeb/create',array('model'=>$model));

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

		if(isset($_POST['CaraWeb']))
		{
			$model->attributes=$_POST['CaraWeb'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->avatar_id));
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
	public function actionDelete()
	{
		if(Yii::app()->session['usuario_id']){
			$this->loadModel(Yii::app()->session['usuario_id'])->delete();
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		
      $this->renderPartial('index', array('url'=>'http://apps.t2omedia.com.mx/php2/jcuervo/AvatarCaras/5165ddf9a459d.jpg'));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new CaraWeb('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CaraWeb']))
			$model->attributes=$_GET['CaraWeb'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=CaraWeb::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='cara-web-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
