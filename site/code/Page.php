<?php
class Page extends SiteTree {


	public function getIsDev(){
		return Director::isDev();
	}
	
	function Summary($maxWords=30){
		return $this->_summary($this->Content, $maxWords);
	}

	function getSiteState(){
		return SiteConfig::current_site_config()->SiteState;
	}

	protected function _summary($value, $maxWords=50, $append='...', $appendSentence='..', $allowedTags = '<a>'){
		$data = strip_tags($value, $allowedTags);
		if( !$data ){return "";};

		$data = preg_replace('/[\r\n]+/',"\n",$data);

		$words = explode( ' ', $data );
		if(count($words)<=$maxWords){return nl2br($data);}
		$length = 0;
		$result = '';
		while($words && $length<=$maxWords){
			$result.=' '.array_shift($words);
			$length++;
		}
		trim($result);
		if( preg_match( '/<a[^>]*>/', $result ) && !preg_match( '/<\/a>/', $result ) ){$result .= '</a>';}
		$result.=(substr($result, strlen($result), 1)==='.') ? $appendSentence : $append;
		$result = nl2br($result);
		return $result;
	}

	public function getAttTitle(){
		return strtolower(str_replace(array(' ','/'), array('_',''),trim($this->Title)));
	}

	public function getNiceClassName(){
		return str_replace(array('_','Page','Personal','Controller'),'', $this->class);
	}
}
class Page_Controller extends ContentController {

	/**
	 * An array of actions that can be accessed via a request. Each array element should be an action name, and the
	 * permissions or conditions required to allow the user to access it.
	 *
	 * <code>
	 * array (
	 *     'action', // anyone can access this action
	 *     'action' => true, // same as above
	 *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
	 *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
	 * );
	 * </code>
	 *
	 * @var array
	 */
	public static $allowed_actions = array (
	);

	public function init() {
		$jqueryVer = '1.7.2';
		if(Director::isDev()){
			Requirements::javascript('site/javascript/jquery-'.$jqueryVer.'.js');
			Requirements::javascript('site/javascript/jquery.easing.js');
			Requirements::javascript('site/javascript/jquery.tinysort.min.js');
			Requirements::javascript('site/javascript/jquery.mousewheel.js');
			Requirements::javascript('site/javascript/jquery.scrollTo-1.4.2-min.js');
			Requirements::javascript('site/javascript/jquery.localscroll-1.2.7-min.js');
			Requirements::javascript('site/javascript/jquery.jscrollpane.min.js');
			Requirements::javascript('site/javascript/main.js');
		}else{
			Requirements::javascript('//ajax.googleapis.com/ajax/libs/jquery/'+$jqueryVer+'/jquery.min.js');
			Requirements::javascript('site/javascript/js.js');
		}
		parent::init();
	}

	function themedCSS($name){
		
	}
}
