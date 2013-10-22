<?php

class CatalogoObjetosTest extends WebTestCase
{
	public $fixtures=array(
		'catalogoObjetoses'=>'CatalogoObjetos',
	);

	public function testShow()
	{
		$this->open('?r=catalogoObjetos/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=catalogoObjetos/create');
	}

	public function testUpdate()
	{
		$this->open('?r=catalogoObjetos/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=catalogoObjetos/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=catalogoObjetos/index');
	}

	public function testAdmin()
	{
		$this->open('?r=catalogoObjetos/admin');
	}
}
