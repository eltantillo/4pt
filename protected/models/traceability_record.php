<?php

/**
 * This is the model class for table "traceability_record".
 *
 * The followings are the available columns in table 'traceability_record':
 * @property string $id
 * @property string $process_id
 * @property string $traceability_recordcol
 * @property string $traceability_recordcol1
 * @property integer $sent
 * @property integer $project_manager_validated
 * @property integer $technical_leader_validated
 * @property integer $change_request
 * @property string $change_request_details
 */
class traceability_record extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'traceability_record';
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
			array('traceability_recordcol1', 'length', 'max'=>45),
			array('traceability_recordcol, change_request_details', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, process_id, traceability_recordcol, traceability_recordcol1, sent, project_manager_validated, technical_leader_validated, change_request, change_request_details', 'safe', 'on'=>'search'),
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
			'traceability_recordcol' => 'Traceability Recordcol',
			'traceability_recordcol1' => 'Traceability Recordcol1',
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

		$criteria->compare('traceability_recordcol',$this->traceability_recordcol,true);

		$criteria->compare('traceability_recordcol1',$this->traceability_recordcol1,true);

		$criteria->compare('sent',$this->sent);

		$criteria->compare('project_manager_validated',$this->project_manager_validated);

		$criteria->compare('technical_leader_validated',$this->technical_leader_validated);

		$criteria->compare('change_request',$this->change_request);

		$criteria->compare('change_request_details',$this->change_request_details,true);

		return new CActiveDataProvider('traceability_record', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return traceability_record the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}