<?php 
use VthSupport\Classes\FileHelper;
use VthSupport\Classes\RequestHelper as Request;
use SuperSitemap\Factories\SitemapDB as DB;
use SuperSitemap\Classes\Config;
use SuperSitemap\Classes\Sitemap;
use VthSupport\Classes\ViewHelper as View;
use SuperSitemap\Helpers\FileHelper as File;
class SuperSitemap extends IPlugin{
	public $hasAdmin = true;
	protected $link;
	protected $config;
	protected $sitemap;
	protected $sitemapDb;
	function __construct()
	{
		parent::__construct();
		$this->link = 'Techsystem/extra?action='.base64_encode("table=news&action=view&code=super_sitemap");
		$this->config= new Config($this->getConfigPlugins()) ;
		$this->sitemap= new Sitemap($this->config) ;
	}
	public function install(){
	}
	public function uninstall(){
	}
	public function disableOldSitemap(){
		redirect($this->link);
		die("Sitemap mới đã cập nhật");
	}
	public function managerSitemap($args){
		$table = $args["table"];
		$action = $args["act"];
		$code = $args["code"];
		if($code==="super_sitemap"){
			$this->_managerSitemap();
		}
		return true;

	}
	private function _managerSitemap(){
		if(Request::isPost()){
			$config = Request::postString('config','[]');
			DB::updateConfig($config);
			File::clearCache();
			$this->config= new Config($config);
			$this->sitemap= new sitemap($this->config);
			$this->sitemap->create();
		}
		$tableNames = $this->config->getTables();
		$tables = DB::getAllTables($tableNames);
		$data['content'] = 'super_sitemap.manager';
		$data['tables'] = $tables;
		$data['staticLinks'] = DB::getAllStaticLinks();
		$data['tableLinks'] = DB::getAllTableHasLinks();
		$data['config'] = $this->config;
		$this->CI->load->view('template',$data);
	}
	public function disableCreateSitemap(){
		return ['continue'=>false];
	}
	private function updateSitemapByResult($results,$table){
		if(count($results)==0) return true;
		$create_time = $results[0]['create_time'];
		$year = date('Y',$create_time);
		$month = date('m',$create_time);
		$this->sitemap->updateSitemapFile($table,$month,$year);
	}
	
	public function updateAfterUpdate($args){
		$table = $args['table'];
		$dataUpload = $args['dataUpload'];
		$arrWhere = $args['arrWhere'];
		if(isset($dataUpload['slug'])){
			$id = $arrWhere[0]['value'];
			$results = DB::getDataByActId($table,$id);
			$this->updateSitemapByResult($results,$table);
		}
		return true;
	}
	public function updateAfterQuickUpdate($args){
		$table = $args['table'];
		$datawhere = $args['datawhere'];
		$data = $args['data'];
		if(isset($data['act'])){
			$id = $datawhere[0]['id'];
			$results = DB::getDataById($table,$id);
			$this->updateSitemapByResult($results,$table);
		}
		
		return true;
	}
	public function updateAfterInsert($args){
		$table = $args['table'];
		$lastId = $args['lastId'];
		$dataUpload = $args['dataUpload'];
		if(isset($dataUpload['slug'])){
			$results = DB::getDataByActId($table,$lastId);
			$this->updateSitemapByResult($results,$table);
		}
		return true;
	}
	public function updateAfterDelete($args){
		$table = $args['table'];
		$cslug = DB::getNumRowBySlug($table);
		if($cslug>0){
			$this->sitemap->createSitemapTable($table,[]);
		}
		return true;
	}
}