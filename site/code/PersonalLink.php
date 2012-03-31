<?php

class PersonalLink extends LinkExternal{

	static $db = array(
		'Description'	=>	'varchar'
	);

	static $has_one = array('ArticleListPage'=>'ArticleListPage');

	static $summary_fields = array(
		'Text',
		'URL',
		'Reference',
		'Description',
	);

	static $searchable_fields = array(
		'Text',
		'URL',
		'Type',
		'Description',
		'SocialNetwork'
	);

	static $singular_name = "Link";
	static $plural_name = "Links";

	protected function _getFields(){
		$f = parent::_getFields();
		$f['Main']['Description'] = new TextField('Description','Url Description');
		return $f;
	}


}
