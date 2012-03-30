<?php
class Category extends Page{

	static $allowed_children = array('Project');
	static $db = array();

}

class Category_Controller extends Page_Controller{

}