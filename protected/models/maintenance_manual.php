<?php

/**
 * This is the model class for table "maintenance_manual".
 *
 * The followings are the available columns in table 'maintenance_manual':
 * @property integer $id
 * @property integer $processes_id
 * @property string $enviroment
 */
class maintenance_manual extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'maintenance_manual';
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
			array('enviroment', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, processes_id, enviroment', 'safe', 'on'=>'search'),
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
			'enviroment' => 'Enviroment',
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

		$criteria->compare('enviroment',$this->enviroment,true);

		return new CActiveDataProvider('maintenance_manual', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return maintenance_manual the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}