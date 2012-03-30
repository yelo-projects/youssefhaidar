<?php
class ProjectImagesAdmin extends ModelAdmin {

  public static $managed_models = array('ProjectImage');

  static $url_segment = 'project_images';
  static $menu_title = 'Projects Images';

  function init(){parent::init();Requirements::javascript('site/javascript/admin.js');}
}
