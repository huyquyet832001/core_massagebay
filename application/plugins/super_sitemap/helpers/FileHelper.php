<?php 
namespace SuperSitemap\Helpers;
use VthSupport\Classes\FileHelper as File;
class FileHelper{
	public static function createFileStatic2LevelSitemap($slug){
		$directory = 'sitemaps/static';
		File::mkdir($directory);
		return sprintf('%s/sitemap-%s.xml',$directory,$slug);
	}
	public static function createFileStaticSitemap(){
		$directory = 'sitemaps/static';
		File::mkdir($directory);
		return sprintf('%s/sitemap-static.xml',$directory);
	}
	public static function createFileDynamicSitemap($table,$month,$year){
		$directory = sprintf('sitemaps/%s',$table);
		File::mkdir($directory);
		return sprintf('%s/sitemap-%s-%s.xml',$directory,$year,$month);
	}
	public static function clearCache(){
		$file = APPPATH.'cache/_cache_super_sitemap';
		if(file_exists($file)){
			unlink($file);
		}
	}
}