<div class="card"><div class="card-body">
<?php
$complaint_id=$hGET['id'];
$step=array();
$step_data=sSelectTb($systemDb,'step_data','*','id between 2 AND 6');
foreach($step_data as $row){
    $chk_step=chk_step($complaint_id,$step_id=$row['id']);
$step[]=array(
        'id'=>$row['id'],
        'bullet'=>$chk_step?'fa fa-check':'fa fa-edit',
        'title'=>$row['step_name'],
        'color'=>$chk_step?'btn-success':'btn-warning',
    );
}
print gen_progress_btn($step,$complaint_id);
?>
</div>
</div>


<div class="card"><div class="card-body">
<?php
$chk_complete=chk_step($complaint_id,6);

if($chk_complete){
    
$data_progress=array(
    'id'=>'detail_idiom',
    'src'=>site_url('ajax/idiom/progress/summary/id/'.$complaint_id),
    'onlyClickClose'=>true,    
);
    print '<a '.gen_modal_link($data_progress).' class="btn btn-primary btn-lg btn-block"><i class="fa fa-send-o"></i> สรุปสำนวน</a>';
}else{
    print '<button class="btn btn-default btn-lg btn-block"><i class="fa fa-send-o"></i> สรุปสำนวน</a>';
}
?>
</div>
</div>