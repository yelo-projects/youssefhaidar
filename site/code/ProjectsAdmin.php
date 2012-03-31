<?php
class ProjectsAdmin extends ModelAdmin {

  public static $managed_models = array('Project','ProjectImage');

  static $url_segment = 'projects';
  static $menu_title = 'Projects';

  function init(){parent::init();Requirements::javascript('site/javascript/admin.js');}
}
