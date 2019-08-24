<?php

load_fun('table');
load_fun('datatable');

$complaint_data=sSelectTb($systemDb,"investigate",'complaint_id,subject,investigate_type,result,appeal');
//print_r($complaint_data);

$i=-1;
foreach($complaint_data as $row){
    $i++;
    $data_edit=array(
        'id'=>'edit_investigate',
        'src'=>site_url('ajax/investigate/edit/form/id/'.$row['id']),
        'onlyClickClose'=>true,    
    );
    $data_transfer=array(
        'id'=>'delete_investigate',
        'src'=>site_url('ajax/investigate/transfer/form/id/'.$row['id']),
        'onlyClickClose'=>false,    
    );
    $table_data[]=array(
        'complaint_id'=>$row['complaint_id'],
        'subject'=>$row['subject'],
        'investigate_type'=>$row['investigate_type'],
        'result'=>$row['result'],
        'appeal'=>$row['appeal'],
        'edit_button'=>'
        <a '.gen_modal_link($data_edit).' class="btn btn-primary" ><i class="fa fa-edit"></i> แก้ไข</a>
        ',
        'transfer_button'=>'
        <a '.gen_modal_link($data_transfer).' class="btn btn-warning" ><i class="fa fa-sign-out"></i> โอน</a>
        ',
    );
    
}
$data=array("head"=>array(
    'เลขร้องเรียน',
    'เรื่องสอบสวน',
    'ประเภทการสอบสวน',
    'ผลการสอบสวน',
    'การอุทธรณ์',
    'แก้ไข',
    'โอน'
    ),
    'id'=>'investigate',
    'item'=>$table_data,
    'pagelength'=>10,
    'order'=>'[[ 0, "asc" ]]'
    );
    print datatable($data);