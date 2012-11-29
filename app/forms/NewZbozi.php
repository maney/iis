<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PageForm
 *
 * @author JK
 */
class NewZbozi extends AppForm{
	
	
		public function __construct() {
		parent::__construct();
		
		$this->addText('nazev', 'Název zboží')
						->addRule(AppForm::FILLED, '%label je nutný zadat');
		
		$this->addText('cena', 'Cena zbozi')
						->addRule(AppForm::INTEGER, 'Cena zbozi musi byt cislo')
						->addRule(AppForm::FILLED, '%label je nutný zadat');
		
		
		$this->addSubmit('save', 'Save');
	
		$this->onSuccess[] = array($this, 'succes');
		
	}


	public function succes($form) {
		$data = $form->getValues();
		 
		$this->parent->data->t('zbozi')->insert($data);
				
		//$this->parent->data->save('pages', $data);
		$this->parent->flashMessage('Data saved');
		$this->parent->redirect('default');
	}

}

?>
