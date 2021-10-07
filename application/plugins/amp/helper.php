<?php
function ampOriginUrl(){
    $CI = &get_instance();
    $tmps = $CI->uri->segments;
    array_pop($tmps);
    $url = implode("/", $tmps);
    return base_url($url);
}
function ampHeader($dataitem){
    $CI = &get_instance();
    $tmp = $CI->Dindex->getSettings('TITLE_SEO');
    $titleSEO = getFieldSeoByLang("s_title",$dataitem,$tmp);
    $tmp = $CI->Dindex->getSettings('DES_SEO');
    $desSEO = getFieldSeoByLang("s_des",$dataitem,$tmp);
    $tmp = $CI->Dindex->getSettings('KEY_SEO');
    $keySEO = getFieldSeoByLang("s_key",$dataitem,$tmp);
    $tmp = $CI->Dindex->getSettings('STRUCT_ORG');
    $author = getFieldSeoByLang("s_key",$dataitem,$tmp);
    $ret = "";
    $ret .= '<title>'.addslashes($titleSEO).'</title>';
    $ret .= '<meta name="title" content="'.addslashes($titleSEO).'">';
    $ret .= '<meta name="description" content="'.addslashes($desSEO).'">';
    $ret .= '<meta name="keywords" content="'.addslashes($keySEO).'">';
    $ret .='<meta name="author" content="'.addslashes($author).'">';
    return $ret;
}
function ampImgConfig($key,$webp=0,$size=-1,$onlySrc = false){
    $CI = &get_instance();
    $image = $CI->Dindex->getSettingImage($key,$webp,$size);
    $src = str_replace(base_url(), '', $image);
    list($width, $height) = getCmsImageSize($src);
    $title = $CI->Dindex->getSettingImage($key."#title");
    $alt = $CI->Dindex->getSettingImage($key."#alt");
    if($onlySrc) return $image;
    return '<amp-img src="'.$image.'" title="'.$title.'" title="'.$alt.'" layout="responsive" width="'.$width.'" height="'.$height.'" ></amp-img>';
}
function ampShortContent($dataitem){
    $short = @$dataitem["short_content"]?$dataitem["short_content"]:"";
    if(strlen($short)==0){
        $short = substr(strip_tags($dataitem["content"]), 0,155);
    }
    return $short;
}
function ampContent($content){
    include_once APPPATH."libraries/Simple_html_dom.php";
     $doc = str_get_html($content);
    $imgs = $doc->find("img");
    $images = [];
    if($imgs!=null){
        foreach($imgs as $img){
            $width = (int)$img->getAttribute('width');
            $height = (int)$img->getAttribute('height');
            $src = $img->getAttribute('src');
            if(strpos($src, 'http')!==0){
                $src = base_url($src);
                if($width == 0 || $height ==0){
                    list($width, $height) = getCmsImageSize($src);
                }
            }
            $width = ($width=="" || $width==0) ? 100:$width;
            $height = ($height=="" || $height==0) ? 67:$height; 
            array_push($images, $src);
            $img->outertext = '<amp-img layout="responsive" width="'.$width.'" height="'.$height.'" src="'.$src.'"></amp-img>';
        }
    }
    $videos = $doc->find("video");
    if($videos!=null){
        foreach($videos as $video){
            $width = $video->getAttribute('width');
            $width = ($width=="" || $width==0) ? 100:$width;
            $height = $video->getAttribute('height');
            $height = ($height=="" || $height==0) ? 67:$height;
            
            $video->outertext = '<amp-video layout="responsive" width="'.$width.'" height="'.$height.'">'.$video->innertext.'</amp-video>';
        }
    }
    $iframes = $doc->find("iframe");
    if($iframes!=null){
        foreach($iframes as $iframe){
            $width = $iframe->getAttribute('width');
            $width = ($width=="" || $width==0) ? 100:$width;
            $height = $iframe->getAttribute('height');
            $height = ($height=="" || $height==0) ? 67:$height;
            $src = $iframe->getAttribute('src');
            if(strpos($src, '//')===0){
                $src = 'https:'.$src;
            }
            if(strpos($src, 'http')!==0){
                $src = base_url($src);
            }   
 $iframe->outertext = '<amp-iframe   sandbox="allow-scripts allow-same-origin allow-presentation" layout="responsive" width="'.$width.'" height="'.$height.'" src="'.$src.'"></amp-iframe>';
        }
    }
    $ps = $doc->find("p");
    if($ps!=null){
        foreach ($ps as $k => $p) {
            $p->outertext = "<p>".$p->innertext."</p>";
        }
    }
    if(count($images)==0){
        array_push($images, ampImgConfig('logo',1,-1,true));
    }
    return ["content"=>$doc->innertext,"images"=>$images];
}