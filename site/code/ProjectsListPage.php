<?php
class ProjectsListPage extends HomePage {

	static $allowed_children = array('Category','Collaboration');
	static $default_child = 'Category';



}
class ProjectsListPage_Controller extends Page_Controller {

}
