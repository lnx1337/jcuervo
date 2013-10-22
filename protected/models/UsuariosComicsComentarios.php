<?php

/**
 * This is the model class for table "tbl_usuarios_comics_comentarios".
 *
 * The followings are the available columns in table 'tbl_usuarios_comics_comentarios':
 * @property integer $id
 * @property integer $tbl_usuarios_id
 * @property integer $tbl_comics_id
 * @property string $comment
 * @property string $date
 *
 * The followings are the available model relations:
 * @property TblUsuarios $tblUsuarios
 * @property TblComics $tblComics
 */
class UsuariosComicsComentarios extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UsuariosComicsComentarios the static model class
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
		return 'tbl_usuarios_comics_comentarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tbl_usuarios_id, tbl_comics_id, comment, date', 'required'),
			array('tbl_usuarios_id, tbl_comics_id', 'numerical', 'integerOnly'=>true),
			array('comment', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, tbl_usuarios_id, tbl_comics_id, comment, date', 'safe', 'on'=>'search'),
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
              'Usuarios' => array(self::BELONGS_TO, 'Usuarios', 'tbl_usuarios_id'),
			  'Comics' => array(self::BELONGS_TO, 'TblComics', 'tbl_comics_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'tbl_usuarios_id' => 'Tbl Usuarios',
			'tbl_comics_id' => 'Tbl Comics',
			'comment' => 'Comment',
			'date' => 'Date',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */


    public function getComentarios($id){    

    $model_comic= new Comics;
    $comic=$model_comic->find(array('condition'=>'id=:id','params'=>array(':id'=>$id)));
    $cantidad_comentarios=count($comic->Coments);
    $comentarios=null;
    $delete=false;
    $deletec=false;


    $model_comic_detalle=new UsuariosHasTblComics;
    $comic_det=$model_comic_detalle->find(array('condition'=>'tbl_comics_id=:id','params'=>array(':id'=>$comic->id)));

    

    for($i=0;$i<$cantidad_comentarios;$i++){

      if(((int)$comic->Coments[$i]->tbl_usuarios_id) == ((int)Yii::app()->session['usuario_id'])){
         $deletec=true;
      }else{
      	 $deletec=false;
      }

      $comentarios[$i]=array('id'=>$comic->Coments[$i]->id,
                             'comment'=>$comic->Coments[$i]->comment,
                             'date'=>$comic->Coments[$i]->date,
                             'idFb'=>$comic->Coments[$i]->Usuarios->id_facebook,
                             'nombre'=>$comic->Coments[$i]->Usuarios->nombre,
                             'delete'=>$deletec);

       }



    if($comic->UsuariosComics[0]->Usuario->id==Yii::app()->session['usuario_id']){
       $delete=true;
    }   


    $json['comic']=array('usuario' =>array('nombre'=>$comic->UsuariosComics[0]->Usuario->nombre,'idFb'=>$comic->UsuariosComics[0]->Usuario->id_facebook),
                          'comic'=>array('id'=>$comic->id,
                                         'imagen'=>$comic->imagen,
                                         'date'=>$comic->date,
                                         'NoComentarios'=>$comic_det->NoComentarios,
                                         'NoVisto'=>$comic_det->NoVisto,
                                         'NoCompartido'=>$comic_det->NoCompartido,
                                         'destacado'=>$comic_det->destacado,
                                         'comments'=>$comentarios,
                                         'eliminar'=>$delete
                                         ));                


        return $json;
    }

	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('tbl_usuarios_id',$this->tbl_usuarios_id);
		$criteria->compare('tbl_comics_id',$this->tbl_comics_id);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('date',$this->date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}