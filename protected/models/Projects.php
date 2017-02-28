<?php

/**
 * This is the model class for table "projects".
 *
 * The followings are the available columns in table 'projects':
 * @property string $id
 * @property string $company_id
 * @property string $title
 * @property string $acronym
 * @property integer $product_type
 * @property integer $level
 * @property string $template
 * @property string $roles
 * @property string $people
 */
class projects extends CActiveRecord
{
	public $rolesArray  = array();
	public $peopleArray = array();
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'projects';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('company_id, title, acronym, product_type, level', 'required', 'message'=>Language::$emptyValue),
			array('product_type, level', 'numerical', 'integerOnly'=>true),
			array('company_id, template', 'length', 'max'=>10),
			array('title', 'length', 'max'=>64),
			array('acronym, roles', 'length', 'max'=>16),
			array('people', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, company_id, title, acronym, product_type, level, template, roles, people', 'safe', 'on'=>'search'),
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
			'title'        => Language::$title,
			'acronym'      => Language::$acronym,
			'product_type' => Language::$ProjectType,
			'level'        => Language::$level,
			'template'     => Language::$template,
			'roles'        => Language::$roles,
			'people'       => Language::$people,
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

		$criteria->compare('title',$this->title,true);

		$criteria->compare('acronym',$this->acronym,true);

		$criteria->compare('product_type',$this->product_type);

		$criteria->compare('level',$this->level);

		$criteria->compare('template',$this->template,true);

		$criteria->compare('roles',$this->roles,true);

		$criteria->compare('people',$this->people,true);

		return new CActiveDataProvider('projects', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return projects the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}