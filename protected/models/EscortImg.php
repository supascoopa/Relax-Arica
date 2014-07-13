<?php

/**
 * This is the model class for table "escort_img".
 *
 * The followings are the available columns in table 'escort_img':
 * @property integer $idEscort_IMG
 * @property string $URL
 * @property string $titulo
 * @property string $fecha_subida
 * @property integer $estado
 * @property integer $idEscort
 *
 * The followings are the available model relations:
 * @property EscortPerfil $idEscort0
 */
class EscortImg extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'escort_img';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('URL, idEscort', 'required'),
			array('estado, idEscort', 'numerical', 'integerOnly'=>true),
			array('URL, titulo', 'length', 'max'=>100),
			array('fecha_subida', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idEscort_IMG, URL, titulo, fecha_subida, estado, idEscort', 'safe', 'on'=>'search'),
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
			'idEscort0' => array(self::BELONGS_TO, 'EscortPerfil', 'idEscort'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idEscort_IMG' => 'Id Escort Img',
			'URL' => 'Url',
			'titulo' => 'Titulo',
			'fecha_subida' => 'Fecha Subida',
			'estado' => 'Estado',
			'idEscort' => 'Id Escort',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idEscort_IMG',$this->idEscort_IMG);
		$criteria->compare('URL',$this->URL,true);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('fecha_subida',$this->fecha_subida,true);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('idEscort',$this->idEscort);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EscortImg the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
