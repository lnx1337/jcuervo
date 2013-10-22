<?php

class UsuariosHasTblComicsController extends Controller
{

    public $layout='//layouts/main';
 
	

	 public function filters()
  {
    return array(
      'accessControl', // perform access control for CRUD operations
      'postOnly + delete', // we only allow deletion via POST request s
    );
  }

    public function accessRules()
  {
    return array(
      array('allow',  // allow all users to perform 'index' and 'view' actions
        'actions'=>array('index'),
        'users'=>array('*'),
      ),
      array('allow', // allow authenticated user to perform 'create' and 'update' actions
        'actions'=>array('UpdateViews'),
        'users'=>array('@'),
      ),
      array('allow', // allow admin user to perform 'admin' and 'delete' actions
        'actions'=>array('index'),
        'users'=>array('admin'),
      ),
      array('deny',  // deny all users
        'users'=>array('*'),
      ),
    );
  }

    public function  actionIndex(){
    
    }

	public function actionUpdateViews(){


     
      if(isset($_POST['UsuariosHasTblComics'])){
         $id=$_POST['UsuariosHasTblComics']['tbl_comics_id'];
         $modelUsuariosComics=UsuariosHasTblComics::model()->find(array('condition'=>'tbl_comics_id=:cid','params'=>array(':cid'=>$id)));
			   $numeroTotal=$modelUsuariosComics->NoVisto;
               $numeroTotal+=1;
			   $modelUsuariosComics->NoVisto=$numeroTotal;			
			        if($modelUsuariosComics->save(false)){

			        }  
         }

         
	}
}