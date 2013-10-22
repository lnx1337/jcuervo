<?php

class ComicsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/main';

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
				'actions'=>array('index','hidden',"Special"),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','share','delete'),
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$facebook = new facebook(array(
		   'appId'  => '342733185828640',
		   'secret' => 'f645963f59ed7ee25410567dbfd0b73f',
		 ));

		$user =$facebook->getUser();
		$my_access_token= $facebook->getAccessToken();
		//access token

		$modelRelComics=new UsuariosHasTblComics;
		$model=new Comics;

		if(isset($_POST['img']))
		{
			$model->date=new CDbExpression('NOW()');
            $data=$_POST['img'];
	        $img = str_replace('data:image/png;base64,', '', $data);
	        $img = str_replace(' ', '+', $img);
	        $data = base64_decode($img);
	        $filename=uniqid().'.png';
	        $file =  Yii::app()->basePath.'/../Comics/'.$filename;
	        $success = file_put_contents($file, $data);
	       	$model->imagen=$filename;
	       
			if($model->save()){
                 $modelRelComics->tbl_usuarios_id=Yii::app()->session['usuario_id'];
                 $modelRelComics->tbl_comics_id=$model->id;
                 if($modelRelComics->save()){
                    $this->ShareComic($my_access_token,'https://apps.t2omedia.com.mx/php2/jcuervo/Comics/'.$filename,'¿Qué te parece mi Meme? Lo hice en el Especial Meme Generator:  http://www.facebook.com/JCEspecial/app_342733185828640');
	       	 		$user = Usuarios::model()->findByPk(Yii::app()->session['usuario_id']);
	       	 		echo CController::CreateUrl("App/Profile",array("id"=>$user->id_facebook));
	       	 		Yii::app()->end();
                 }

			}
		}
		$avatar = Avatars::model()->findByPk(Yii::app()->session['usuario_id']);
		$amigos = new Amigos;
		$objetos = CatalogoObjetos::model()->findAll();
		$backgrounds = Backgrounds::model()->findAll();
		//print_r($avatar->avatar_img);
		//print_r($amigos->getAmigosAvatars());
		$this->render('create',array(
			'model'=>$model,
			'avatar'=>$avatar,
			'amigos_avatars'=>$amigos->getAmigosAvatars(),
			'objetos'=>$objetos,
			'fondos'=>$backgrounds,
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

		if(isset($_POST['Comics']))
		{
			$model->attributes=$_POST['Comics'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}


      public function actionShare($id){
        
              $model=Comics::model()->findByPk($id);
              $modelVotosUsuario=UsuariosVotosComics::model()->find(array('condition'=>'id_usuario=:id_usuario and id_comic=:id_comic ','params'=>array(':id_usuario'=>Yii::app()->session['usuario_id'],':id_comic'=>$id)));
              $modelUsuariosComics=UsuariosHasTblComics::model()->find(array('condition'=>'tbl_comics_id=:cid','params'=>array(':cid'=>$id)));
			  $numeroTotal=$modelUsuariosComics->NoCompartido;

              if(count($modelVotosUsuario)==0){
                
                $numeroTotal+=1;
			    $modelUsuariosComics->NoCompartido=$numeroTotal;
			    
			    if($modelUsuariosComics->save(false)){
			      $modelVotosUsuarionew= new UsuariosVotosComics;
			      $modelVotosUsuarionew->id_usuario=Yii::app()->session['usuario_id'];
			      $modelVotosUsuarionew->id_comic=$modelUsuariosComics->tbl_comics_id;
			      
			      if($modelVotosUsuarionew->save(false)){
			          echo $numeroTotal;	
			      }
			     
			    
			    }


			  }else{
                 echo $numeroTotal;
			  }

               

	 }

	  public function ShareComic($my_access_token,$link,$message){
		$graph_url= "https://graph.facebook.com/".Yii::app()->session['id_album']."/photos?"."url=".urlencode($link)."&message=".urlencode($message)."&method=POST"."&access_token=".$my_access_token;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $graph_url);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		$data = curl_exec($ch);
    }

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if($this->loadModel($id)->delete()){

            $response= Usuarios::model()->find(array('condition'=>'id=:uid','params'=>array(':uid'=>Yii::app()->session['usuario_id'])));   
            $json['usuario']=array('nombre'=>$response->nombre,'id_facebook'=>$response->id_facebook,'sexo'=>$response->sexo,'avatar_img'=>$response->Avatar->avatar_img);

             if(count($response)!= 0){
                $comics=UsuariosHasTblComics::getMyComics($response->id);
                $this->renderPartial('//app/_mismemesajax',array('comics'=>$comics,'json'=>$json));
              } 

		}else{
			 echo "No se pudo eliminar";
		}
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		/*
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	     */
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Comics');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionHidden(){
		if(isset(Yii::app()->session['admin_jcuervo']) && Yii::app()->session['admin_jcuervo']==="userlogged"){
			$comic = $this->loadModel($_POST['id_comic']);
			$comic->isHidden = !$comic->isHidden;
			$comic->save(false);
			echo "cambiado";
		}
	}

	public function actionSpecial(){
		if(isset(Yii::app()->session['admin_jcuervo']) && Yii::app()->session['admin_jcuervo']==="userlogged"){
			$comic = $this->loadModel($_POST['id_comic']);
			$comic->isSpecial = !$comic->isSpecial;
			$comic->save(false);
			echo "cambiado";
		}
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Comics('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Comics']))
			$model->attributes=$_GET['Comics'];

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
		$model=Comics::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='comics-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}
