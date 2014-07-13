<?php

/**
 * This is the model class for table "escort_etiquetas".
 *
 * The followings are the available columns in table 'escort_etiquetas':
 * @property integer $idEscort_etiquetas
 * @property integer $idEtiqueta
 * @property integer $idEscort
 *
 * The followings are the available model relations:
 * @property EscortPerfil $idEscort0
 * @property Etiqueta $idEtiqueta0
 */
class EscortTag extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'escort_etiquetas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idEtiqueta, idEscort', 'required'),
			array('idEtiqueta, idEscort', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idEscort_etiquetas, idEtiqueta, idEscort', 'safe', 'on'=>'search'),
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
			'idEtiqueta0' => array(self::BELONGS_TO, 'Etiqueta', 'idEtiqueta'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idEscort_etiquetas' => 'Id Escort Etiquetas',
			'idEtiqueta' => 'Id Etiqueta',
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

		$criteria->compare('idEscort_etiquetas',$this->idEscort_etiquetas);
		$criteria->compare('idEtiqueta',$this->idEtiqueta);
		$criteria->compare('idEscort',$this->idEscort);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EscortTag the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
