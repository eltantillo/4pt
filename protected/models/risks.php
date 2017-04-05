<?php

/**
 * This is the model class for table "risks".
 *
 * The followings are the available columns in table 'risks':
 * @property string $id
 * @property string $project_plan_id
 * @property string $risk
 * @property double $cost
 */
class risks extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'risks';
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
			array('cost', 'numerical'),
			array('project_plan_id', 'length', 'max'=>10),
			array('risk', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, project_plan_id, risk, cost', 'safe', 'on'=>'search'),
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
			'risk' => Language::$riskDescription,
			'cost' => Language::$cost,
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

		$criteria->compare('risk',$this->risk,true);

		$criteria->compare('cost',$this->cost);

		return new CActiveDataProvider('risks', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return risks the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}