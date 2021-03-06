<?php

/**
 * This is the model class for table "software_requirements".
 *
 * The followings are the available columns in table 'software_requirements':
 * @property string $id
 * @property string $process_id
 * @property string $introduction
 * @property string $functionality
 * @property string $functionality_file
 * @property string $user_interface
 * @property string $user_interface_file
 * @property string $external_interfaces
 * @property string $external_interfaces_file
 * @property string $reliability
 * @property string $reliability_file
 * @property string $efficiency
 * @property string $efficiency_file
 * @property string $maintenance
 * @property string $maintenance_file
 * @property string $portability
 * @property string $portability_file
 * @property string $limitations
 * @property string $limitations_file
 * @property string $interoperability
 * @property string $interoperability_file
 * @property string $reuse
 * @property string $reuse_file
 * @property string $legal
 * @property string $legal_file
 * @property integer $sent
 * @property integer $project_manager_validated
 * @property integer $technical_leader_validated
 * @property integer $change_request
 * @property string $change_request_details
 */
class software_requirements extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'software_requirements';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('process_id', 'required'),
			array('sent, project_manager_validated, technical_leader_validated, change_request', 'numerical', 'integerOnly'=>true),
			array('process_id', 'length', 'max'=>10),
			array('introduction, functionality, user_interface, external_interfaces, reliability, efficiency, maintenance, portability, limitations, interoperability, reuse, legal, change_request_details', 'safe'),
			array('functionality_file, user_interface_file, external_interfaces_file, reliability_file, efficiency_file, maintenance_file, portability_file, limitations_file, interoperability_file, reuse_file, legal_file', 'file', /*'types'=>'jpg, gif, png, txt',*/ 'safe' => false, 'allowEmpty'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, process_id, introduction, user_interface, external_interfaces, reliability, efficiency, maintenance, portability, interoperability, reuse, legal, sent, project_manager_validated, technical_leader_validated, change_request, change_request_details', 'safe', 'on'=>'search'),
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
			'design_restrictions' => array(self::HAS_MANY, 'DesignRestrictions', 'software_requirements_id'),
			'functionalities' => array(self::HAS_MANY, 'Functionality', 'software_requirements_id'),
			'process' => array(self::BELONGS_TO, 'Processes', 'process_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'process_id' => 'Process',
			'introduction' => Language::$introduction,
			'functionality' => 'Funcionalidad',
			'user_interface' => Language::$userInterface,
			'external_interfaces' => Language::$externalInterfaces,
			'reliability' => Language::$reliability,
			'efficiency' => Language::$efficiency,
			'maintenance' => Language::$maintenance,
			'portability' => Language::$portability,
			'limitations' => 'Limitaciones/restricciones del diseño y construcción',
			'interoperability' => Language::$interoperability,
			'reuse' => Language::$reuse,
			'legal' => Language::$legal,
			'sent' => Language::$send,
			'project_manager_validated' => Language::$validate,
			'technical_leader_validated' => Language::$validate,
			'change_request' => Language::$changeRequest,
			'change_request_details' => Language::$changeRequestDetails,
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
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);

		$criteria->compare('process_id',$this->process_id,true);

		$criteria->compare('introduction',$this->introduction,true);

		$criteria->compare('functionality',$this->functionality,true);

		$criteria->compare('user_interface',$this->user_interface,true);

		$criteria->compare('external_interfaces',$this->external_interfaces,true);

		$criteria->compare('reliability',$this->reliability,true);

		$criteria->compare('efficiency',$this->efficiency,true);

		$criteria->compare('maintenance',$this->maintenance,true);

		$criteria->compare('portability',$this->portability,true);

		$criteria->compare('limitations',$this->limitations,true);

		$criteria->compare('interoperability',$this->interoperability,true);

		$criteria->compare('reuse',$this->reuse,true);

		$criteria->compare('legal',$this->legal,true);

		$criteria->compare('sent',$this->sent);

		$criteria->compare('project_manager_validated',$this->project_manager_validated);

		$criteria->compare('technical_leader_validated',$this->technical_leader_validated);

		$criteria->compare('change_request',$this->change_request);

		$criteria->compare('change_request_details',$this->change_request_details,true);

		return new CActiveDataProvider('software_requirements', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return software_requirements the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}