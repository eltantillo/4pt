<?php

/**
 * This is the model class for table "minutes".
 *
 * The followings are the available columns in table 'minutes':
 * @property string $id
 * @property string $project_plan_id
 * @property string $purpose
 * @property string $assistants
 * @property string $date
 * @property string $place
 * @property string $previous_minute_id
 * @property string $issues_raised
 * @property string $open_issues
 * @property string $agreements
 * @property string $next_meeting
 * @property integer $client_validated
 */
class minutes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'minutes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('project_plan_id', 'required'),
			array('client_validated', 'numerical', 'integerOnly'=>true),
			array('project_plan_id, previous_minute_id', 'length', 'max'=>10),
			array('purpose, assistants, date, place, issues_raised, open_issues, agreements, next_meeting', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, project_plan_id, purpose, assistants, date, place, previous_minute_id, issues_raised, open_issues, agreements, next_meeting, client_validated', 'safe', 'on'=>'search'),
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
			'previous_minute' => array(self::BELONGS_TO, 'minutes', 'previous_minute_id'),
			'minutes' => array(self::HAS_MANY, 'minutes', 'previous_minute_id'),
			'project_plan' => array(self::BELONGS_TO, 'ProjectPlan', 'project_plan_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'project_plan_id' => 'Project Plan',
			'purpose' => 'Purpose',
			'assistants' => 'Assistants',
			'date' => 'Date',
			'place' => 'Place',
			'previous_minute_id' => 'Previous Minute',
			'issues_raised' => 'Issues Raised',
			'open_issues' => 'Open Issues',
			'agreements' => 'Agreements',
			'next_meeting' => 'Next Meeting',
			'client_validated' => 'Client Validated',
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

		$criteria->compare('project_plan_id',$this->project_plan_id,true);

		$criteria->compare('purpose',$this->purpose,true);

		$criteria->compare('assistants',$this->assistants,true);

		$criteria->compare('date',$this->date,true);

		$criteria->compare('place',$this->place,true);

		$criteria->compare('previous_minute_id',$this->previous_minute_id,true);

		$criteria->compare('issues_raised',$this->issues_raised,true);

		$criteria->compare('open_issues',$this->open_issues,true);

		$criteria->compare('agreements',$this->agreements,true);

		$criteria->compare('next_meeting',$this->next_meeting,true);

		$criteria->compare('client_validated',$this->client_validated);

		return new CActiveDataProvider('minutes', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return minutes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}