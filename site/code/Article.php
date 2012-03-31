<?php

class Article extends ExtendedDataObject{

	static $db = array(
		  'Date'	=>	'Date'
		, 'Description'	=>	'HTMLText'
	);
	static $has_one = array (
		  'Image' => 'ArticleImage'
		, 'Document'	=>	'File'
		, 'LinksListPage'=>'LinksListPage'
	);

	static $summary_fields = array(
		  'Thumbnail'
		, 'Title'
		, 'Date'
		, 'Description'
	);
        
	static $searchable_fields = array(
		'Title',
		'Date',
		'Description'
	);

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

	public function getThumbnail(){
		if ($Image = $this->Image()){return $Image->CMSThumbnail();}
		else{return '(No Image)';}
	}

}
