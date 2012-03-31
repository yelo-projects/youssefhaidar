<?php
class Project extends ExtendedDataObject{

	static $allowed_children = 'none';
	static $db = array(
		  'Description'		=>	'HTMLText'
		, 'DateStarted'		=>	'Date'
		, 'DateEnded'		=>	'Date'
		, 'Client'			=>	'varchar'
		, 'Status'			=>	'int'
		, 'Location'		=>	'varchar'
		, 'Category'		=>	'int'
	);
	static $has_many = array ('Images' => 'ProjectImage');
	static $has_one = array('ProjectListPage'=>'ProjectListPage');

	static $summary_fields = array(
		  'Thumbnail'	=>	'Thumbnail'
		, 'Title'		=>	'Title'
		, 'DateStarted'	=>	'Start'
		, 'DateEnded'	=>	'End'
		, 'StatusStr'	=>	'Status'
		, 'Location'	=>	'Location'
		, 'CategoryStr'	=>	'Category'
	);
        
	static $searchable_fields = array(
		  'Title'
		, 'DateStarted'
		, 'DateEnded'
		, 'Location'
		, 'Client'
	);

	static $status_codes = array(
		'Completed','On Hold','Cancelled'
	);
	static $categories_codes = array(
		  'Uncategorized'
		, 'Residential Buildings'
		, 'Individual Residences'
		, 'Residential Towers'
		, 'Shops'
		, 'Offices'
		, 'Museums'
		, 'Interiors'
		, 'Hotels'
		, 'Culturel'
		, 'Allotments'
	);

	protected $_cover;

	public static function getEnum($array,$n){
		if(!func_num_args() || $n===null){return $array[0];}
		foreach($array as $i=>$str){
			if($i===$n){return $str;}
		};
		return $array[0];
	}

	public function getStatusStr($statusCode=null){
		if(!func_num_args()){$statusCode = $this->Status;}
		return self::getEnum(self::$status_codes,$statusCode);
	}

	public function getCategoryStr($catCode=null){
		if(!func_num_args()){$catCode=$this->Category;}
		return self::getEnum(self::$categories_codes,$catCode);
	}

	public function _getFields(){
		$pf = parent::_getFields();
		$f = array(
			'Main'	=>	array(
				  'Title'		=>	$pf['Main']['Title']
				, 'Description'	=>	new HtmlEditorField('Description','Description')
			)
			, 'Meta'	=>	array(
				  'Client' => new TextField('Client','Client')
				, 'Category'	=>	new DropDownField('Category','Category',self::$categories_codes)
				, 'Location' => new TextField('Location','Location')
				, 'Status' => new DropDownField('Status','Status',self::$status_codes)
				, 'DateStarted' => new DatePickerField('DateStarted','DateStarted')
				, 'DateEnded' => new DatePickerField('DateEnded','DateEnded')
			)
			, 'Images'		=>	array(
				'Images'	=>	new ImageDataObjectManager($this,'Images','ProjectImage',null,null,null,'ProjectID='.$this->ID)
			)
		);
		$f['Meta']['DateStarted']->setConfig('showcalendar', true);
		$f['Meta']['DateStarted']->setConfig('dateformat', 'dd/MM/YYYY');
		$f['Meta']['DateEnded']->setConfig('showcalendar', true);
		$f['Meta']['DateEnded']->setConfig('dateformat', 'dd/MM/YYYY');
		$f['Images']['Images']->setAddTitle('Image');
		return $f;	
	}

	public function getYear(){
		$d = $this->Date;
		if($d){
			return date('Y',strtotime($d));
		}
	}

	public function getThumbnail(){
		if ($Image = $this->getCover()){return $Image->CMSThumbnail();}
		else{return '(No Image)';}
	}

	public function getCover(){
		if(!$this->_cover){$this->_cover = $this->getFirstImage();}
		return $this->_cover;
	}

	public function getFirstImage(){
		$images = $this->Images();
		if($images){
			return $images->First();
		}
	}
}

