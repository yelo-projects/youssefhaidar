<?php

class ExtendedDataObject extends DataObject{

	static $db = array(
		'Title'	=>	'varchar'
	);

	static $summary_fields = array(
		'Title'
	);
        
	static $searchable_fields = array(
		'Title'
	);

	public function  getCMSFields($params = null) {
		$fieldSet = new FieldSet();
		$fieldSet->push(new TabSet('Root','Root',new TabSet('Content')),'Root');
		$fields = $this->_getFields($params);
		foreach($fields as $tab=>$tabset){
			$fieldSet->addFieldToTab('Root.Content',new Tab($tab));
			foreach($tabset as $name=>$field){
				$fieldSet->addFieldToTab('Root.Content.'.$tab,$field);
			}
		}
        return $fieldSet;
	}

	public function getCMSFields_forPopup($params = null) {
		$fieldSet = new FieldSet();
		$fieldSet->push(new TabSet('Content'),'Content');
		$fields = $this->_getFields($params);
		foreach($fields as $tab=>$tabset){
			$fieldSet->addFieldToTab('Content',new Tab($tab));
			foreach($tabset as $name=>$field){
				$fieldSet->addFieldToTab('Content.'.$tab,$field);
			}
		}
        return $fieldSet;
	}

	public function _getFields($params=null){
		return array(
			'Main'	=>	array(
				'Title'	=>	new TextField('Title','Title')
			)
		);
	}

	public function getNiceClassName(){
		return strtolower($this->class);	
	}

	public function getTitleAtt(){
		return strtolower(str_replace('  ','_',$this->_getTitle()));
	}

	protected function _getTitle(){
		return $this->Title;
	}
}