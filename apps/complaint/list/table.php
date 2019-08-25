<?php

load_fun('table');
load_fun('datatable');

$complaint_data=sSelectTb($systemDb,"complaint",'*','owner_id='.current_user('id'));
//print_r($complaint_data);

$i=-1;
foreach($complaint_data as $row){
    $i++;
    $data_edit=array(
        'id'=>'edit_complaint',
        'src'=>site_url('ajax/complaint/edit/form/id/'.$row['id']),
        'onlyClickClose'=>true,    
    );
    $data_transfer=array(
        'id'=>'transfer_complaint',
        'src'=>site_url('ajax/complaint/transfer/form/id/'.$row['id']),
        'onlyClickClose'=>false,    
    );
    $table_data[]=array(
        'receive_code'=>$row['receive_code'],
        'receive_date'=>$row['receive_date'],
        'subject'=>$row['subject'],
        'source_id'=>$row['source_id'],
        'owner_id'=>$row['owner_id'],
        'edit_button'=>'
        <a '.gen_modal_link($data_edit).' class="btn btn-primary" ><i class="fa fa-edit"></i> แก้ไข</a>
        ',
        'transfer_button'=>'
        <a '.gen_modal_link($data_transfer).' class="btn btn-warning" ><i class="fa fa-sign-out"></i> โอน</a>
        ',
    );
    
}
$data=array("head"=>array(
    'เลขรับเรื่อง',
    'วันที่รับเรื่อง',
    'ชื่อเรื่องร้องเรียน',
    'แหล่งที่มา',
    'เจ้าของสำนวน',
    'แก้ไข',
    'โอน'
    ),
    'id'=>'complaint',
    'item'=>$table_data,
    'pagelength'=>10,
    'order'=>'[[ 0, "asc" ]]'
    );
    print datatable($data);