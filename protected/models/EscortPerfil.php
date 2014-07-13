<?php

/**
 * This is the model class for table "escort_perfil".
 *
 * The followings are the available columns in table 'escort_perfil':
 * @property integer $idEscort
 * @property string $email
 * @property string $nombre_artistico
 * @property string $fecha_inscrip
 * @property integer $idPromo
 * @property string $fecha_caduc
 * @property string $fecha_nac
 * @property integer $peso
 * @property integer $altura
 * @property string $medidas
 * @property string $detalle_servicios
 * @property string $horario
 * @property string $tel_1
 * @property string $tel_2
 * @property string $valor_normal
 * @property integer $escort_eval_id
 * @property integer $estado
 * @property string $descripc
 * @property string $foto_perfil
 *
 * The followings are the available model relations:
 * @property ClienteFavs[] $clienteFavs
 * @property EscortEtiquetas[] $escortEtiquetases
 * @property EscortEval[] $escortEvals
 * @property EscortImg[] $escortImgs
 * @property Usuario $idEscort0
 * @property EscortPrivilegios[] $escortPrivilegioses
 * @property EscortPromo $escortPromo
 * @property EscortVideos $escortVideos
 * @property VotacionResult[] $votacionResults
 */
class EscortPerfil extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'escort_perfil';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idEscort, email, fecha_inscrip', 'required'),
			array('idEscort, idPromo, peso, altura, escort_eval_id, estado', 'numerical', 'integerOnly'=>true),
			array('email, detalle_servicios, horario', 'length', 'max'=>100),
			array('nombre_artistico', 'length', 'max'=>500),
			array('descripc', 'length', 'max'=>1000),
			array('medidas', 'length', 'max'=>12),
			array('tel_1, tel_2, valor_normal', 'length', 'max'=>20),
			array('foto_perfil', 'length', 'max'=>200),
			array('fecha_caduc, fecha_nac', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idEscort, email, nombre_artistico, fecha_inscrip, idPromo, fecha_caduc, fecha_nac, peso, altura, medidas, detalle_servicios, horario, tel_1, tel_2, valor_normal, escort_eval_id, estado, descripc, foto_perfil', 'safe', 'on'=>'search'),
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
			'clienteFavs' => array(self::HAS_MANY, 'ClienteFavs', 'Escort_perfil_id'),
			'escortEtiquetases' => array(self::HAS_MANY, 'EscortEtiquetas', 'idEscort'),
			'escortEvals' => array(self::HAS_MANY, 'EscortEval', 'idEscort'),
			'escortImgs' => array(self::HAS_MANY, 'EscortImg', 'idEscort'),
			'idEscort0' => array(self::BELONGS_TO, 'Usuario', 'idEscort'),
			'escortPrivilegioses' => array(self::HAS_MANY, 'EscortPrivilegios', 'idEscort'),
			'escortPromo' => array(self::HAS_ONE, 'EscortPromo', 'idEscort_promo'),
			'escortVideos' => array(self::HAS_ONE, 'EscortVideos', 'idEscort_videos'),
			'votacionResults' => array(self::HAS_MANY, 'VotacionResult', 'idEscort'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idEscort' => 'Id Escort',
			'email' => 'Email',
			'nombre_artistico' => 'Nombre Artistico',
			'fecha_inscrip' => utf8_encode('Fecha Inscripción'),
			'idPromo' => utf8_encode('Promoción'),
			'fecha_caduc' => utf8_encode('Caducación Cuenta'),
			'fecha_nac' => 'Fecha Nacimiento',
			'peso' => 'Peso',
			'altura' => 'Altura',
			'medidas' => 'Medidas',
			'detalle_servicios' => 'Detalle de Servicios',
			'horario' => 'Horario',
			'tel_1' => utf8_encode('Teléfono 1'),
			'tel_2' => utf8_encode('Teléfono 2'),
			'valor_normal' => 'Valor',
			'escort_eval_id' => utf8_encode('Evaluación Escort'),
			'estado' => 'Estado',
			'descripc' => utf8_encode('Descripción'),
			'foto_perfil' => 'Foto de Perfil',
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

		$criteria->compare('idEscort',$this->idEscort);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('nombre_artistico',$this->nombre_artistico,true);
		$criteria->compare('fecha_inscrip',$this->fecha_inscrip,true);
		$criteria->compare('idPromo',$this->idPromo);
		$criteria->compare('fecha_caduc',$this->fecha_caduc,true);
		$criteria->compare('fecha_nac',$this->fecha_nac,true);
		$criteria->compare('peso',$this->peso);
		$criteria->compare('altura',$this->altura);
		$criteria->compare('medidas',$this->medidas,true);
		$criteria->compare('detalle_servicios',$this->detalle_servicios,true);
		$criteria->compare('horario',$this->horario,true);
		$criteria->compare('tel_1',$this->tel_1,true);
		$criteria->compare('tel_2',$this->tel_2,true);
		$criteria->compare('valor_normal',$this->valor_normal,true);
		$criteria->compare('escort_eval_id',$this->escort_eval_id);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('descripc',$this->descripc,true);
		$criteria->compare('foto_perfil',$this->foto_perfil,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EscortPerfil the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
