<?php

class Article extends ExtendedDataObject implements PermissionProvider{

	static $db = array(
		  'Title'		=>	'varchar'
		, 'Date'		=>	'Date'
		, 'Description'	=>	'HTMLText'
	);
	static $has_one = array (
		  'Image'			=> 'ArticleImage'
		, 'Document'		=>	'File'
		, 'ArticlesList'	=>'ArticlesListPage'
	);

	static $summary_fields = array(
		  'Thumbnail'	=>	'Thumbnail'
		, 'Title'		=>	'Title'
		, 'Date'		=>	'Date'
		, 'Description'	=>	'Description'
		//, 'ArticlesList.Title'=>	'Articles Page'
	);

	static $searchable_fields = array(
		'Title'
		, 'Date'
		, 'Description'
	);

	public function getCMSFields($params=null){
		$fields = parent::getCMSFields($params);
		$fields->addFieldToTab('Root.Content.Main', new HasOneDataObjectManager(
			$this
			, 'ArticlesList'
			, 'ArticlesListPage'
			, array('Title'=>'Title')
			, 'getCMSfields'
		));
		return $fields;
	}


	public function _getFields($params=null){
		$pf = parent::_getFields($params);
		$f = array(
			'Main'	=>	array(
				  'Title'		=>	$pf['Main']['Title']
				, 'Description'	=>	new HtmlEditorField('Description','Description')
			)
			, 'Meta'	=>	array(
				'Date' => new DatePickerField('Date','Date')
			)
			, 'Attached'	=>	array(
				  'Image'		=>	new ImageUploadField('Image', 'ArticleImage')
				, 'Document'	=>	new FileUploadField('Document','Document')
			)
		);
		$f['Meta']['Date']->setConfig('showcalendar', true);
		$f['Meta']['Date']->setConfig('dateformat', 'dd/MM/YYYY');
		return $f;
	}

	public function getYear(){
		$d = $this->Date;
		if($d){
			return date('Y',strtotime($d));
		}
	}

	public function getAdditionalClasses(){
		$c = '';
		$c.=(($Image = $this->Image()) && $Image->ID) ? 'hasImage' : 'noImage';
		return $c;
	}

	public function getDateStr(){
		$d = $this->Date;
		if($d){
			return date('Y/m',strtotime($d));
		};
		return '&nbsp;';
	}

	public function getThumbnail(){
		if ($Image = $this->Image() && $Image->getURL()){
			return $Image->CMSThumbnail();
		}
		else{return '(No Image)';}
	}

	public function providePermissions(){
		return $this->_providePermissionsArray($this->class);
	}

	public function canEdit(){
		return Permission::check($this->class.'_EDIT');
	}

	public function canCreate(){
		return Permission::check($this->class.'_CREATE');
	}

	public function canDelete(){
		return Permission::check($this->class.'_DELETE');
	}

	public function canPublish(){
		return Permission::check($this->class.'_PUBLISH');
	}

	public function canView(){
		return true;
		//return Permission::check($this->class.'_VIEW');
	}
}
