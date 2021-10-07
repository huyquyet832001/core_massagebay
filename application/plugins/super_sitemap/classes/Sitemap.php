<?php 
namespace SuperSitemap\Classes;
use SuperSitemap\Factories\SitemapDB as DB;
use VthSupport\Classes\ViewHelper as View;
use SuperSitemap\Helpers\FileHelper as File;
class Sitemap{
	protected $config ;
	public function __construct($config){
		$this->config = $config;
	}
	
	private function _createSitemapStatic(){
		$sitemapFiles = [];
		$staticLinks = $this->config->getStaticLinks();
		$static = [];
		foreach ($staticLinks as $key => $item) {
			$configTable = $this->config->getStaticConfig($key);
			if($item['map']==''){
				array_push($static, array_merge(['slug'=>$key,'update_time'=>time()],$configTable));
			}
			else{
				$listItems = DB::getFullLinkStaticByTables($key,$item['map']);
				$fileStaticSitemap = File::createFileStatic2LevelSitemap($key);
				$configTable = $this->config->getStaticConfig($key);
				$content = View::make('super_sitemap::template_sitemap_item',compact('listItems','configTable'),false);
				file_put_contents($fileStaticSitemap, $content);
				array_push($sitemapFiles, $fileStaticSitemap);
			}
		}
		$file = File::createFileStaticSitemap();
		$content = View::make('super_sitemap::template_sitemap_static_item',['listItems'=>$static],false);
		file_put_contents($file, $content);
		array_push($sitemapFiles, $file);
		return $sitemapFiles;
	}
	private function _getGroupDateByTable($table,$group=[]){
		if(count($group)==0){
			return DB::getMonthYearByTable($table);
		}
		return [$group];
	}

	private function _getConfigTable($table,$conf){
		if(count($conf)==0){
			return $this->config->getTableConfig($table);
		}
		return $conf;
	}
	public function createSitemapTable($table,$groupDate=[],$configTable=[]){
		$groupDates = $this->_getGroupDateByTable($table,$groupDate);
		$configTable = $this->_getConfigTable($table,$configTable);
		$files =[];
		foreach ($groupDates as $k => $date) {
			$month = (int)$date['month'];
			$year = (int)$date['year'];
			if($month == 0 || $year == 0) continue;
			$listItems = DB::getRecordsByMonthYear($table,$month,$year);
			$file = File::createFileDynamicSitemap($table,$month,$year);
			$content = View::make('super_sitemap::template_sitemap_item',compact('listItems','configTable'),false);
			file_put_contents($file, $content);
			array_push($files, $file);
		}
		return $files;
		
	}
	public function updateSitemapFile($table,$month,$year){
		$fileSitemap = File::createFileDynamicSitemap($table,$month,$year);
		if(file_exists($fileSitemap)){
			$this->createSitemapTable($table,['year'=>$year,'month'=>$month]);
		}
		else{
			$this->config= new Config(getConfigPlugin('super_sitemap'));
			$this->create();
		}

	}
	private function _createSitemapDynamic($table){
		$listSitemaps =[];
		$dates = DB::getMonthYearByTable($table);
		foreach ($dates as $key => $date) {
			$files = $this->createSitemapTable($table,$date);
			$listSitemaps = array_merge($listSitemaps,$files);
		}
		return $listSitemaps;
	}
	public function create(){
		set_time_limit(0);
		
		$listSitemaps =[];
		$staticFiles = $this->_createSitemapStatic();
		$listSitemaps =array_merge($listSitemaps,$staticFiles);
		foreach ($this->config->getTables() as $ktable => $table) {
			$dynamicFiles = $this->_createSitemapDynamic($table);
			$listSitemaps =array_merge($listSitemaps,$dynamicFiles);
		}	
		$fileSiteMapIndex = "sitemap.xml";
		$content = View::make('super_sitemap::template_sitemap_index',compact('listSitemaps'),false);
		file_put_contents($fileSiteMapIndex, $content);
	}
}