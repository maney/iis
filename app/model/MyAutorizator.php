<?php

/**
 * Description of MyAutorizator
 *
 * @author JK
 */
class MyAutorizator extends Permission {
	
	public function __construct() {
		
		$this->addRole('admin');
		$this->addRole('kandidat');

		$this->addResource('Admin');

		$this->addResource('Slide');
		$this->addResource('Novinky');
		$this->addResource('Media');
		$this->addResource('Temata');
		$this->addResource('Kandidati');
		$this->addResource('News');
		$this->addResource('Ouska');
		$this->addResource('Kontakt');
		$this->addResource('Program');
		$this->addResource('Multimedia');
		$this->addResource('Passchange');
		
		$this->addResource('delete');
		
		
		

		$this->allow('admin');
		$this->allow('kandidat', array('Admin', 'Novinky', 'Media', 'Temata', 'Passchange'));
	}

}