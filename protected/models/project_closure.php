<?php

/**
 * This is the model class for table "project_closure".
 *
 * The followings are the available columns in table 'project_closure':
 * @property string $id
 * @property string $process_id
 * @property string $reception_register
 * @property string $date
 * @property string $delivered_elements
 * @property integer $acceptance_criteria
 * @property string $pending_issues
 * @property string $signature
 */
class project_closure extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'project_closure';
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
			array('acceptance_criteria', 'numerical', 'integerOnly'=>true),
			array('process_id', 'length', 'max'=>10),
			array('reception_register, date, delivered_elements, pending_issues, signature', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, process_id, reception_register, date, delivered_elements, acceptance_criteria, pending_issues, signature', 'safe', 'on'=>'search'),
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
			'reception_register' => 'Reception Register',
			'date' => 'Date',
			'delivered_elements' => 'Delivered Elements',
			'acceptance_criteria' => 'Acceptance Criteria',
			'pending_issues' => 'Pending Issues',
			'signature' => 'Signature',
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

		$criteria->compare('reception_register',$this->reception_register,true);

		$criteria->compare('date',$this->date,true);

		$criteria->compare('delivered_elements',$this->delivered_elements,true);

		$criteria->compare('acceptance_criteria',$this->acceptance_criteria);

		$criteria->compare('pending_issues',$this->pending_issues,true);

		$criteria->compare('signature',$this->signature,true);

		return new CActiveDataProvider('project_closure', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return project_closure the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}