<?php



function dd($var){
	Debugger::barDump($var);
}

/**
 * Base class for all application presenters.
 *
 * @property Data $data 
 * @package    MyApplication
 */
abstract class BasePresenter extends Presenter
{
	public $data;
	
	protected function startup() {
		parent::startup();
	
		//cesta od root do www	
		$this->template->BD = BD;
		
		$this->data = $this->getService('data');
  
		$this->user->setAuthorizator(new MyAutorizator());
		
		if(!$this->user->isLoggedIn() && $this->presenter->name != 'Sign'){
			$this->redirect("Sign:in");
		}
		
		
		
		
	}

}
