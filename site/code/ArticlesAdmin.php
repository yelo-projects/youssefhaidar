<?php
class ArticlesAdmin extends ModelAdmin {

  public static $managed_models = array('Article','ArticleImage');

  static $url_segment = 'articles';
  static $menu_title = 'Articles';

  function init(){parent::init();Requirements::javascript('site/javascript/admin.js');}
}
