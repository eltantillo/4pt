<?php

/**
 * This is the model class for table "user_manual".
 *
 * The followings are the available columns in table 'user_manual':
 * @property string $id
 * @property string $process_id
 * @property string $user_procedure
 * @property string $installation_procedure
 * @property string $product_description
 * @property string $provided_resources
 * @property string $required_enviroment
 * @property string $problems_report
 * @property string $enter_procedure
 * @property string $messages
 * @property integer $sent
 * @property integer $project_manager_validated
 * @property integer $technical_leader_validated
 * @property integer $change_request
 * @property string $change_request_details
 */
class user_manual extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_manual';
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
			array('user_procedure, installation_procedure, product_description, provided_resources, required_enviroment, problems_report, enter_procedure, messages, change_request_details', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, process_id, user_procedure, installation_procedure, product_description, provided_resources, required_enviroment, problems_report, enter_procedure, messages, sent, project_manager_validated, technical_leader_validated, change_request, change_request_details', 'safe', 'on'=>'search'),
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
			'user_procedure' => Language::$userProcedure,
			'installation_procedure' => Language::$installationProcedure,
			'product_description' => Language::$productDescription,
			'provided_resources' => Language::$providedResources,
			'required_enviroment' => Language::$requiredEnviroment,
			'problems_report' => Language::$problemsReport,
			'enter_procedure' => Language::$enterProcedure,
			'messages' => Language::$messages,
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

		$criteria->compare('user_procedure',$this->user_procedure,true);

		$criteria->compare('installation_procedure',$this->installation_procedure,true);

		$criteria->compare('product_description',$this->product_description,true);

		$criteria->compare('provided_resources',$this->provided_resources,true);

		$criteria->compare('required_enviroment',$this->required_enviroment,true);

		$criteria->compare('problems_report',$this->problems_report,true);

		$criteria->compare('enter_procedure',$this->enter_procedure,true);

		$criteria->compare('messages',$this->messages,true);

		$criteria->compare('sent',$this->sent);

		$criteria->compare('project_manager_validated',$this->project_manager_validated);

		$criteria->compare('technical_leader_validated',$this->technical_leader_validated);

		$criteria->compare('change_request',$this->change_request);

		$criteria->compare('change_request_details',$this->change_request_details,true);

		return new CActiveDataProvider('user_manual', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return user_manual the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}