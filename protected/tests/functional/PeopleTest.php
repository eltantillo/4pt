<?php

class PeopleTest extends WebTestCase
{
	public $fixtures=array(
		'peoples'=>'People',
	);

	public function testShow()
	{
		$this->open('?r=people/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=people/create');
	}

	public function testUpdate()
	{
		$this->open('?r=people/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=people/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=people/index');
	}

	public function testAdmin()
	{
		$this->open('?r=people/admin');
	}
}
