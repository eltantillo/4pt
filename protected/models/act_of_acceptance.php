<?php

/**
 * This is the model class for table "act_of_acceptance".
 *
 * The followings are the available columns in table 'act_of_acceptance':
 * @property string $id
 * @property string $process_id
 * @property string $register
 * @property string $date
 * @property string $delivered_items
 * @property string $criteria_verification
 * @property string $pending_issues
 * @property integer $client_validated
 */
class act_of_acceptance extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'act_of_acceptance';
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
			array('client_validated', 'numerical', 'integerOnly'=>true),
			array('process_id', 'length', 'max'=>10),
			array('register, date, delivered_items, criteria_verification, pending_issues', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, process_id, register, date, delivered_items, criteria_verification, pending_issues, client_validated', 'safe', 'on'=>'search'),
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
			'register' => Language::$deliveryRegister,
			'date' => Language::$date,
			'delivered_items' => Language::$deliveredItems,
			'criteria_verification' => Language::$criteriaVerification,
			'pending_issues' => Language::$pendingIssues,
			'client_validated' => Language::$validate,
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

		$criteria->compare('register',$this->register,true);

		$criteria->compare('date',$this->date,true);

		$criteria->compare('delivered_items',$this->delivered_items,true);

		$criteria->compare('criteria_verification',$this->criteria_verification,true);

		$criteria->compare('pending_issues',$this->pending_issues,true);

		$criteria->compare('client_validated',$this->client_validated);

		return new CActiveDataProvider('act_of_acceptance', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return act_of_acceptance the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}