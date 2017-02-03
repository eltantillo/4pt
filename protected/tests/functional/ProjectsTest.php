<?php

class ProjectsTest extends WebTestCase
{
	public $fixtures=array(
		'projects'=>'Projects',
	);

	public function testShow()
	{
		$this->open('?r=projects/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=projects/create');
	}

	public function testUpdate()
	{
		$this->open('?r=projects/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=projects/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=projects/index');
	}

	public function testAdmin()
	{
		$this->open('?r=projects/admin');
	}
}
