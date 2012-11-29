<?php

/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter {

	protected function startup() {
		parent::startup();
	}

	public function renderDefault() {

		$this->template->t = $this->data->t('zbozi');
	}

	public function renderEdit($id) {
		
		
		$f = $this->data->t('zbozi')->get($id);
		$this['nZbozi']->setDefaultValues($f);
	}

	public function createComponentNZbozi() {
		return new NewZbozi();
	}

}
