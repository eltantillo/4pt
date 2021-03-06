<?php

/**
 * This is the model class for table "software_component".
 *
 * The followings are the available columns in table 'software_component':
 * @property string $id
 * @property string $process_id
 * @property string $name
 * @property string $description
 * @property string $file
 */
class software_component extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'software_component';
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
			array('process_id', 'length', 'max'=>10),
			array('name, description', 'safe'),
			array('file', 'file', 'safe' => false, 'allowEmpty'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, process_id, name, description, file', 'safe', 'on'=>'search'),
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
			'name' => Language::$name,
			'description' => Language::$description,
			'file' => Language::$file,
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

		$criteria->compare('name',$this->name,true);

		$criteria->compare('description',$this->description,true);

		$criteria->compare('file',$this->file,true);

		return new CActiveDataProvider('software_component', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return software_component the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}