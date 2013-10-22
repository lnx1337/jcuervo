<?php

/**
 * This is the model class for table "tbl_actividad_usuario".
 *
 * The followings are the available columns in table 'tbl_actividad_usuario':
 * @property integer $tbl_actividad_actividad_id
 * @property integer $tbl_usuarios_id
 */
class ActividadUsuario extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ActividadUsuario the static model class
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
		return 'tbl_actividad_usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tbl_actividad_actividad_id, tbl_usuarios_id', 'required'),
			array('tbl_actividad_actividad_id, tbl_usuarios_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('tbl_actividad_actividad_id, tbl_usuarios_id', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'tbl_actividad_actividad_id' => 'Tbl Actividad Actividad',
			'tbl_usuarios_id' => 'Tbl Usuarios',
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

		$criteria->compare('tbl_actividad_actividad_id',$this->tbl_actividad_actividad_id);
		$criteria->compare('tbl_usuarios_id',$this->tbl_usuarios_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}