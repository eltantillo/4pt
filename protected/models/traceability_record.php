<?php

/**
 * This is the model class for table "traceability_record".
 *
 * The followings are the available columns in table 'traceability_record':
 * @property integer $id
 * @property integer $processes_id
 * @property string $traceability_recordcol
 * @property string $traceability_recordcol1
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
			array('id, processes_id', 'required'),
			array('id, processes_id', 'numerical', 'integerOnly'=>true),
			array('traceability_recordcol1', 'length', 'max'=>45),
			array('traceability_recordcol', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, processes_id, traceability_recordcol, traceability_recordcol1', 'safe', 'on'=>'search'),
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
			'processes' => array(self::BELONGS_TO, 'Processes', 'processes_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'processes_id' => 'Processes',
			'traceability_recordcol' => 'Traceability Recordcol',
			'traceability_recordcol1' => 'Traceability Recordcol1',
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

		$criteria->compare('processes_id',$this->processes_id);

		$criteria->compare('traceability_recordcol',$this->traceability_recordcol,true);

		$criteria->compare('traceability_recordcol1',$this->traceability_recordcol1,true);

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