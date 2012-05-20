<?php
class ProjectImage extends Image{
	
	static $has_one = array('Project'=>'Project');
        
	static $summary_fields = array(
		'Name',
		'Title',
		'ProjectName'
	);
        
	static $searchable_fields = array(
		'Name',
		'Title'
	);
	
	public function getProjectName(){
		if($this->Project()){
			return $this->Project()->Title;
		}
		return null;
	}
}
