<?php
namespace App\Common;


class CommonFunction{
    
    function doGet($url)
    {
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }
    
    
    /**
     * @param string $url
     * @param array $post_data
     * @param array | boolean $header
     * @return mixed
     */
    
    function doPost($url,$post_data)
    {
        //   $headers = ["Content-Type:application/json;charset=utf-8","Accept: application/json","Cache-Control: no-cache","Pragma: no-cache"];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        //  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $output = curl_exec($ch);
        
        curl_close($ch);
        return $output;
    }
    /**
     * create GUID
     * @return string
     */
    function make_guid()
    {
        mt_srand((double)microtime() * 10000);
        return md5(uniqid(rand(), true));
    }
    
    
    
    function encrypt_password($password, $salt = 'abcdef')
    {
        return md5(md5(md5(trim($password))) . $salt);
    }
    
    function  center_membersalt($password,$salt)
    {
        return md5(md5($password).$salt);
        
    }
    
    public static function settoken()
    {
        $str = md5(uniqid(md5(microtime(true)),true));
        $str = sha1($str);  //加密
        return $str;
    }
    
    //menu
    
    public function index_menu()
    {
        
        $menu  =
        [
            
            
        ];
    }
    /**
     *  video_type
     */
    public function void_type(){
        return ['1' => '技术研发','2' => ' 生产工艺','3' => '铸造技术','4' => '材料科学','5' => '阀门生产','6' => '应用工况','7' => '管理课程','8' => '资质认证','9' => '检验检测', '10' => '其他视频','11' => '闸阀','12' => ' 截止阀','13' => '止回阀','14' => '球阀','15' => '蝶阀','16' => '其他阀门'];
        
    }
    public function animation_type()
    {
        return ['1' => '闸阀','2' => ' 截止阀','3' => '止回阀','4' => '球阀','5' => '蝶阀','6' => '其他阀门'];
        
        
    }
    /**
     *  video_type
     */
    public function cartoon_type(){
        return [];
        
    }
    /**
     * is_share
     */
    public function is_share(){
        return ['1' => '共享','2' => '不共享'];
    }
    /**
     * audit
     */
    public function audit(){
        return ['1' => '已通过','2' => '待审核','3' => '未通过'];
    }
    /**
     * format
     */
    public function format(){
        return ['1' => 'jpg','2' => 'bmp','3' => 'png','4' => 'gif','5' =>'tif','6' => 'eps','7' => 'cdr','8' => 'ai',
            '9' => 'psd','10' => 'mp4','11' => 'avi','12' => 'wmv','13' => 'mov','14' => 'max','15' => 'pdf',
            '16' => 'ppt','17' => 'pptx',
            '18' => 'doc','19' => 'docx','20' => 'xls','21' => 'xlsx','22' => 'txt','23' => 'wps','24' => '其他','25' => 'cad','26' => 'solidworks','27' => 'proe','28' => 'ug','29' => '其他'];
    }
    
    
    
    public function price_format(){
        return ['1' => 'jpg','2' => 'bmp','3' => 'png','4' => 'gif','5' => 'tif',
            '6' => 'eps','7' => 'cdr','8' => 'ai','9' => 'psd','10' => 'mp4','11' => 'avi','12' => 'wmv','13' => 'mov','14' => 'max'];
    }
    
    public function document_format()
    {
        return ['15' => 'pdf','16' => 'ppt','17' => 'pptx','18' => 'doc','19' => 'docx','20' => 'xls','21' => 'xlsx','22' =>'txt','23' => 'wps','24' => '其他'];
        
    }
    
    public  function drawing_format()
    {
        
        return ['25' => 'cad','26' => 'solidworks','27' => 'proe','28' => 'ug','29' => '其他'];
        
    }
    /**
     *  education_type
     */
    public function education_type(){
        return ['1' => '初中','2' => '高中','3' => '大专','4' => '本科','5' => '硕士','6' => '博士'];
        
    }
    /**
     * news_type
     */
    public function news_type(){
        return ['1' => '普通','2' => '要闻','3' => '专题'];
        
    }
    
