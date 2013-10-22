<?php

/**
 * This is the model class for table "tbl_pieza_avatar".
 *
 * The followings are the available columns in table 'tbl_pieza_avatar':
 * @property integer $id
 * @property integer $tipo_pieza_id
 * @property string $url
 *
 * The followings are the available model relations:
 * @property TblAvatars[] $tblAvatars
 * @property TblTiposPiezasAvatar $tipoPieza
 */
class PiezaAvatar extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PiezaAvatar the static model class
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
		return 'tbl_pieza_avatar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo_pieza_id, url', 'required'),
			array('tipo_pieza_id', 'numerical', 'integerOnly'=>true),
			array('url', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, tipo_pieza_id, url', 'safe', 'on'=>'search'),
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
			'tblAvatars' => array(self::MANY_MANY, 'TblAvatars', 'tbl_avatars_piezas(pieza_id, avatar_id)'),
			'AvatarTipo' => array(self::BELONGS_TO, 'TiposPiezasAvatar', 'tipo_pieza_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'tipo_pieza_id' => 'Tipo Pieza',
			'url' => 'Url',
		);
	}

    public function getCatalogoCaras(){

       $model_caras=PiezaAvatar::model()->with('AvatarTipo')->findAll(array('condition'=>'t.tipo_pieza_id=2'));
       $catalogos_caras_cantidad= count($model_caras);
       $catalogo_caras;

      for($cont=0;$cont<$catalogos_caras_cantidad;$cont++){
        $catalogo_caras[$cont]=array(
           'id'=>$model_caras[$cont]->id,
           'tipo_pieza_id'=>$model_caras[$cont]->tipo_pieza_id,
           'url'=>$model_caras[$cont]->url);
      }
       return $catalogo_caras;
    }


    public function getCatalogoCuerpos(){
     
     $model_cuerpos=PiezaAvatar::model()->with('AvatarTipo')->findAll(array('condition'=>'t.tipo_pieza_id=1'));
     $catalogos_cuerpos_cantidad=count($model_cuerpos);
     $catalogo_cuerpos;

       for($cont=0;$cont<$catalogos_cuerpos_cantidad;$cont++){
                $catalogo_cuerpos[$cont]=array(
             'id'=>$model_cuerpos[$cont]->id,
             'tipo_pieza_id'=>$model_cuerpos[$cont]->tipo_pieza_id,
             'url'=>$model_cuerpos[$cont]->url);
        }

        return $catalogo_cuerpos;

    }


    public function getCatalogoAccesorios(){
    
    $model_accesorios=PiezaAvatar::model()->with('AvatarTipo')->findAll(array('condition'=>'t.tipo_pieza_id=4'));
    $catalogos_accesorios_cantidad= count($model_accesorios);
    $catalogo_accesorios;

       for($cont=0;$cont<$catalogos_accesorios_cantidad;$cont++){
            $catalogo_accesorios[$cont]=array(
                'id'=>$model_accesorios[$cont]->id,
                'tipo_pieza_id'=>$model_accesorios[$cont]->tipo_pieza_id,
                'url'=>$model_accesorios[$cont]->url);
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
		$criteria->compare('tipo_pieza_id',$this->tipo_pieza_id);
		$criteria->compare('url',$this->url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}