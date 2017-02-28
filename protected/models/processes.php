<?php

/**
 * This is the model class for table "processes".
 *
 * The followings are the available columns in table 'processes':
 * @property integer $id
 * @property string $project_id
 */
class processes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'processes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, project_id', 'required'),
			array('id', 'numerical', 'integerOnly'=>true),
			array('project_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, project_id', 'safe', 'on'=>'search'),
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
			'maintenance_manuals' => array(self::HAS_MANY, 'MaintenanceManual', 'processes_id'),
			'operation_manuals' => array(self::HAS_MANY, 'OperationManual', 'processes_id'),
			'project' => array(self::BELONGS_TO, 'projects', 'project_id'),
			'project_closures' => array(self::HAS_MANY, 'ProjectClosure', 'processes_id'),
			'project_executions' => array(self::HAS_MANY, 'ProjectExecution', 'processes_id'),
			'project_plans' => array(self::HAS_MANY, 'ProjectPlan', 'process_id'),
			'software_components' => array(self::HAS_MANY, 'SoftwareComponent', 'processes_id'),
			'software_designs' => array(self::HAS_MANY, 'SoftwareDesign', 'processes_id'),
			'software_requirements' => array(self::HAS_MANY, 'SoftwareRequirements', 'processes_id'),
			'test_reports' => array(self::HAS_MANY, 'TestReport', 'processes_id'),
			'traceability_records' => array(self::HAS_MANY, 'TraceabilityRecord', 'processes_id'),
			'user_manuals' => array(self::HAS_MANY, 'UserManual', 'processes_id'),
			'work_statements' => array(self::HAS_MANY, 'WorkStatement', 'process_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'project_id' => 'Project',
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

		$criteria->compare('project_id',$this->project_id,true);

		return new CActiveDataProvider('processes', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return processes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}