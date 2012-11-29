<?php

/**
 * Model pro praci nad databazy pro tabulku data, 
 * kde jsou ulozeny work a product
 * 
 * @author JK
 */
class Data extends Object{

	/** @var Connection - pripojeni na databazy*/
	private $database;
	
	public function __construct(Connection $t) {
		$this->database = $t;
	}
	/*
	 * Primy pristup na tabulku 
	 */
	public function t($table){
		return $this->database->table($table);
	}
	


}