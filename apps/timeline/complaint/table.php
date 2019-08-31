<?php

load_fun('table');
load_fun('datatable');

$complaint_data=sSelectTb($systemDb,"complaint",'*');
//print_r($complaint_data);

$i=-1;
foreach($complaint_data as $row){
    $i++;
    $data_progress=array(
        'id'=>'progress_idiom',
        'src'=>site_url('ajax/idiom/progress/form/id/'.$row['id']),
        'onlyClickClose'=>true,    
    );
    $table_data[]=array(
        'receive_code'=>$row['receive_code'],
        'receive_date'=>$row['receive_date'],
        'subject'=>$row['subject'],
        'source_id'=>$row['source_id'],
        'result'=>$row['result']==''?'
        <span class="badge badge-secondary"><i class="spinner-border spinner-border-sm"></i> กำลังดำเนินการ</span>':'
        <span class="badge badge-success"><i class="fa fa-check"></i> ปิดสำนวน</span>',
        'edit_button'=>'
        <a '.gen_modal_link($data_progress).' class="btn btn-primary" ><i class="fa fa-map-marker"></i> ติดตาม</a>
        ',
    );
    
}
$data=array("head"=>array(
    'เลขรับเรื่อง',
    'วันที่รับเรื่อง',
    'ชื่อเรื่องร้องเรียน',
    'แหล่งที่มา',
    'การดำเนินการ',
    'ติดตาม'
    ),
    'id'=>'complaint',
    'item'=>$table_data,
    'pagelength'=>10,
    'order'=>'[[ 0, "asc" ]]'
    );
    print datatable($data);