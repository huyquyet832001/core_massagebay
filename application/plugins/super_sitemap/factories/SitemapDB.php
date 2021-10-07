<?php 
namespace SuperSitemap\Factories;
class SitemapDB{
	use \VthSupport\Traits\Factory;
	public static function target(){
		return "\SuperSitemap\Databases\SitemapDB";
	}
}