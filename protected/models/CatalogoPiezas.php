<?php

/**
 * This is the model class for table "tbl_catalogo_piezas".
 *
 * The followings are the available columns in table 'tbl_catalogo_piezas':
 * @property integer $id
 * @property integer $tipo_pieza_id
 * @property string $url
 *
 * The followings are the available model relations:
 * @property TblAvatarsPiezas[] $tblAvatarsPiezases
 * @property TblAvatarsPiezas[] $tblAvatarsPiezases1
 * @property TblTiposPiezas $tipoPieza
 */
class CatalogoPiezas extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CatalogoPiezas the static model class
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
		return 'tbl_catalogo_piezas';
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
			'tblAvatarsPiezases' => array(self::HAS_MANY, 'TblAvatarsPiezas', 'pieza_avatar_id'),
			'tipoPieza' => array(self::HAS_MANY, 'AvatarsPiezas', 'tipo_pieza_id'),
		    'AvatarTipo' => array(self::BELONGS_TO, 'TiposPiezas', 'tipo_pieza_id'),

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

	public static function getCatalogoByTipo($tipo){
       $model=CatalogoPiezas::model()->with('AvatarTipo')->findAll(array('condition'=>'t.tipo_pieza_id=:id ','params'=>array(':id'=>$tipo)));
       $count= count($model);
       $catalogo=null;
       

      for($cont=0;$cont<$count;$cont++){
        $catalogo[$cont]=array(
           'id'=>$model[$cont]->id,
           'tipo_pieza_id'=>$model[$cont]->tipo_pieza_id,
           'url'=>$model[$cont]->url);
      }
     
      return $catalogo;
     
    }

	public function getCatalogoCaras(){

       $model_caras=CatalogoPiezas::model()->with('AvatarTipo')->findAll(array('condition'=>'t.tipo_pieza_id='.TiposPiezas::CARA));
       $catalogos_caras_cantidad= count($model_caras);
       $catalogo_caras=null;

      for($cont=0;$cont<$catalogos_caras_cantidad;$cont++){
        $catalogo_caras[$cont]=array(
           'id'=>$model_caras[$cont]->id,
           'tipo_pieza_id'=>$model_caras[$cont]->tipo_pieza_id,
           'url'=>$model_caras[$cont]->url);
      }
       return $catalogo_caras;
    }


    public function getCatalogoCuerpos(){
     
     $model_cuerpos=CatalogoPiezas::model()->with('AvatarTipo')->findAll(array('condition'=>'t.tipo_pieza_id='.TiposPiezas::CUERPO));
     $catalogos_cuerpos_cantidad=count($model_cuerpos);
     $catalogo_cuerpos=null;

       for($cont=0;$cont<$catalogos_cuerpos_cantidad;$cont++){
                $catalogo_cuerpos[$cont]=array(
             'id'=>$model_cuerpos[$cont]->id,
             'tipo_pieza_id'=>$model_cuerpos[$cont]->tipo_pieza_id,
             'url'=>$model_cuerpos[$cont]->url);
        }

        return $catalogo_cuerpos;

    }


    /*public function getCatalogoAccesorios(){
    
    $model_accesorios=CatalogoPiezas::model()->with('AvatarTipo')->findAll(array('condition'=>'t.tipo_pieza_id=1'));
    $catalogos_accesorios_cantidad= count($model_accesorios);
    $catalogo_accesorios;

       for($cont=0;$cont<$catalogos_accesorios_cantidad;$cont++){
            $catalogo_accesorios[$cont]=array(
                'id'=>$model_accesorios[$cont]->id,
                'tipo_pieza_id'=>$model_accesorios[$cont]->tipo_pieza_id,
                'url'=>$model_accesorios[$cont]->url);
        }
        return $catalogo_accesorios;
    }*/


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
    $criteria->order = 'AvatarTipo.descripcion, t.id';
    $criteria->with = 'AvatarTipo';
    $criteria->together = true;

		return new CActiveDataProvider($this, array(
      'criteria'=>$criteria,
      'pagination' => array('pageSize' => 20),
    ));
	}
}