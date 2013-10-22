<?php

/**
 * This is the model class for table "tbl_accesorios".
 *
 * The followings are the available columns in table 'tbl_accesorios':
 * @property integer $id
 * @property string $url
 *
 * The followings are the available model relations:
 * @property TblAvatars[] $tblAvatars
 */
class Accesorios extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Accesorios the static model class
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
		return 'tbl_accesorios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('url', 'required'),
			array('url', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, url', 'safe', 'on'=>'search'),
			array('url', 'file', 'types'=>'jpg, gif, png')
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
			'tblAvatars' => array(self::MANY_MANY, 'TblAvatars', 'tbl_avatar_has_Accesorios(accesorios_id, avatar_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'url' => 'Url',
		);
	}

	  public function getCatalogoAccesorios(){

       $model_accesorios=Accesorios::model()->findAll();
       $catalogos_accesorios_cantidad= count($model_accesorios);
       $catalogo_accesorios=null;

      for($cont=0;$cont<$catalogos_accesorios_cantidad;$cont++){
        $catalogo_accesorios[$cont]=array(
           'id'=>$model_accesorios[$cont]->id,
           'url'=>$model_accesorios[$cont]->url,
        	'tipo_pieza_id'=>TiposPiezas::ACCESORIO);
      }
       return $catalogo_accesorios;
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
		$criteria->compare('url',$this->url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}