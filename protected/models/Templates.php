<?php

/**
 * This is the model class for table "templates".
 *
 * The followings are the available columns in table 'templates':
 * @property string $id
 * @property string $company_id
 * @property string $used_times
 * @property string $name
 * @property integer $scope
 * @property integer $communication_plan
 * @property integer $general_purpose
 * @property integer $specific_objectives
 * @property integer $justification
 * @property integer $tool
 * @property integer $communication_type
 * @property integer $roles
 * @property integer $risk
 * @property integer $impact
 * @property integer $answer
 * @property integer $testing
 * @property integer $people
 * @property integer $timetable
 */
class templates extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'templates';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('company_id, name', 'required', 'message' => Language::$emptyValue),
			array('scope, communication_plan, general_purpose, specific_objectives, justification, tool, communication_type, roles, risk, impact, answer, testing, people, timetable', 'numerical', 'integerOnly'=>true),
			array('company_id, used_times', 'length', 'max'=>10),
			array('name', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, company_id, used_times, name, scope, communication_plan, general_purpose, specific_objectives, justification, tool, communication_type, roles, risk, impact, answer, testing, people, timetable', 'safe', 'on'=>'search'),
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
			'company' => array(self::BELONGS_TO, 'companies', 'company_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'company_id'          => Language::$company,
			'used_times'          => Language::$usedTimes,
			'name'               => Language::$name,
			'scope'               => Language::$scope,
			'communication_plan'  => Language::$communicationPlan ,
			'general_purpose'     => Language::$generalPurpose,
			'specific_objectives' => Language::$specificObjectives,
			'justification'       => Language::$justification,
			'tool'                => Language::$tools,
			'communication_type'  => Language::$communicationType,
			'roles'               => Language::$roles,
			'risk'                => Language::$risk,
			'impact'              => Language::$impact,
			'answer'              => Language::$answer,
			'testing'             => Language::$testing,
			'people'              => Language::$people,
			'timetable'           => Language::$timetable,
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

		$criteria->compare('company_id',$this->company_id,true);

		$criteria->compare('used_times',$this->used_times,true);

		$criteria->compare('name',$this->name,true);

		$criteria->compare('scope',$this->scope);

		$criteria->compare('communication_plan',$this->communication_plan);

		$criteria->compare('general_purpose',$this->general_purpose);

		$criteria->compare('specific_objectives',$this->specific_objectives);

		$criteria->compare('justification',$this->justification);

		$criteria->compare('tool',$this->tool);

		$criteria->compare('communication_type',$this->communication_type);

		$criteria->compare('roles',$this->roles);

		$criteria->compare('risk',$this->risk);

		$criteria->compare('impact',$this->impact);

		$criteria->compare('answer',$this->answer);

		$criteria->compare('testing',$this->testing);

		$criteria->compare('people',$this->people);

		$criteria->compare('timetable',$this->timetable);

		return new CActiveDataProvider('templates', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return templates the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}