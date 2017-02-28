<?php

/**
 * This is the model class for table "test_report".
 *
 * The followings are the available columns in table 'test_report':
 * @property integer $id
 * @property integer $processes_id
 * @property string $resume
 * @property string $test_case
 * @property string $tester_id
 * @property string $defect_level
 * @property string $affected_functions
 * @property string $origin_date
 * @property string $resolution_date
 * @property string $solver_id
 */
class test_report extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'test_report';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, processes_id, tester_id, solver_id', 'required'),
			array('id, processes_id', 'numerical', 'integerOnly'=>true),
			array('tester_id, solver_id', 'length', 'max'=>10),
			array('resume, test_case, defect_level, affected_functions, origin_date, resolution_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, processes_id, resume, test_case, tester_id, defect_level, affected_functions, origin_date, resolution_date, solver_id', 'safe', 'on'=>'search'),
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
			'tester' => array(self::BELONGS_TO, 'people', 'tester_id'),
			'solver' => array(self::BELONGS_TO, 'people', 'solver_id'),
			'processes' => array(self::BELONGS_TO, 'Processes', 'processes_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'processes_id' => 'Processes',
			'resume' => 'Resume',
			'test_case' => 'Test Case',
			'tester_id' => 'Tester',
			'defect_level' => 'Defect Level',
			'affected_functions' => 'Affected Functions',
			'origin_date' => 'Origin Date',
			'resolution_date' => 'Resolution Date',
			'solver_id' => 'Solver',
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

		$criteria->compare('processes_id',$this->processes_id);

		$criteria->compare('resume',$this->resume,true);

		$criteria->compare('test_case',$this->test_case,true);

		$criteria->compare('tester_id',$this->tester_id,true);

		$criteria->compare('defect_level',$this->defect_level,true);

		$criteria->compare('affected_functions',$this->affected_functions,true);

		$criteria->compare('origin_date',$this->origin_date,true);

		$criteria->compare('resolution_date',$this->resolution_date,true);

		$criteria->compare('solver_id',$this->solver_id,true);

		return new CActiveDataProvider('test_report', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return test_report the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}