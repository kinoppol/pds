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
    $data_progress=array(
        'id'=>'detail_idiom',
        'src'=>site_url('ajax/idiom/progress/detail/id/'.$row['id']),
        'onlyClickClose'=>true,    
    );
    print '<a '.gen_modal_link($data_progress).' class="btn btn-primary btn-lg btn-block" ><i class="fa fa-edit"></i> แต่งตั้งกรรมการสืบ</a>';
?>

</div>
</div>