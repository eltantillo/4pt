<?php

/**
 * This is the model class for table "software_requirements".
 *
 * The followings are the available columns in table 'software_requirements':
 * @property string $id
 * @property string $process_id
 * @property string $introduction
 * @property string $user_interface
 * @property string $external_interfaces
 * @property string $reliability
 * @property string $efficiency
 * @property string $maintenance
 * @property string $portability
 * @property string $interoperability
 * @property string $reuse
 * @property string $legal
 */
class software_requirements extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'software_requirements';
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
			array('introduction, user_interface, external_interfaces, reliability, efficiency, maintenance, portability, interoperability, reuse, legal', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, process_id, introduction, user_interface, external_interfaces, reliability, efficiency, maintenance, portability, interoperability, reuse, legal', 'safe', 'on'=>'search'),
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
			'design_restrictions' => array(self::HAS_MANY, 'DesignRestrictions', 'software_requirements_id'),
			'functionalities' => array(self::HAS_MANY, 'Functionality', 'software_requirements_id'),
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
			'introduction' => 'Introduction',
			'user_interface' => 'User Interface',
			'external_interfaces' => 'External Interfaces',
			'reliability' => 'Reliability',
			'efficiency' => 'Efficiency',
			'maintenance' => 'Maintenance',
			'portability' => 'Portability',
			'interoperability' => 'Interoperability',
			'reuse' => 'Reuse',
			'legal' => 'Legal',
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

		$criteria->compare('introduction',$this->introduction,true);

		$criteria->compare('user_interface',$this->user_interface,true);

		$criteria->compare('external_interfaces',$this->external_interfaces,true);

		$criteria->compare('reliability',$this->reliability,true);

		$criteria->compare('efficiency',$this->efficiency,true);

		$criteria->compare('maintenance',$this->maintenance,true);

		$criteria->compare('portability',$this->portability,true);

		$criteria->compare('interoperability',$this->interoperability,true);

		$criteria->compare('reuse',$this->reuse,true);

		$criteria->compare('legal',$this->legal,true);

		return new CActiveDataProvider('software_requirements', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return software_requirements the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}