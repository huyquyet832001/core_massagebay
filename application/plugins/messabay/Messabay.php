<?php

use Messabay\Models\News;
use Messabay\constants\Url;
use \VthSupport\Classes\UploadHelper;
use \VthSupport\Traits\TraitPlugin;
use \VthSupport\Classes\UrlHelper;
use VthSupport\Classes\LangHelper as LH;
use \VthSupport\Classes\ViewHelper as View;
use \VthSupport\Classes\RequestHelper as Request;
use \VthSupport\Classes\ResponseHelper as Res;

class Messabay extends IPlugin
{
    use TraitPlugin {
        initVindex as traitInitVindex;
    }
    protected $routes = [];
    public function __construct()
    {
        parent::__construct();
        $this->routes = Url::getRoutes();
    }
    public function initVindex()
    {
        $this->traitInitVindex();
        require_once 'helper.php';
        return true;
    }
    public function initTechsystem()
    {
        require_once 'helper.php';
        return true;
    }
    public function contact($itemRoutes)
    {
        $get = $this->CI->input->get('id');
    }
    public function search($itemRoutes)
    {
        if (Request::isGet()) {
            $keyword = $this->CI->input->get('keyword');
            $where = [];
            if ($keyword == '') {
                $whereAct = ['act', '=', 1];
                array_push($where, $whereAct);
            }
            $whereLike = ['name', 'like', $keyword];
            array_push($where, $whereLike);
            $all_news = News::paginate($where, $itemRoutes['link'], 2, 2);
            var_dump($all_news);
            $data = [];
            $data['paginate'] = $all_news;
            View::make("search.view", $data);
        }
    }
}
