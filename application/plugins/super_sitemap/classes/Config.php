<?php 
namespace SuperSitemap\Classes;
class Config implements \JsonSerializable{
	const DEFAULT_FREQ = 0.8;
	const DEFAULT_PIORITY = 'weekly';
	private $data = [];
	private $tables;
	private $staticLinks;

	public function __construct($jsonString){
		if(is_string($jsonString)){
			$data = json_decode($jsonString,true);
			$jsonString = isset($data)?$data:[];
		}
		$this->data = $jsonString;
	}
	public function jsonSerialize() {
        return $this->data;
    }
	public function getTables(){
		if(!isset($this->tables)){
			$this->tables = [];
			foreach ($this->data as $key => $item) {
				if($key=='static') continue;
				if($item['value']==1){
					array_push($this->tables, $key);
				}
			}
		}
		return $this->tables;
	}
	public function getStaticLinks(){
		if(!isset($this->staticLinks)){
			$this->staticLinks =[];
			if(array_key_exists('static', $this->data)){
				$this->staticLinks = $this->data['static'];
			}
		}
		return $this->staticLinks;
	}
	public function hasLinkStatic($link){
		return array_key_exists($link, $this->getStaticLinks());
	}
	public function getTableMapStaticLink($link){
		if($this->hasLinkStatic($link)){
			$results = $this->getStaticLinks()[$link];
			return array_key_exists('map', $results)?$results['map']:'';
		}
		return '';
	}
	public function getTableItemField($field,$subField,$default=''){
		return array_key_exists($subField, $this->data[$field])?$this->data[$field][$subField]:$default;
	}
	public function getTableItemPiority($field,$default = '0.6'){
		return $this->getTableItemField($field,'piority',$default);
	}
	public function getTableItemFreq($field,$default = 'always'){
		return $this->getTableItemField($field,'freq',$default);
	}
	public function getStaticItemField($link,$subField){
		if($this->hasLinkStatic($link)){
			$results = $this->getStaticLinks()[$link];
			return array_key_exists($subField, $results)?$results[$subField]:static::DEFAULT_FREQ;
		}
		return static::DEFAULT_FREQ;
	}
	public function getStaticConfig($link){
		return $config = [
				'piority'=> $this->getStaticItemField($link,'piority'),
				'freq'=> $this->getStaticItemField($link,'freq')
			];
	}
	public function getTableConfig($table){
		return array_key_exists($table, $this->data)?$this->data[$table]:['piority'=>static::DEFAULT_FREQ,'freq'=>'weekly'];
	}
}