<?php
class PersonalLinksListPage extends ListPage {

	protected $attached = 'PersonalLink';
	protected $attachedTitle = 'Links';
	static $has_many = array('Links'=>'PersonalLink');
	static $singular_name = "Links Page";
	static $plural_name = "Links Pages";

	public function getNiceClassName(){
		return strtolower(str_replace(array('Page','Personal'),'', $this->class));
	}
}
class PersonalLinksListPage_Controller extends ListPage_Controller {

}
