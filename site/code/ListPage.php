<?php
class ListPage extends Page {

	protected $attached = '';
	protected $attachedTitle = '';
	protected $attachedSort = null;
	protected $attachedDescription = null;

	public function getCMSFields($args=null){
		$fields = parent::getCMSFields($args);
		if($this->attached){
			$fields->addFieldToTab('Root.Content',new Tab($this->attachedTitle));
			$fields->addFieldToTab('Root.Content.'.$this->attachedTitle
				,new HasManyDataObjectManager(
					$this
					, $this->attachedTitle
					, $this->attached
					, $this->attachedDescription
					, 'getCMSFields_forPopup'
					, null
					, $this->class.'ID='.$this->ID
				)
			);
		}
		return $fields;
	}

	public function getNiceClassName(){
		return strtolower(str_replace('Page','', $this->class));
	}

	public function getAttachedChildren($sort=''){
		if(!$sort){$sort = $this->attachedSort;};
		if($this->attached){
			return DataObject::get($this->attached,$this->getNiceClassName().'ID='.$this->ID,$sort,null,null);
		}
		return null;
	}

	public function getAttachedChildrenByCategory($dir=''){
		if($dir){$dir= ' '.$dir;}else{$dir='';};
		return $this->getAttachedChildren('Category'.$dir);
	}

	public function getAttachedChildrenByDate($dir=''){
		if($dir){$dir= ' '.$dir;}else{$dir='';};
		return $this->getAttachedChildren('Date'.$dir);
	}

	public function getAttachedChildrenByTitle($dir=''){
		if($dir){$dir= ' '.$dir;}else{$dir='';};
		return $this->getAttachedChildren('Title'.$dir);
	}
	public function getAttachedTitleAtt(){
		return strtolower($this->attachedTitle);
	}
}

class ListPage_Controller extends Page_Controller {

}
