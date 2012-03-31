<?php
class ProjectsListPage extends ListPage {

	protected $attached = 'Project';
	protected $attachedTitle = 'Projects';
	static $has_many = array('Projects'=>'Project');
	static $singular_name = "Projects Page";
	static $plural_name = "Projects Pages";
}
class ProjectsListPage_Controller extends ListPage_Controller {

}
