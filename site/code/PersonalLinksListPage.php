<?php
class PersonalLinksListPage extends ListPage {

	protected $attached = 'PersonalLink';
	protected $attachedTitle = 'Links';
	static $has_many = array('Links'=>'PersonalLink');

}
class PersonalLinksListPage_Controller extends ListPage_Controller {

}