    //job_experience
    public function job_experience()
    {
        return ['1' => '1年以下','2' => '1-3年','3' => '3-5年','4' => '5-8年','5' => '8-10年','6' => '10-15年','7' => '15年以上'];
    }
    public function scale()
    {
        return ['1' => '20人以下','2' => '20-50人','3' => '50-100人','4' => '100-1000人','5' => '1000人以上'];
    }
    public function nature()
    {
        return ['1' => '民营企业','2' => '国有企业','3' => '中外合资','4' => '外商独资'];
    }
    /**
     * is_income 是否收入
     */
    public function is_income(){
        return ['0' => '支出','1' => '收入'];
    }
    public function monthly_salary()
    {
        return ['1' => '1K-3K','2' => '3K-5K','3' => '5K-10K','4' => '10K-15K','5' => '15K以上'];
    }
    public function file_type()
    {
        return ['1' => '图片照片','2' => '动画视频','3' => '广告设计','4' => '产品模型','5' => '其他文档','7' => '行业标准',
            '8' => '技术论文','9' => '管理文档','10' => '技术文档','11' => '图书软件','12' => '其他资料','13' => '闸阀','14' => '截止阀','15' => '止回阀','16' => '球阀','17' => '蝶阀','18' => '安全阀','19' => '旋塞阀','20' => '调节阀',
            '21' => '疏水阀','22' => '减压阀','23' => '仪表阀','24' => '6A类阀','25' => '水力阀','26' => '其他阀','27' => '泵','28' => '压缩机',
            '29' => '风机','30' => '空分','31' => '减速机','32' => '其他'];
    }
    public function price_file()
    {
        
        return ['1' => '图片照片','2' => '动画视频','3' => '广告设计','4' => '产品模型','5' => '其他文档'];
    }
    public function document_file()
    {
        
        return ['7' => '行业标准','8' => '技术论文','9' => '管理文档','10' => '技术文档','11' => '图书软件','12' => '其他资料'];
    }
    public function design_drawing()
    {
        
        return ['13' => '闸阀','14' => '截止阀','15' => '止回阀','16' => '球阀','17' => '蝶阀','18' => '安全阀','19' => '旋塞阀','20' => '调节阀',
            '21' => '疏水阀','22' => '减压阀','23' => '仪表阀','24' => '6A类阀','25' => '水力阀','26' => '其他阀','27' => '泵','28' => '压缩机',
            '29' => '风机','30' => '空分','31' => '减速机','32' => '其他'
        ];
    }
    public function crd_storage_type()
    {
        return ['2' => '文档文件','3' => '设计图纸','1' => '广告素材'];
    }
    /**
     * position_type
     * @param
     * @param
     * @param
     * @return array|NULL[]
     */
    public function position_type(){
        return ['1' => '管理','2' => '工程师','3' => '技术员','4' => '市场/营销'];
    }
    public function deldir($dir) {
        //先删除目录下的文件：
        $dh = opendir($dir);
        while ($file = readdir($dh)) {
            if($file != "." && $file!="..") {
                $fullpath = $dir."/".$file;
                if(!is_dir($fullpath)) {
                    unlink($fullpath);
                } else {
                    deldir($fullpath);
                }
            }
        }
        closedir($dh);
        
        //删除当前文件夹：
        if(rmdir($dir)) {
            return true;
        } else {
            return false;
        }
    }
    function unique_rand($min, $max, $num) {
        
        $count = 0;
        
        $return = array();
        while ($count < $num) {
            $return[] = mt_rand($min, $max);
            $return = array_flip(array_flip($return));
            $count = count($return);
        }
        shuffle($return);
        return $return;
    }
    //费率计算
    public  function money($total, $fee)
    {
        return number_format($total - $total * $fee/100, 2, '.', ',');
    }
    
    public function getsize($size, $format) {
        $p = 0;
        if ($format == 'kb') {
            $p = 1;
        } elseif ($format == 'mb') {
            $p = 2;
        } elseif ($format == 'gb') {
            $p = 3;
        }
        $size /= pow(1024, $p);
        return number_format($size, 3);
    }
    
    
    function get_total_millisecond()
    {
        $time = explode (" ", microtime () );
        $time = $time [1] . ($time [0] * 1000);
        $time2 = explode ( ".", $time );
        $time = $time2 [0];
        return $time;
    }
    
}



