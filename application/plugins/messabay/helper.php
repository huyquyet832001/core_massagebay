<?php
function execPostRequest($url, $data)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data))
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
function extraJson($json) {
    json_decode($json);
    if (json_last_error() != JSON_ERROR_NONE) return array();
    return json_decode($json,true);
}
function getJsonConfig($key) {
    $CI = &get_instance();
    $value = $CI->Dindex->getSettings($key);
    json_decode($value);
    if (json_last_error() != JSON_ERROR_NONE) return array();
    return json_decode($value,true);
}
function getValueConfig($key) {
    $CI = &get_instance();
    $value = $CI->Dindex->getSettings($key);
    return $value;
}
function getValueSubOnject($object,$key)
{
    if (is_object($object) && isset($object->$key)) {
        return $object->$key;
    }
    return '';
}
function getMenuByParentAndGroup($parent,$group)
{
    \Container::setData('getAllMenu',function(){
        $CI = &get_instance();
        $results = $CI->Dindex->getDataDetail(
            array(
                'table'=>'menu',
                'where'=>[['key'=>'act','compare'=>'=','value'=>1]]
            )
        );
        return $results;
    });
    $listLevel = \Container::getBy('getAllMenu');
    $ret = [];
    foreach ($listLevel as $item) {
        if($item['parent'] == $parent && $item['group_id'] == $group){
            array_push($ret,$item);
        }
    }
    return $ret;
}
function getTagProByParent($parent)
{
    \Container::setData('getAllTagPro',function(){
        $CI = &get_instance();
        $results = $CI->Dindex->getDataDetail(
            array(
                'table'=>'tag_pro',
            )
        );
        return $results;
    });
    $listLevel = \Container::getBy('getAllTagPro');
    $ret = [];
    foreach ($listLevel as $item) {
        if($item['parent'] == $parent){
            array_push($ret,$item);
        }
    }
    return $ret;
}
function getTplPageURL($fileName) {
    $CI = &get_instance();
    $pages = $CI->Dindex->getDataDetail(array(
        'table'=>'pages',
        'where'=>[
            ['key'=>'act','compare'=>'=','value'=>1],
            ['key'=>'type','compare'=>'=','value'=>$fileName]
        ]
    ));
    if(isset($pages[0])) {
        $url = VthSupport\Classes\UrlHelper::exactLink($pages[0]['slug']);
    }
    return $url;

}
function getProCategoriesByParent($parent)
{
    \Container::setData('getAllProCategories',function(){
        $CI = &get_instance();
        $results = $CI->Dindex->getDataDetail(
            array(
                'table'=>'pro_categories',
            )
        );
        return $results;
    });
    $listLevel = \Container::getBy('getAllProCategories');
    $ret = [];
    foreach ($listLevel as $item) {
        if($item['parent'] == $parent){
            array_push($ret,$item);
        }
    }
    return $ret;
}
function getBookCategoriesByParent($parent)
{
    \Container::setData('getAllBookCategories',function(){
        $CI = &get_instance();
        $results = $CI->Dindex->getDataDetail(
            array(
                'table'=>'book_categories',
            )
        );
        return $results;
    });
    $listLevel = \Container::getBy('getAllBookCategories');
    $ret = [];
    foreach ($listLevel as $item) {
        if($item['parent'] == $parent){
            array_push($ret,$item);
        }
    }
    return $ret;
}
function check(&$var){
    return (is_object($var) && count((array)$var) > 0) || (is_array($var) && count($var) > 0) || (is_string($var) && trim($var) != '' || (is_numeric($var) && $var > 0));
}
function getCapcha()
{
    $CI = &get_instance();
    $capcha = $CI->Dindex->getCaptcha();
    return $capcha;
}
function senMailSp($email,$tieude,$noidung,$email_cc=false,$email_bcc=false){
    tryCatchset();
    $CI = &get_instance();
    $mail = new \PHPMailer\PHPMailer\PHPMailer;
    $mail->CharSet = 'UTF-8';
    $mail->SMTPDebug = 0;     
    $mail->isSMTP();    
    $mail->Host = 'smtp.gmail.com'; 
    $mail->SMTPAuth = true;                              
    $mail->Username = $CI->Dindex->getSettings("MAIL_USER");                 
    $mail->Password = $CI->Dindex->getSettings("MAIL_PASS");                        
    $mail->SMTPSecure = 'tls';                           
    $mail->Port = 587;                                   
    $mail->setFrom($CI->Dindex->getSettings("MAIL_USER"), $CI->Dindex->getSettings("MAIL_NAME"));
    $mail->addAddress($email, $email);    
    $mail->isHTML(true);                                 
    $mail->Subject = $tieude;
    $mail->Body    = $noidung;
    $mail->AltBody = strip_tags($noidung);
    if($email_cc){
        $mail->AddCC($email_cc);
    }
    if($email_bcc){
        $mail->AddBCC($email_bcc);
    }
    if(!$mail->send()) {
        return false;
    } else {
        return true;
    }
}
function getUrlInSegment($segment){
    $CI = &get_instance();
    return $CI->uri->segment($segment,'');
}
function getActiveUrl($url,$segment){
    $ret = '';
    if(is_array($url)){
        if (in_array(getUrlInSegment($segment),$url)) {
            $ret = 'active';
        }
    }else {
        if ($url == getUrlInSegment($segment)) {
            $ret = 'active';
        }
    }
    return $ret;
}
function getNextPost($table,$dataitem){
  $CI = &get_instance();
  $id = (int)$dataitem['id'];
  if($id == 0) return [];
  $sql = sprintf("SELECT * FROM %s WHERE id = (select max(id) from %s where id < %s ) LIMIT 1",$table,$table,$id);
  $data = $CI->db->query($sql)->result_array();
  return $data;
}
function getPrevPost($table,$dataitem){
  $CI = &get_instance();
  $id = (int)$dataitem['id'];
  if($id == 0) return [];
  $sql = sprintf("SELECT * FROM %s WHERE id = (select min(id) from %s where id > %s) LIMIT 1",$table,$table,$id);
  $data = $CI->db->query($sql)->result_array();
  return $data;
}
function printMenuMainCate($data,$activeId = 0,$parent = 0){
    echo '<ul>';
    foreach ($data as $k => $item) {
        $active = $activeId==$item->id?'active':'';
        if($item->parent == $parent){
            $str = '<li class="'.$active.'">
                    <a href="'.$item->slug.'" title="'.$item->name.'">'.$item->name.'</a>';
            echo $str;
            printMenuMainCate($data,$activeId,$item->id);
            echo '</li>';   
        }
    }
    echo '</ul>';
}