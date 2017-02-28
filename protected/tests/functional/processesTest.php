<?php

class processesTest extends WebTestCase
{
	public $fixtures=array(
		'processes'=>'processes',
	);

	public function testShow()
	{
		$this->open('?r=processes/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=processes/create');
	}

	public function testUpdate()
	{
		$this->open('?r=processes/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=processes/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=processes/index');
	}

	public function testAdmin()
	{
		$this->open('?r=processes/admin');
	}
}
