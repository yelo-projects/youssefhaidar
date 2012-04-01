<?php

class PersonalLink extends LinkExternal{

	static $db = array(
		'Description'	=>	'varchar'
	);

	static $has_one = array('LinksList'=>'PersonalLinksListPage');

	static $summary_fields = array(
		  'Text'		=>	'Text'
		, 'URL'			=>	'Url'
		, 'Reference'	=>	'Type'
		, 'Description'	=>	'Description'
		//, 'LinksList.Title'	=>	'Links Page'
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


	public function getCMSFields($params=null){
		$fields = parent::getCMSFields($params);
		$fields->addFieldToTab('Root.Content.Main', new HasOneDataObjectManager(
			$this
			, 'LinksList'
			, 'PersonalLinksListPage'
			, array('Title'=>'Title')
			, 'getCMSfields'
		));
		return $fields;
	}

	protected function _getFields($params = null){
		$f = parent::_getFields($params);
		$f['Main']['Description'] = new TextField('Description','Url Description');
		return $f;
	}

	public function getTitle(){
		return false;
	}

	public function getNiceClassName(){
		return 'link'; 
	}
}
