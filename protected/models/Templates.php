<?php

/**
 * This is the model class for table "templates".
 *
 * The followings are the available columns in table 'templates':
 * @property string $id
 * @property string $company_id
 * @property string $used_times
 * @property string $name
 * @property integer $work_statement
 * @property integer $delivery_instructions
 * @property integer $tasks
 * @property integer $risks
 * @property integer $minutes
 * @property integer $progress_report
 * @property integer $corrective_actions
 * @property integer $software_requirements
 * @property integer $user_manual
 * @property integer $software_design
 * @property integer $operation_manual
 * @property integer $maintenance_manual
 * @property integer $software_components
 * @property integer $test_reports
 * @property integer $act_of_acceptance
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
			array('company_id, name', 'required'),
			array('work_statement, delivery_instructions, tasks, risks, minutes, progress_report, corrective_actions, software_requirements, user_manual, software_design, operation_manual, maintenance_manual, software_components, test_reports, act_of_acceptance', 'numerical', 'integerOnly'=>true),
			array('company_id, used_times', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, company_id, used_times, name, work_statement, delivery_instructions, tasks, risks, minutes, progress_report, corrective_actions, software_requirements, user_manual, software_design, operation_manual, maintenance_manual, software_components, test_reports, act_of_acceptance', 'safe', 'on'=>'search'),
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
			'company' => array(self::BELONGS_TO, 'Companies', 'company_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'company_id' => 'Company',
			'used_times' => 'Used Times',
			'name' => 'Name',
			'work_statement' => 'Work Statement',
			'delivery_instructions' => 'Delivery Instructions',
			'tasks' => 'Tasks',
			'risks' => 'Risks',
			'minutes' => 'Minutes',
			'progress_report' => 'Progress Report',
			'corrective_actions' => 'Corrective Actions',
			'software_requirements' => 'Software Requirements',
			'user_manual' => 'User Manual',
			'software_design' => 'Software Design',
			'operation_manual' => 'Operation Manual',
			'maintenance_manual' => 'Maintenance Manual',
			'software_components' => 'Software Components',
			'test_reports' => 'Test Reports',
			'act_of_acceptance' => 'Act Of Acceptance',
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

		$criteria->compare('work_statement',$this->work_statement);

		$criteria->compare('delivery_instructions',$this->delivery_instructions);

		$criteria->compare('tasks',$this->tasks);

		$criteria->compare('risks',$this->risks);

		$criteria->compare('minutes',$this->minutes);

		$criteria->compare('progress_report',$this->progress_report);

		$criteria->compare('corrective_actions',$this->corrective_actions);

		$criteria->compare('software_requirements',$this->software_requirements);

		$criteria->compare('user_manual',$this->user_manual);

		$criteria->compare('software_design',$this->software_design);

		$criteria->compare('operation_manual',$this->operation_manual);

		$criteria->compare('maintenance_manual',$this->maintenance_manual);

		$criteria->compare('software_components',$this->software_components);

		$criteria->compare('test_reports',$this->test_reports);

		$criteria->compare('act_of_acceptance',$this->act_of_acceptance);

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