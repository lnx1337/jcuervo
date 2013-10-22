<?php

/**
 * This is the model class for table "tbl_actividad".
 *
 * The followings are the available columns in table 'tbl_actividad':
 * @property integer $actividad_id
 * @property string $actividad
 *
 * The followings are the available model relations:
 * @property Usuarios[] $tblUsuarioses
 */
class Actividad extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Actividad the static model class
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
		return 'tbl_actividad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('actividad_id', 'required'),
			array('actividad_id', 'numerical', 'integerOnly'=>true),
			array('actividad', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('actividad_id, actividad', 'safe', 'on'=>'search'),
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
			'tblUsuarioses' => array(self::MANY_MANY, 'Usuarios', 'tbl_actividad_usuario(tbl_actividad_actividad_id, tbl_usuarios_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'actividad_id' => 'Actividad',
			'actividad' => 'Actividad',
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

		$criteria->compare('actividad_id',$this->actividad_id);
		$criteria->compare('actividad',$this->actividad,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}