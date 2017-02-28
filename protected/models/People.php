<?php

/**
 * This is the model class for table "people".
 *
 * The followings are the available columns in table 'people':
 * @property string $id
 * @property string $company_id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $email
 * @property string $password
 * @property string $phone
 * @property string $habilities
 * @property string $capabilities
 * @property string $roles
 */
class people extends CActiveRecord
{
	public $habilitiesArray   = array();
	public $capabilitiesArray = array();
	public $rolesArray        = array();
	public $password2         = "";
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'people';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, password, first_name', 'required', 'message'=>Language::$emptyValue),
			array('email', 'unique', 'message'=>Language::$duplcateEmail),
			array('email', "email", 'message'=>Language::$invalidEmail),
			array('company_id', 'length', 'max'=>10),
			array('first_name, middle_name, last_name', 'length', 'max'=>32),
			array('email, password, password2', 'length', 'max'=>254),
			array('phone, roles', 'length', 'max'=>16),
			array('habilities, capabilities', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, company_id, first_name, middle_name, last_name, email, password, phone, habilities, capabilities, roles', 'safe', 'on'=>'search'),
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
			'company' => array(self::BELONGS_TO, 'companies', 'company_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id'           => 'Id',
			'company_id'   => Language::$company,
			'first_name'   => Language::$firstName,
			'middle_name'  => Language::$middleName,
			'last_name'    => Language::$lastName,
			'email'        => Language::$email,
			'password'     => Language::$password,
			'password2'    => Language::$password2,
			'phone'        => Language::$phone,
			'habilities'   => Language::$habilities,
			'capabilities' => Language::$capabilities,
			'roles'        => Language::$roles,
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

		$criteria->compare('company_id',$this->company_id,true);

		$criteria->compare('first_name',$this->first_name,true);

		$criteria->compare('middle_name',$this->middle_name,true);

		$criteria->compare('last_name',$this->last_name,true);

		$criteria->compare('email',$this->email,true);

		$criteria->compare('password',$this->password,true);

		$criteria->compare('phone',$this->phone,true);

		$criteria->compare('habilities',$this->habilities,true);

		$criteria->compare('capabilities',$this->capabilities,true);

		$criteria->compare('roles',$this->roles,true);

		return new CActiveDataProvider('people', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return people the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}