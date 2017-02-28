<?php

/**
 * This is the model class for table "work_statement".
 *
 * The followings are the available columns in table 'work_statement':
 * @property integer $id
 * @property integer $process_id
 * @property string $product_description
 * @property string $scope
 * @property string $objectives
 * @property string $deliverables
 * @property integer $sent
 * @property integer $project_manager_validated
 * @property integer $technical_leader_validated
 * @property integer $change_request
 * @property string $change_request_details
 */
class work_statement extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'work_statement';
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
			array('process_id, sent, project_manager_validated, technical_leader_validated, change_request', 'numerical', 'integerOnly'=>true),
			array('product_description, scope, objectives, deliverables, change_request_details', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, process_id, product_description, scope, objectives, deliverables, sent, project_manager_validated, technical_leader_validated, change_request, change_request_details', 'safe', 'on'=>'search'),
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
			'product_description' => 'Product Description',
			'scope' => 'Scope',
			'objectives' => 'Objectives',
			'deliverables' => 'Deliverables',
			'sent' => 'Sent',
			'project_manager_validated' => 'Project Manager Validated',
			'technical_leader_validated' => 'Technical Leader Validated',
			'change_request' => 'Change Request',
			'change_request_details' => 'Change Request Details',
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

		$criteria->compare('product_description',$this->product_description,true);

		$criteria->compare('scope',$this->scope,true);

		$criteria->compare('objectives',$this->objectives,true);

		$criteria->compare('deliverables',$this->deliverables,true);

		$criteria->compare('sent',$this->sent);

		$criteria->compare('project_manager_validated',$this->project_manager_validated);

		$criteria->compare('technical_leader_validated',$this->technical_leader_validated);

		$criteria->compare('change_request',$this->change_request);

		$criteria->compare('change_request_details',$this->change_request_details,true);

		return new CActiveDataProvider('work_statement', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return work_statement the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}