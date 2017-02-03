<?php

class CompaniesTest extends WebTestCase
{
	public $fixtures=array(
		'companies'=>'Companies',
	);

	public function testShow()
	{
		$this->open('?r=companies/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=companies/create');
	}

	public function testUpdate()
	{
		$this->open('?r=companies/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=companies/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=companies/index');
	}

	public function testAdmin()
	{
		$this->open('?r=companies/admin');
	}
}
