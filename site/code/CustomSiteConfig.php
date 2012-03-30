<?php

class CustomSiteConfig extends DataObjectDecorator {

    function extraStatics() {
        return array(
            'db' => array(
                'SiteState'			=> "Enum('maintenance,normal,minimal')",
				'BusinessAddress'	=>	'varchar',
				'MaintenanceMode'	=>	'varchar'
            ),
			'has_one'	=>	array(
				'HeaderImage'	=> 'Image'
			)
        );
    }

    public function updateCMSFields(FieldSet &$fields) {
		$fields->addFieldToTab('Root.Main', new TextField('BusinessAddress', 'Address'));
		$fields->addFieldToTab('Root.Main', new TextField('MaintenanceMode', 'Maintenance Text'));
		$fields->addFieldToTab("Root.Main", new DropdownField('SiteState', 'Site State', array('maintenance'=>'maintenance','normal'=>'normal','minimal'=>'minimal')));
		$fields->addFieldToTab('Root.Main', new ImageUploadField('HeaderImage', 'Header Image'));
    }

}