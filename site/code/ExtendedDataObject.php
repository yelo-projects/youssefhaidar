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

	public function _getFields($params=null){
		return array(
			'Main'	=>	array(
				'Title'	=>	new TextField('Title','Title')
			)
		);
	}

}
