<?php

/**
 * This is the model class for table "corrective_actions".
 *
 * The followings are the available columns in table 'corrective_actions':
 * @property string $id
 * @property string $process_id
 * @property string $problem
 * @property string $solution
 * @property string $corrective_actions
 * @property string $responsible_id
 * @property string $open_date
 * @property string $close_date
 * @property integer $complete
 */
class corrective_actions extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'corrective_actions';
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
			array('complete', 'numerical', 'integerOnly'=>true),
			array('process_id, responsible_id', 'length', 'max'=>10),
			array('problem, solution, corrective_actions, open_date, close_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, process_id, problem, solution, corrective_actions, responsible_id, open_date, close_date, complete', 'safe', 'on'=>'search'),
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
			'responsible' => array(self::BELONGS_TO, 'People', 'responsible_id'),
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
			'problem' => Language::$problem,
			'solution' => Language::$solution,
			'corrective_actions' => Language::$correctiveActions,
			'responsible_id' => Language::$responsible,
			'open_date' => Language::$openDate,
			'close_date' => Language::$closeDate,
			'complete' => Language::$send,
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

		$criteria->compare('problem',$this->problem,true);

		$criteria->compare('solution',$this->solution,true);

		$criteria->compare('corrective_actions',$this->corrective_actions,true);

		$criteria->compare('responsible_id',$this->responsible_id,true);

		$criteria->compare('open_date',$this->open_date,true);

		$criteria->compare('close_date',$this->close_date,true);

		$criteria->compare('complete',$this->complete);

		return new CActiveDataProvider('corrective_actions', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return corrective_actions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}