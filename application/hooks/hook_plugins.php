<?php
class HookPlugin{
	public static $plugins = [];
	public static $groupPlugins = [];

	public function loadPlugins(){
		$MHOOK =& load_class('Hooks', 'core');
		$plugins = self::_loadPlugins();
		foreach ($plugins as $k => $plugin) {
			$directory =PLUGIN_PATH."/".$plugin["name"];
			$config = $directory."/config.json";
			if(!file_exists($config))continue;
			$file = $directory."/hooks/hooks.php";
			if(file_exists($file)){
				include $file;
			}
		}
		$chooks = &$hook;
		$chooks = is_array($chooks)?$chooks:[];
		$tmpHooks = array_merge($MHOOK->hooks,$chooks);
		$MHOOK->hooks =$tmpHooks;
	}
	public static function getHashPlugin($class){
		$host = isset($_SERVER['HTTP_HOST'])?$_SERVER['HTTP_HOST']:'';
		return md5($class.$host.'_tech5s_ci_plugins');
	}
	public static function _loadPlugins(){
		if(count(self::$plugins)==0){
			$CI=& get_instance();
			$CI->db->where("act",1);
			$q =$CI->db->get("sys_plugins");
			self::$plugins = $q->result_array();
			foreach (self::$plugins as $key => $plugin) {
				if($plugin['hash'] ===self::getHashPlugin($plugin['name'])){
					self::$groupPlugins[$plugin['name']] = $plugin;
				}else{
					unset(self::$plugins[$key]);
				}
			}
		}
		return self::$plugins;
	}
	public function loadInjectVindex(){
		$MHOOK =& load_class('Hooks', 'core');
		$CI = &get_instance();
		if($CI instanceof Vindex){
			$MHOOK->call_hook('tech5s_vindex_init');
		}
		if($CI instanceof Techsystem){
			$MHOOK->call_hook('tech5s_techsystem_init');
		}
	}
	public static function getConfig($name){
		if(array_key_exists($name, self::$groupPlugins)){
			$plugin = self::$groupPlugins[$name];
			$config = array_key_exists('config', $plugin)?$plugin['config']:"";
			$config = json_decode($config,true);
			$config = @$config?$config:[];
			return $config;
		}
		return [];
	}
}