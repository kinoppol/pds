<?php
$fm_th=array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
// $sm_th=array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
$fd_th=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");
$sd_th=array("","อา.","จ.","อ.","พ.","พฤ.","ศ.","ส.");
$fulltime=array('00','01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23');
$fm_en =array("","January","February","March","April","May","June","July","August","September","October","November","December");
$sm_en=array("","Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
	
$fd_en=array("","Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
$sd_en=array("","Su","Mo","Tu","We","Th","Fr","Sa");
function datethaishort($data)
{
    // global $sm_th;
    $sm_th=array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
	$data=trim($data);
	$y=substr($data,0,4)+543;
	$m=(int)substr($data,5,2);
	$d=(int)substr($data,8,2);
	$data="$d ".$sm_th[$m]." $y";
	return $data;
}
function datethaifull($data)
{
	global $fm_th;
	$data=trim($data);
	$y=substr($data,0,4)+543;
	$m=substr($data,5,2);
	$d=substr($data,8,2);
	if($m<10)
		$m=$m%10;
	if($d<10)
		$d=$d%10;
	$data="วันที่ $d เดือน ".$fm_th[$m]." พ.ศ. $y";
	return $data;
}
    function chk_step($investigate_id,$step_id){
        global $systemDb;
        $chk_step=sSelectTb($systemDb,'investigate_timeline','count(*) as c','investigate_id='.sQ($investigate_id).' AND step_id ='.sQ($step_id));
        $chk_step=$chk_step[0];
        if($chk_step['c']==1){
            return true;
        }else{
            return false;
        }

    }

    function gen_progress_btn($data,$investigate_id){
        $ret='';
            foreach($data as $row){
                $data_progress=array(
                    'id'=>'detail_investigate',
                    'src'=>site_url('ajax/investigate/progress/detail/id/'.$investigate_id.'/step_id/'.$row['id']),
                    'onlyClickClose'=>true,    
                );
                $ret.= '<a '.gen_modal_link($data_progress).' class="btn '.$row['color'].' btn-lg btn-block" ><i class="'.$row['bullet'].'"></i> '.$row['title'].'</a>';
            }
            return $ret;
        }
?>