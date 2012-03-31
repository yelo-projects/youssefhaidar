<?php
class ProjectImagesAdmin extends ModelAdmin {

  public static $managed_models = array('ProjectImage','ArticleImage');

  static $url_segment = 'images';
  static $menu_title = 'Images';

  function init(){parent::init();Requirements::javascript('site/javascript/admin.js');}
}
