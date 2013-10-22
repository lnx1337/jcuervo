<?php

/**
 * This is the model class for table "tbl_avatars".
 *
 * The followings are the available columns in table 'tbl_avatars':
 * @property integer $id
 * @property integer $usuario_id
 * @property string $avatar_img
 * @property string $date_created
 *
 * The followings are the available model relations:
 * @property TblUsuarios $usuario
 * @property TblElementosAvatar[] $tblElementosAvatars
 */
class Avatars extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Avatars the static model class
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
		return 'tbl_avatars';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, usuario_id', 'required'),
			array('id, usuario_id', 'numerical', 'integerOnly'=>true),
			array('avatar_img', 'length', 'max'=>100),
			array('date_created', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, usuario_id, avatar_img, date_created', 'safe', 'on'=>'search'),
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
			'Usuario' => array(self::BELONGS_TO, 'Usuarios', 'usuario_id'),
			//'AvatarP' => array(self::MANY_MANY, 'AvatarsPiezas', 'tbl_avatars_piezas(avatar_id, pieza_id)'),
           'AvatarP' => array(self::HAS_MANY, 'AvatarsPiezas', 'avatar_id'),
           'AvatarA' => array(self::HAS_MANY, 'AvatarHasAccesorios', 'avatar_id'),
           'CaraWeb' => array(self::HAS_ONE, 'CaraWeb', 'avatar_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'usuario_id' => 'Usuario',
			'avatar_img' => 'Avatar Img',
			'date_created' => 'Date Created',
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
		$criteria->compare('usuario_id',$this->usuario_id);
		$criteria->compare('avatar_img',$this->avatar_img,true);
		$criteria->compare('date_created',$this->date_created,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}