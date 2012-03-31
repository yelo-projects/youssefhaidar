<?php
class ArticleImage extends ExtendedImage{
	
	static $has_one = array('Article'=>'Article');
        
	static $summary_fields = array(
		'Name',
		'Title',
		'ArticleName'
	);
        
	static $searchable_fields = array(
		'Name',
		'Title'
	);
	
	public function getArticleName(){
		if($this->Article()){
			return $this->Article()->Title;
		}
		return null;
	}
}
