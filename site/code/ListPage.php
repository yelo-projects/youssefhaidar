<?php
class ListPage extends Page {

	protected $attached = '';
	protected $attachedTitle = '';
	protected $attachedSort = null;

	public function getCMSFields($args=null){
		$fields = parent::getCMSFields($args);
		if($this->attached){
			$fields->addFieldToTab('Root.Content',new Tab($this->attachedTitle));
			$fields->addFieldToTab('Root.Content.'.$this->attachedTitle,new HasManyDataObjectManager(
				  $this
				, $this->attachedTitle
				, $this->attached
				, null,null,null,$this->class.'ID='.$this->ID
			));
		}
		return $fields;
	}

	public function getAttached(){
		if($this->attached){
			return DataObject::get($this->attached,$this->class.'ID='.$this->ID,$this->attachedSort,null,null);
		}
		return null;
	}
}

class ListPage_Controller extends Page_Controller {

}
