<?php

/**
 * This is the model class for table "progress_report".
 *
 * The followings are the available columns in table 'progress_report':
 * @property string $id
 * @property string $process_id
 * @property string $task_status
 * @property string $results_status
 * @property string $resources_status
 * @property string $costs_status
 * @property string $calendar_status
 * @property string $risks_status
 * @property string $deviations_record
 */
class progress_report extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'progress_report';
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
			array('process_id', 'length', 'max'=>10),
			array('task_status, results_status, resources_status, costs_status, calendar_status, risks_status, deviations_record', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, process_id, task_status, results_status, resources_status, costs_status, calendar_status, risks_status, deviations_record', 'safe', 'on'=>'search'),
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
			'task_status' => 'Task Status',
			'results_status' => 'Results Status',
			'resources_status' => 'Resources Status',
			'costs_status' => 'Costs Status',
			'calendar_status' => 'Calendar Status',
			'risks_status' => 'Risks Status',
			'deviations_record' => 'Deviations Record',
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

		$criteria->compare('task_status',$this->task_status,true);

		$criteria->compare('results_status',$this->results_status,true);

		$criteria->compare('resources_status',$this->resources_status,true);

		$criteria->compare('costs_status',$this->costs_status,true);

		$criteria->compare('calendar_status',$this->calendar_status,true);

		$criteria->compare('risks_status',$this->risks_status,true);

		$criteria->compare('deviations_record',$this->deviations_record,true);

		return new CActiveDataProvider('progress_report', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return progress_report the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}