<?php

class TemplatesTest extends WebTestCase
{
	public $fixtures=array(
		'templates'=>'Templates',
	);

	public function testShow()
	{
		$this->open('?r=templates/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=templates/create');
	}

	public function testUpdate()
	{
		$this->open('?r=templates/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=templates/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=templates/index');
	}

	public function testAdmin()
	{
		$this->open('?r=templates/admin');
	}
}
