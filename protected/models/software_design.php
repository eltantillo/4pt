<?php

/**
 * This is the model class for table "software_design".
 *
 * The followings are the available columns in table 'software_design':
 * @property string $id
 * @property string $process_id
 * @property string $high_lvl_design
 * @property string $high_lvl_design_file
 * @property string $low_lvl_design
 * @property string $low_lvl_design_file
 * @property integer $sent
 * @property integer $project_manager_validated
 * @property integer $technical_leader_validated
 * @property integer $change_request
 * @property string $change_request_details
 */
class software_design extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'software_design';
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
			array('high_lvl_design, low_lvl_design, change_request_details', 'safe'),
			array('high_lvl_design_file, low_lvl_design_file', 'file', 'safe' => false, 'allowEmpty'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, process_id, high_lvl_design, low_lvl_design, sent, project_manager_validated, technical_leader_validated, change_request, change_request_details', 'safe', 'on'=>'search'),
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
			'high_lvl_design' => Language::$highLevelDesign,
			'low_lvl_design' => Language::$lowLevelDesign,
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

		$criteria->compare('high_lvl_design',$this->high_lvl_design,true);

		$criteria->compare('low_lvl_design',$this->low_lvl_design,true);

		$criteria->compare('sent',$this->sent);

		$criteria->compare('project_manager_validated',$this->project_manager_validated);

		$criteria->compare('technical_leader_validated',$this->technical_leader_validated);

		$criteria->compare('change_request',$this->change_request);

		$criteria->compare('change_request_details',$this->change_request_details,true);

		return new CActiveDataProvider('software_design', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return software_design the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}