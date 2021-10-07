<?php
define('APPPATH', 'D:\Setup\Xampp\xampp-portable-win32-5.6.3-0-VC11\xampp\htdocs\ci_plugins\application');
define('SYSDIR', 'D:\Setup\Xampp\xampp-portable-win32-5.6.3-0-VC11\xampp\htdocs\ci_plugins\system');
class Test{
public function hashFolder(){
    	$dirs = [APPPATH."/modules",APPPATH."/helpers",APPPATH."/core",APPPATH."/controllers",APPPATH."/hooks",APPPATH."/libraries",APPPATH."/models",APPPATH."/third_party/MX",SYSDIR];
    	$hash = "";
    	foreach ($dirs as $k => $dir) {
    		$di = new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS);
			$ri = new RecursiveIteratorIterator($di, RecursiveIteratorIterator::CHILD_FIRST);
			foreach ( $ri as $file ) {
				if($file->isFile()){
					$hash .= file_get_contents($file->getPathname());
				}
			}
    	}
		$hash =  preg_replace('/\v(?:[\v\h]+)/', '', $hash);
		$hash =  preg_replace('/\n/', '', $hash);
		$hash = md5($hash);
		return $hash;
	}
	}
$test = new \Test;

	var_dump($test->hashFolder());
