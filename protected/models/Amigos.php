<?php

/**
 * This is the model class for table "tbl_amigos".
 *
 * The followings are the available columns in table 'tbl_amigos':
 * @property integer $usuarios_id
 * @property integer $amigo_id
 *
 * The followings are the available model relations:
 * @property TblUsuarios $usuarios
 * @property TblUsuarios $amigo
 */
class Amigos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Amigos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_amigos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usuarios_id, amigo_id', 'required'),
			array('usuarios_id, amigo_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('usuarios_id, amigo_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'Usuarios' => array(self::BELONGS_TO, 'Usuarios', 'usuarios_id'),
			'amigo' => array(self::BELONGS_TO, 'Usuarios', 'amigo_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'usuarios_id' => 'Usuarios',
			'amigo_id' => 'Amigo',
		);
	}


	 public function insertAmigosApp($array){
      
      $model_usuarios=new Usuarios;
      $model_amigos=new Amigos;
      $numero_amigos_app=count($array);
       
      for($count=0;$count<$numero_amigos_app;$count++){       
         $existeApp=$model_usuarios->find(
                 array('condition'=>'id_facebook=:fid ','params'=>array(':fid'=>$array[$count])));
         $existe=count($existeApp);
        
        if($existe==1){
          $response=$model_amigos->find(
             array('condition'=>'usuarios_id=:uid and amigo_id=:aid ',
                   'params'=>array(':uid'=>Yii::app()->session['usuario_id'],':aid'=>$existeApp->id)));
        
          $existeAmigo=count($response);
          if($existeAmigo==0){
                $model_amigos_nuevo = new Amigos;
                $model_amigos_nuevo->usuarios_id=Yii::app()->session['usuario_id'];
                $model_amigos_nuevo->amigo_id=$existeApp->id;
                  if($model_amigos_nuevo->save(false)){
                  }
          }else{
               //echo "Ya existe el amigo";
          }
      }
    }

 }
public function getAmigosComics($id){
  
   $json= Yii::app()->db->createCommand('select u.id_facebook, u.nombre, uc.tbl_usuarios_id, uc.tbl_comics_id , c.imagen ,c.id from  tbl_usuarios_has_tbl_comics uc, tbl_comics c, tbl_usuarios u   where c.isHidden=0 AND uc.tbl_usuarios_id in (select amigo.amigo_id from tbl_amigos amigo where amigo.usuarios_id='.$id.') and c.id=uc.tbl_comics_id and u.id=uc.tbl_usuarios_id;')->queryAll();
   return $json;
}

 public function getAmigosAvatars(){
    $response= Amigos::model()->findAll(array('condition'=>'usuarios_id=:uid','params'=>array(':uid'=> Yii::app()->session['usuario_id'])));   
    $amigos_cantidad=count($response);
    $array=null;
    for($var=0;$var<$amigos_cantidad;$var++){
      
         $array[$var]= array('usuario_id'=> $response[$var]->amigo->Avatar->usuario_id,
                    'avatar_img'=>$response[$var]->amigo->Avatar->avatar_img,
                    'idFb'=>$response[$var]->amigo->id_facebook,
                    'nombre'=>$response[$var]->amigo->nombre
                    );
    }
      return $array;  
  }

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('usuarios_id',$this->usuarios_id);
		$criteria->compare('amigo_id',$this->amigo_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}