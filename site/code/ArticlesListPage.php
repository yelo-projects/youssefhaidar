<?php
class ArticlesListPage extends ListPage {

	protected $attached = 'Article';
	protected $attachedTitle = 'Articles';
	static $has_many = array('Articles'=>'Article');
	static $singular_name = "Articles Page";
	static $plural_name = "Articles Pages";
}
class ArticlesListPage_Controller extends ListPage_Controller {

}
