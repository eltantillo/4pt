<?php

/**
 * This is the model class for table "delivery_instructions".
 *
 * The followings are the available columns in table 'delivery_instructions':
 * @property string $id
 * @property string $project_plan_id
 * @property string $release_requirements
 * @property string $delivery_requirements
 */
class delivery_instructions extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'delivery_instructions';
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
			array('project_plan_id', 'length', 'max'=>10),
			array('release_requirements, delivery_requirements', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, project_plan_id, release_requirements, delivery_requirements', 'safe', 'on'=>'search'),
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
			'release_requirements' => 'Release Requirements',
			'delivery_requirements' => 'Delivery Requirements',
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

		$criteria->compare('release_requirements',$this->release_requirements,true);

		$criteria->compare('delivery_requirements',$this->delivery_requirements,true);

		return new CActiveDataProvider('delivery_instructions', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return delivery_instructions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}