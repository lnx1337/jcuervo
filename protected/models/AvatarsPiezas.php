<?php

/**
 * This is the model class for table "tbl_avatars_piezas".
 *
 * The followings are the available columns in table 'tbl_avatars_piezas':
 * @property integer $avatar_id
 * @property integer $pieza_avatar_id
 * @property integer $tipo_pieza_id
 * @property string $scalex
 * @property string $scaley
 * @property string $posx
 * @property string $posy
 * @property string $zindex
 * @property string $rotation
 *
 * The followings are the available model relations:
 * @property TblAvatars $avatar
 * @property TblCatalogoPiezas $piezaAvatar
 * @property TblCatalogoPiezas $tipoPieza
 */
class AvatarsPiezas extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AvatarsPiezas the static model class
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
		return 'tbl_avatars_piezas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('avatar_id, pieza_avatar_id, tipo_pieza_id, scalex, scaley, posx, posy, zindex, rotation', 'required'),
			array('avatar_id, pieza_avatar_id, tipo_pieza_id', 'numerical', 'integerOnly'=>true),
			array('scalex, scaley, posx, posy, zindex, rotation', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('avatar_id, pieza_avatar_id, tipo_pieza_id, scalex, scaley, posx, posy, zindex, rotation', 'safe', 'on'=>'search'),
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
			'avatar' => array(self::BELONGS_TO, 'TblAvatars', 'avatar_id'),
			'piezaAvatar' => array(self::BELONGS_TO, 'TblCatalogoPiezas', 'pieza_avatar_id'),
			'tipoPieza' => array(self::BELONGS_TO, 'CatalogoPiezas', 'tipo_pieza_id'),
			'AvatarImg' => array(self::BELONGS_TO, 'CatalogoPiezas', 'pieza_avatar_id'),

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'avatar_id' => 'Avatar',
			'pieza_avatar_id' => 'Pieza Avatar',
			'tipo_pieza_id' => 'Tipo Pieza',
			'scalex' => 'Scalex',
			'scaley' => 'Scaley',
			'posx' => 'Posx',
			'posy' => 'Posy',
			'zindex' => 'Zindex',
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
		$criteria->compare('pieza_avatar_id',$this->pieza_avatar_id);
		$criteria->compare('tipo_pieza_id',$this->tipo_pieza_id);
		$criteria->compare('scalex',$this->scalex,true);
		$criteria->compare('scaley',$this->scaley,true);
		$criteria->compare('posx',$this->posx,true);
		$criteria->compare('posy',$this->posy,true);
		$criteria->compare('zindex',$this->zindex,true);
		$criteria->compare('rotation',$this->rotation,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}