<?php
class Amp extends IPlugin{
	public $hasAdmin =true;
	protected $config;
	public function __construct(){
		parent::__construct();
		
		$this->config= $this->getConfigPlugins();
		$finalConfig = [];
		foreach ($this->config as $k => $cf) {
			if($cf['value']==1){
				array_push($finalConfig, $k);
			}
		}
		$this->config= $finalConfig;
	}
	public function install(){
		$this->installSetting();
	}
	public function uninstall(){
		$this->uninstallSetting();
	}
	private function installSetting(){
		$this->CI->db->insert("nuy_detail_region",["id"=>500,"name"=>"Cấu hình Struct","name_en"=>"Struct Config"]);
		$this->CI->db->insert("configs",["keyword"=>"STRUCT_ORG","act"=>1,"type"=>"TEXT","region"=>500,"note"=>"Tên tổ chức","ord"=>1,"is_delete"=>1]);
		$this->CI->db->insert("configs",["keyword"=>"STRUCT_IN_HEAD","act"=>1,"type"=>"TEXTAREA","region"=>500,"note"=>"Chèn mã trong thẻ Head AMP","ord"=>2,"is_delete"=>1]);
		$this->CI->db->insert("configs",["keyword"=>"STRUCT_IN_BODY","act"=>1,"type"=>"TEXTAREA","region"=>500,"note"=>"Chèn mã trong thẻ Body AMP","ord"=>3,"is_delete"=>1]);
	}
	private function uninstallSetting(){
		$this->CI->db->delete("nuy_detail_region",["id"=>500]);
		$this->CI->db->delete("configs",["keyword"=>"STRUCT_ORG"]);
		$this->CI->db->delete("configs",["keyword"=>"STRUCT_IN_HEAD"]);
		$this->CI->db->delete("configs",["keyword"=>"STRUCT_IN_BODY"]);
	}
	private function _getAmpLink(){
		return rtrim(current_url(),"/")."/amp";
	}
	public function addAmp($args){
		$dataitem = $args["dataitem"];
		$datatable = $args["datatable"];
		if( is_array($datatable) &&  in_array($datatable['name'], $this->config)){
			return sprintf('<link rel="amphtml" href="%s">',$this->_getAmpLink());
		}
		return true;
	}
	public function init($args){
		$tag = $args["tag"];
		$params = $args["params"];
		if(count($params)>0){
			$seg1 = $this->CI->uri->segment(1,"");
			if($seg1=="index" && $params[0]=="amp"){
				$this->ampIndex();
				die;
			}
			else{
				$lastParam = end($params);
				if(is_string($lastParam) && $lastParam=="amp"){
					include_once "helper.php";
					$param = array_pop($params);
					$pp = is_numeric($param)?$param:false;
					$this->baseViewAmp($tag,$pp);
					die;
				}
			}
			
		}
		return true;
	}
	private function ampIndex(){
		$view = "index_amp";
		if($this->CI->blade->view()->exists($view)){
			echo $this->CI->blade->view()->make($view)->render(null,false);
		}
		else{
			
			$view = "amp::index";
			if($this->CI->blade->view()->exists($view)){
				echo $this->CI->blade->view()->make($view)->render(null,false);
            }
            else{
            	$this->CI->catch404(true);
            }
		}
	}
	private function baseViewAmp($tag,$pp){
		if(strrpos($tag, "/")==strlen($tag)){
			$tag = substr($tag, 0,strlen($tag)-1);
		}
		$arrRoutes= $this->CI->Dindex->getData('nuy_routes',array('link'=>$tag),0,1);
		if(sizeof($arrRoutes)>0 && @$arrRoutes[0]['controller'] && $arrRoutes[0]['is_static'] !=1){
			$itemRoutes = $arrRoutes[0];
			$arrData= $this->CI->Dindex->getData($itemRoutes['table'],array('id'=>$itemRoutes['tag_id']),0,1);
			$arrTable = $this->CI->Dindex->getData('nuy_table',array('map_table'=>$itemRoutes['table']),0,1);
			if(sizeof($arrTable)<=0) return;
			if(sizeof($arrData)>0){
				$dataitem = $arrData[0];
				$itemTable = $arrTable[0];
				if(array_key_exists('count', $dataitem)){
					$this->CI->Dindex->updateData($itemRoutes['table'],array('count'=>'count+1'),array('id'=>$dataitem['id']));
				}
				$data['dataitem']=$dataitem;
				$data['masteritem'] =$itemRoutes;
				$data['datatable']=$itemTable;
				if(@$itemTable['pagination'] && $itemTable['pagination']==1){
					if(strpos($itemRoutes["table"], "tag")===0){
						$parent = $itemRoutes["table"];
					}
					else{
						$parent ="parent";
					}
					$config['base_url']=base_url('').$tag;
					$config['per_page']=$itemTable['rpp_view'];
					$tableget = array_key_exists('table_child', $itemTable)?$itemTable['table_child']:$itemRoutes['table'];
					$config['total_rows']=$this->CI->Dindex->getNumDataDetail($tableget,array(
						array('key'=>'FIND_IN_SET("'.$dataitem['id'].'",'.$parent.')','compare'=>'>','value'=>'0'),
						array('key'=>'act','compare'=>'=','value'=>'1')
						));
					if(!@$pp) $pp=0;
					$pp= @$pp?$pp:0;
					$limit = $pp.",".$config['per_page'];
					$data['list_data'] = $this->CI->Dindex->getDataDetail(array(
						'table'=>$tableget,
						'where'=>array(
								array('key'=>'FIND_IN_SET(\''.$dataitem['id'].'\','.$parent.')','compare'=>'>','value'=>'0'),
								array('key'=>'act','compare'=>'=','value'=>'1')
							),
						'limit'=>$limit,
						'order' =>'ord asc, id desc'
						));
					$config['uri_segment']=2;
					$config['reuse_query_string'] = true;
					$this->pagination->initialize($config);
					if($pp>0){
                        $data['_meta_noindex']='<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
                    }
				}else{
					if($pp!==false){
						$this->CI->catch404(true);
					}
				}
				$original = explode(".",$itemRoutes['controller']);
				$inserted = array( 'amp' );
				array_splice( $original, 1, 0, $inserted );
				$newController = implode(".", $original);
				if($this->CI->blade->view()->exists($newController)){
					echo $this->CI->blade->view()->make($newController,$data)->render(null,false);
				}
				else{
					
					$newController = "amp::".$itemRoutes['controller'];
					if($this->CI->blade->view()->exists($newController)){
						echo $this->CI->blade->view()->make($newController,$data)->render(null,false);
		            }
		            else{
		            	$this->CI->catch404(true);
		            }
				}
			}
		}
		else{
			$this->CI->catch404();	
		}
	}
}