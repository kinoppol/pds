<?php
//$complaint_data=sSelectTb($systemDb,'complaint','*','id='.$hGET['id']);
//$complaint_data=$complaint_data[0];
?>
<div id="stepResponse">
</div>
<div class="card"><div class="card-body">
<?php
    $step=array(
        
    );
    $data=array(
        'id'=>'modal_resive',
        'label'=>'<i class="fa fa-check"></i> รับเรื่องร้องเรียน',
        'color'=>'btn-success btn-lg btn-block',
        'onlyClickClose'=>true,
        //'onClick'=>'gen_index()',
    );
    print gen_modal_botton($data);
?>

</div>
</div>
<div class="card"><div class="card-body">
<?php
$step=array();
$step_data=sSelectTb($systemDb,'step_data','*','id between 2 AND 6');
foreach($step_data as $row){
$step[]=array(
        'id'=>$row['id'],
        'bullet'=>'fa fa-edit',
        'title'=>$row['step_name'],
        'color'=>'btn-primary',
    );
}
print gen_progress_btn($step,$hGET['id']);

function gen_progress_btn($data,$com_id){
$ret='';
    foreach($data as $row){
        $data_progress=array(
            'id'=>'detail_idiom',
            'src'=>site_url('ajax/idiom/progress/detail/id/'.$com_id.'/step_id/'.$row['id']),
            'onlyClickClose'=>true,    
        );
        $ret.= '<a '.gen_modal_link($data_progress).' class="btn btn-primary btn-lg btn-block" ><i class="'.$row['bullet'].'"></i> '.$row['title'].'</a>';
    }
    return $ret;
}
   
?>

</div>
</div>