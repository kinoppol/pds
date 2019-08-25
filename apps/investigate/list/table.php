<?php
load_fun('table');
load_fun('datatable');

$investigate_data=sSelectTb($systemDb,"investigate",'id,complaint_id,investigate_code,subject,investigate_type,investigator,result,appeal,undecided_case_code,decided_case_code');
//print_r($complaint_data);

$arr_investigate_type=array('ไม่มีมูล'=>'unfounded','มีมูล ผิดวินัยไม่ร้ายแรง'=>'light_punishment','มีมูล ผิดวินัยร้ายแรง'=>'punishment',);
// $arr_appeal=array('อุทธรณ์'=>'Y','ไม่อุทธรณ์'=>'N');
// function print_case_code($red,$black)
// {
//     $ret="";
//     if(trim($red)!="")
//         $ret.="แดง ".$red."<br>";
//     if(trim($black)!="")
//         $ret.="ดำ ".$black."";
//     return $ret;
// }
$i=-1;
foreach($investigate_data as $row){
    $i++;
    $data_edit=array(
        'id'=>'edit_investigate',
        'src'=>site_url('ajax/investigate/edit/form/id/'.$row['id']),
        'onlyClickClose'=>true,    
    );
    $data_delete=array(
        'id'=>'delete_investigate',
        'src'=>site_url('ajax/investigate/delete/form/id/'.$row['id']),
        'onlyClickClose'=>false,    
    );
    $table_data[]=array(
        // 'complaint_id'=>$row['complaint_id'],
        'investigate_code'=>$row['investigate_code'],
        'subject'=>$row['subject'],
        'investigator'=>$row['investigator'],
        'investigate_type'=>array_search($row['investigate_type'],$arr_investigate_type),
        // 'appeal'=>array_search($row['appeal'],$arr_appeal),
        // 'case_code'=>print_case_code($row['undecided_case_code'],$row['decided_case_code']),
        'edit_button'=>'<a '.gen_modal_link($data_edit).' class="btn btn-primary" ><i class="fa fa-edit"></i> แก้ไข</a>',
        'delete_button'=>'<a '.gen_modal_link($data_delete).' class="btn btn-danger" ><i class="fa fa-exchange"></i> มอบหมาย</a>',
    );
    
}
$data=array("head"=>array(
    'เลขสั่งการสอบสวน',
    'เรื่องสอบสวน',
    'ผู้ถูกสอบสวน',
    'ประเภทความผิด',
    'ลงรับเรื่อง',
    'มอบหมาย'
    ),
    'id'=>'investigate_table_source',
    'item'=>$table_data,
    'pagelength'=>10,
    'order'=>'[[ 0, "asc" ]]'
    );
    print datatable($data);