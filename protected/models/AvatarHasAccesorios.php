<?php

/**
 * This is the model class for table "tbl_avatar_has_Accesorios".
 *
 * The followings are the available columns in table 'tbl_avatar_has_Accesorios':
 * @property integer $avatar_id
 * @property integer $accesorios_id
 * @property string $scalex
 * @property string $scaley
 * @property string $posy
 * @property string $posx
 * @property string $rotation
 */
class AvatarHasAccesorios extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AvatarHasAccesorios the static model class
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
		return 'tbl_avatar_has_Accesorios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('avatar_id, accesorios_id, scalex, scaley, posy, posx, rotation', 'required'),
			array('avatar_id, accesorios_id', 'numerical', 'integerOnly'=>true),
			array('scalex, scaley, posy, posx, rotation', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('avatar_id, accesorios_id, scalex, scaley, posy, posx, rotation', 'safe', 'on'=>'search'),
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
			'Accesorios' => array(self::BELONGS_TO, 'Accesorios', 'accesorios_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'avatar_id' => 'Avatar',
			'accesorios_id' => 'Accesorios',
			'scalex' => 'Scalex',
			'scaley' => 'Scaley',
			'posy' => 'Posy',
			'posx' => 'Posx',
			'rotation' => 'Rotation',
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

		$criteria->compare('avatar_id',$this->avatar_id);
		$criteria->compare('accesorios_id',$this->accesorios_id);
		$criteria->compare('scalex',$this->scalex,true);
		$criteria->compare('scaley',$this->scaley,true);
		$criteria->compare('posy',$this->posy,true);
		$criteria->compare('posx',$this->posx,true);
		$criteria->compare('rotation',$this->rotation,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}