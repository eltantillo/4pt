<?php

/**
 * This is the model class for table "operation_manual".
 *
 * The followings are the available columns in table 'operation_manual':
 * @property string $id
 * @property string $process_id
 * @property string $operation_criteria
 * @property string $operative_enviroment
 * @property string $security_alerts
 * @property string $deployment_sequence
 * @property string $faq
 * @property string $aditional_sources
 * @property string $aditional_sources_file
 * @property string $security_certification
 * @property string $guaranty
 * @property integer $sent
 * @property integer $project_manager_validated
 * @property integer $technical_leader_validated
 * @property integer $change_request
 * @property string $change_request_details
 */
class operation_manual extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'operation_manual';
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
			array('operation_criteria, operative_enviroment, security_alerts, deployment_sequence, faq, aditional_sources, security_certification, guaranty, change_request_details', 'safe'),
			array('aditional_sources_file', 'file', 'safe' => false, 'allowEmpty'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, process_id, operation_criteria, operative_enviroment, security_alerts, deployment_sequence, faq, aditional_sources, security_certification, guaranty, sent, project_manager_validated, technical_leader_validated, change_request, change_request_details', 'safe', 'on'=>'search'),
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
			'operation_criteria' => Language::$operationCriteria,
			'operative_enviroment' => Language::$operativeEnviroment,
			'security_alerts' => Language::$securityAlerts,
			'deployment_sequence' => Language::$deploymentSequence,
			'faq' => Language::$faq,
			'aditional_sources' => Language::$aditionalSources,
			'security_certification' => Language::$securityCertification,
			'guaranty' => Language::$guaranty,
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

		$criteria->compare('operation_criteria',$this->operation_criteria,true);

		$criteria->compare('operative_enviroment',$this->operative_enviroment,true);

		$criteria->compare('security_alerts',$this->security_alerts,true);

		$criteria->compare('deployment_sequence',$this->deployment_sequence,true);

		$criteria->compare('faq',$this->faq,true);

		$criteria->compare('aditional_sources',$this->aditional_sources,true);

		$criteria->compare('security_certification',$this->security_certification,true);

		$criteria->compare('guaranty',$this->guaranty,true);

		$criteria->compare('sent',$this->sent);

		$criteria->compare('project_manager_validated',$this->project_manager_validated);

		$criteria->compare('technical_leader_validated',$this->technical_leader_validated);

		$criteria->compare('change_request',$this->change_request);

		$criteria->compare('change_request_details',$this->change_request_details,true);

		return new CActiveDataProvider('operation_manual', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return operation_manual the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}