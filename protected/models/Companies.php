<?php

/**
 * This is the model class for table "companies".
 *
 * The followings are the available columns in table 'companies':
 * @property string $id
 * @property string $name
 * @property string $address
 * @property string $phone
 * @property string $language
 */
class companies extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'companies';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, address, phone, language', 'required', 'message'=>'Por favor ingrese un valor en {attribute}.'),
			array('name', 'length', 'max'=>64),
			array('address', 'length', 'max'=>128),
			array('phone', 'length', 'max'=>16),
			array('language', 'length', 'max'=>8),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, address, phone, language', 'safe', 'on'=>'search'),
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
			'peoples' => array(self::HAS_MANY, 'people', 'company_id'),
			'projects' => array(self::HAS_MANY, 'projects', 'company_id'),
			'templates' => array(self::HAS_MANY, 'templates', 'company_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id'       => 'Id',
			'name'     => Language::$name,
			'address'  => Language::$address,
			'phone'    => Language::$phone,
			'language' => Language::$language,
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

		$criteria->compare('name',$this->name,true);

		$criteria->compare('address',$this->address,true);

		$criteria->compare('phone',$this->phone,true);

		$criteria->compare('language',$this->language,true);

		return new CActiveDataProvider('companies', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return companies the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}