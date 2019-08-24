<?php

load_fun('table');
load_fun('datatable');

$complaint_data=sSelectTb($systemDb,"complaint",'id,receive_code,complaint_code,subject,source_id','owner_id='.current_user('id'));
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
        'complaint_code'=>$row['complaint_code'],
        'subject'=>$row['subject'],
        'source_id'=>$row['source_id'],
        'edit_button'=>'
        <a '.gen_modal_link($data_progress).' class="btn btn-primary" ><i class="fa fa-edit"></i> ดำเนินการ</a>
        ',
    );
    
}
$data=array("head"=>array(
    'เลขรับเรื่อง',
    'หมายเลขเรื่องร้องเรียน',
    'ชื่อเรื่องร้องเรียน',
    'แหล่งที่มา',
    'ดำเนินการ',
    ),
    'id'=>'complaint',
    'item'=>$table_data,
    'pagelength'=>10,
    'order'=>'[[ 0, "asc" ]]'
    );
    print datatable($data);