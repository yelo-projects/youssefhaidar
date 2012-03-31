<?php
class PersonalLinksAdmin extends ModelAdmin {


  public static $managed_models = array('PersonalLink');

  static $url_segment = 'links';
  static $menu_title = 'Links';

  function init(){parent::init();Requirements::javascript('site/javascript/admin.js');}
}
