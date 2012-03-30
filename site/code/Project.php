<?php
class Project extends Page{

	static $allowed_children = 'none';
	static $db = array(
		'DateStarted'		=>	'Date'
		, 'DateEnded'		=>	'Date'
		, 'Client'			=>	'varchar'
		, 'Location'		=>	'varchar'
	);
	static $has_many = array ('Images' => 'ProjectImage');

	public function getCMSFields(){
		$f = parent::getCMSFields();
		$images = new ImageDataObjectManager(
			$this,
			'Images',
			'ProjectImage',
			null,
			null,
			null,
			'ProjectID='.$this->ID
		);
		$images->setAddTitle('Image');
		$dateStarted = new DatePickerField('DateStarted','DateStarted');
		$dateStarted->setConfig('showcalendar', true);
		$dateStarted->setConfig('dateformat', 'dd/MM/YYYY');
		$dateEnded = new DatePickerField('DateEnded','DateEnded');
		$dateEnded->setConfig('showcalendar', true);
		$dateEnded->setConfig('dateformat', 'dd/MM/YYYY');
		$client = new TextField('Client','Client');
		$location = new TextField('Location','Locaction');
		$f->addFieldToTab("Root.Content.Meta", $dateStarted);
		$f->addFieldToTab("Root.Content.Meta", $dateEnded);
		$f->addFieldToTab('Root.Content.Meta',$client);
		$f->addFieldToTab('Root.Content.Meta',$location);
		$f->addFieldToTab("Root.Content.Images", $images);
		return $f;
	}

	public function getCategory(){
		return $this->Parent();
	}

	public function getCategoryAtt(){
		$p = $this->Parent();
		if($p){
			if($p->class == 'Category'){
				return $p->getAttTitle();
			}
			else{return 'no-category';}
		}
		return 'uncategorized';
	}

	public function getYear(){
		$d = $this->Date;
		if($d){
			return date('Y',strtotime($d));
		}
	}

	public function getAttCollaboration(){
		if($this->Collaboration){
			return strtolower($this->Collaboration);
		}
	}

	public function getAttClasses(){
		$title =  $this->getAttTitle();
		$cat = $this->getCategoryAtt();
		$coll = $this->getAttCollaboration();
		return $title.($cat? ' category-'.$cat:null).($coll? ' category-'.$coll:null);
	}

}

class Project_Controller extends Page_Controller{

}
