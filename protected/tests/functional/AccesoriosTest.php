<?php

class AccesoriosTest extends WebTestCase
{
	public $fixtures=array(
		'accesorioses'=>'Accesorios',
	);

	public function testShow()
	{
		$this->open('?r=accesorios/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=accesorios/create');
	}

	public function testUpdate()
	{
		$this->open('?r=accesorios/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=accesorios/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=accesorios/index');
	}

	public function testAdmin()
	{
		$this->open('?r=accesorios/admin');
	}
}
