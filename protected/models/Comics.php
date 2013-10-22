<?php

/**
 * This is the model class for table "tbl_comics".
 *
 * The followings are the available columns in table 'tbl_comics':
 * @property integer $id
 * @property string $imagen
 * @property string $date
 *
 * The followings are the available model relations:
 * @property TblUsuariosComicsComentarios[] $tblUsuariosComicsComentarioses
 * @property TblUsuarios[] $tblUsuarioses
 */
class Comics extends CActiveRecord
{
  public $correo;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Comics the static model class
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
		return 'tbl_comics';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('imagen, date', 'required'),
			array('imagen', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, imagen, date', 'safe', 'on'=>'search'),
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
			'Coments' => array(self::HAS_MANY, 'UsuariosComicsComentarios', 'tbl_comics_id'),
			'UsuariosComics' => array(self::MANY_MANY, 'UsuariosHasTblComics', 'tbl_usuarios_has_tbl_comics(tbl_comics_id, tbl_usuarios_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'imagen' => 'Imagen',
			'date' => 'Date',
		);
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

		$criteria->compare('id',$this->id);
		$criteria->compare('imagen',$this->imagen,true);
		$criteria->compare('date',$this->date,true);
		
    if(!empty($this->correo))
    {
      $criteria->with = array('UsuariosComics');
      $criteria->together = true;
      $criteria->condition = "UsuariosComics.correo LIKE '%".$this->correo."%'";
		  //$criteria->compare('correo',$this->UsuariosComics[0]->Usuario->correo);
    }

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function NoCompartidosTotalUsuario($id)
	{
		if(Yii::app()->session['admin_jcuervo']==="userlogged")
		{
			$cmd = Yii::app()->db->createCommand('select sum(NoCompartido) as max from tbl_usuarios_has_tbl_comics where tbl_usuarios_id=:id');
			$cmd->bindValue(":id", $id , PDO::PARAM_STR);
			$row = $cmd->queryAll();
        	$cantidad=$row[0]['max'];
        	if($cantidad>0)
        		echo CHtml::encode($cantidad);
        	else echo "0";
		}
	}

	public static function TotalCompartidos()
	{
		if(Yii::app()->session['admin_jcuervo']==="userlogged")
		{
			$cmd = Yii::app()->db->createCommand('select sum(NoCompartido) as max from tbl_usuarios_has_tbl_comics');
			$row = $cmd->queryAll();
        	$cantidad=$row[0]['max'];
        	if($cantidad>0)
        		return $cantidad;
        	else return "0";
		}
	}

}
