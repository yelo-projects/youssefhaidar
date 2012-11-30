<?php
class Project extends ExtendedDataObject implements PermissionProvider{

	static $allowed_children = 'none';
	static $db = array(
		  'Title'			=>	'varchar'
		, 'Description'		=>	'HTMLText'
		, 'DateStarted'		=>	'Date'
		, 'DateEnded'		=>	'Date'
		, 'Client'			=>	'varchar'
		, 'Status'			=>	'int'
		, 'Location'		=>	'varchar'
		, 'Category'		=>	'int'
	);
	static $has_many = array ('Images' => 'ProjectImage');
	static $has_one = array('ProjectsList'=>'ProjectsListPage');

	static $summary_fields = array(
		  'Thumbnail'	=>	'Thumbnail'
		, 'Title'		=>	'Title'
		, 'DateStarted'	=>	'Start'
		, 'DateEnded'	=>	'End'
		, 'StatusStr'	=>	'Status'
		, 'Location'	=>	'Location'
		, 'CategoryStr'	=>	'Category'
		//, 'ProjectsList.Title'=>	'Project Page'
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

	static $default_sort = '`Project`.`Title`';

	public static function getEnum($array,$n){
		if(func_num_args()===0 || $n===null){return $array[0];}
		foreach($array as $i=>$str){
			if($i==$n){return $str;}
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

	public function getCMSFields($params=null){
		$fields = parent::getCMSFields($params);
		$fields->addFieldToTab('Root.Content.Main', new HasOneDataObjectManager(
			$this
			, 'ProjectsList'
			, 'ProjectsListPage'
			, array('Title'=>'Title')
			, 'getCMSfields'
		));
		return $fields;
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

	public function getYear($d=null){
		if(!func_num_args()){$d=$this->DateStarted();}
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

	public function getDateStr(){
		$start = $this->getYear($this->DateStarted);
		if($start){
			$end = $this->getYear($this->DateEnded);
			if($end){
				if($start == $end){
					return "started and ended in $start";
				}
				return "from $start to $end";
			}
			return $start;
		}
		return 'unspecified';
	}

	public function getDate(){
		$start = $this->getYear($this->DateStarted);
		if($start){return $start;}
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

