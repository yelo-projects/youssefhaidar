<?php
class ProjectsListPage extends ListPage {

	protected $attached = 'Project';
	protected $attachedTitle = 'Project';
	static $has_many = array('Project'=>'Project');

}
class ProjectsListPage_Controller extends ListPage_Controller {

}
