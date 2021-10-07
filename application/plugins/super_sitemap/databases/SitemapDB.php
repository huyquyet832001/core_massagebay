<?php 
namespace SuperSitemap\Databases;
class SitemapDB{
	use \VthSupport\Traits\Singleton;
	protected $CI;
	public function __construct(){
		$this->CI = &get_instance();
	}
	public function updateConfig($config){
		$this->CI->Admindao->updateData(['config'=>$config],'sys_plugins',
			array(
				array('key'=>'name','compare'=>'=','value'=>'\'super_sitemap\'')
			)
		);
	}
	public function getAllTables($names){
		if(count($names)==0) return [];
		$this->CI->db->select('name,note');
		$this->CI->db->where_in('name',$names);
		$q = $this->CI->db->get('nuy_table');
		$results = $q->result_array();
		return $results;
	}
	public function getAllStaticLinks(){
		$this->CI->db->select('id,link');
		$this->CI->db->where('is_static',1);
        $staticLinks = $this->CI->db->get('nuy_routes')->result_array();
        array_push($staticLinks,['id'=>0,'link'=>'/']);
        return $staticLinks;
	}
	public function getAllTableHasLinks(){
		$this->CI->db->where('name','link');
        $tableLinks = $this->CI->db->get('nuy_detail_table')->result_array();
        return $tableLinks;
	}
	public function getFullLinkStaticByTables($slug,$table){
		$this->CI->db->select("update_time, concat('".$slug."/',link) slug");
		$this->CI->db->where('act',1);
		$q = $this->CI->db->get($table);
		return $q->result_array();
	}
	public function getMonthYearByTable($table){
		$sql = "select MONTH(FROM_UNIXTIME(create_time)) month,YEAR(FROM_UNIXTIME(create_time)) year from $table where act = 1 GROUP BY month,year";
		$q = $this->CI->db->query($sql);
		return $q->result_array();
	}
	public function getRecordsByMonthYear($table,$month,$year){
		$sql = 'select slug,update_time,create_time from %s where act = 1 and MONTH(FROM_UNIXTIME(create_time)) = ? and YEAR(FROM_UNIXTIME(create_time)) = ?';
		$month=(int)$month;
		$year=(int)$year;
		$sql = sprintf($sql,$table);
		return $this->CI->db->query($sql,[$month,$year])->result_array();
	}
	public function getDataByActId($table,$id){
		$this->CI->db->where('id',$id);
		$this->CI->db->where('act',1);
		return $this->CI->db->get($table)->result_array();
	}
	public function getDataById($table,$id){
		$this->CI->db->where('id',$id);
		return $this->CI->db->get($table)->result_array();
	}
	public function getNumRowBySlug($table){
		$this->CI->db->where('link',$table);
		$this->CI->db->where('name','slug');
		return $this->CI->db->get('nuy_detail_table')->num_rows();
	}
}