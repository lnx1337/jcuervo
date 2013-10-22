<?php

/**
 * This is the model class for table "tbl_usuarios".
 *
 * The followings are the available columns in table 'tbl_usuarios':
 * @property integer $id
 * @property string $correo
 * @property string $nombre
 * @property string $id_facebook
 * @property string $id_album
 * @property string $sexo
 *
 * The followings are the available model relations:
 * @property TblAmigos[] $tblAmigoses
 * @property TblAmigos[] $tblAmigoses1
 * @property TblAvatars[] $tblAvatars
 * @property TblComics[] $tblComics
 */
class Usuarios extends CActiveRecord
{
	const ADMIN_USER = "jc_admin";
	const ADMIN_PASSWORD = "MemeEspecial2013!";
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Usuarios the static model class
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
		return 'tbl_usuarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('correo, nombre, id_facebook, sexo', 'required'),
			array('correo, id_facebook, id_album', 'length', 'max'=>100),
			array('nombre', 'length', 'max'=>60),
			array('sexo', 'length', 'max'=>6),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, correo, nombre, id_facebook, id_album, sexo', 'safe', 'on'=>'search'),
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
			'Amigos' => array(self::HAS_MANY, 'Amigos', 'usuarios_id'),
			//'tblAmigoses1' => array(self::HAS_MANY, 'TblAmigos', 'amigo_id'),
			'Avatar' => array(self::HAS_ONE, 'Avatars', 'usuario_id'),
			'Comics' => array(self::MANY_MANY, 'UsuariosHasTblComics', 'tbl_usuarios_has_tbl_comics(tbl_usuarios_id, tbl_comics_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'correo' => 'Correo',
			'nombre' => 'Nombre',
			'id_facebook' => 'Id Facebook',
			'id_album' => 'Id Album',
			'sexo' => 'Sexo',
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
		$criteria->compare('correo',$this->correo,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('id_facebook',$this->id_facebook,true);
		$criteria->compare('id_album',$this->id_album,true);
		$criteria->compare('sexo',$this->sexo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array('pageSize' => 9),
		));
	}

	public static function isFan($id,$isfan){
		$u = ActividadUsuario::model()->find('tbl_usuarios_id=:id',array(":id"=>$id));
		if(count($u)==0){
			echo CHtml::encode(($isfan == 0) ? "No" : "Si");
		} else{
			echo CHtml::encode("Nuevo");
		}
		
	}
}