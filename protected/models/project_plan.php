<?php

/**
 * This is the model class for table "project_plan".
 *
 * The followings are the available columns in table 'project_plan':
 * @property integer $id
 * @property integer $process_id
 * @property integer $project_manager_validated
 * @property integer $technical_leader_validated
 */
class project_plan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'project_plan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, process_id', 'required'),
			array('id, process_id, project_manager_validated, technical_leader_validated', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, process_id, project_manager_validated, technical_leader_validated', 'safe', 'on'=>'search'),
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
			'delivery_instructions' => array(self::HAS_MANY, 'DeliveryInstructions', 'project_plan_id'),
			'minutes' => array(self::HAS_MANY, 'Minutes', 'project_plan_id'),
			'process' => array(self::BELONGS_TO, 'Processes', 'process_id'),
			'risks' => array(self::HAS_MANY, 'Risks', 'project_plan_id'),
			'tasks' => array(self::HAS_MANY, 'Tasks', 'project_plan_id'),
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
			'project_manager_validated' => 'Project Manager Validated',
			'technical_leader_validated' => 'Technical Leader Validated',
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

		$criteria->compare('id',$this->id);

		$criteria->compare('process_id',$this->process_id);

		$criteria->compare('project_manager_validated',$this->project_manager_validated);

		$criteria->compare('technical_leader_validated',$this->technical_leader_validated);

		return new CActiveDataProvider('project_plan', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return project_plan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}