<?php
class ArticlesListPage extends ListPage {

	protected $attached = 'Article';
	protected $attachedTitle = 'Articles';
	static $has_many = array('Articles'=>'Article');

}
class ArticlesListPage_Controller extends ListPage_Controller {

}
