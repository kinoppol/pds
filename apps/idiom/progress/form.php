<?php
//$complaint_data=sSelectTb($systemDb,'complaint','*','id='.$hGET['id']);
//$complaint_data=$complaint_data[0];
?>
<div class="card"><div class="card-body">
<?php
    $step=array(
        
    );
    $data=array(
        'id'=>'modal_resive',
        'label'=>'<i class="fa fa-check"></i> แต่งตั้งกรรมการสืบ',
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
    
    $data=array(
        'id'=>'modal_resive',
        'label'=>'<i class="fa fa-coffee"></i> แจ้งกรรมการ',
        'color'=>'btn-primary btn-lg btn-block',
        'onlyClickClose'=>true,
        //'onClick'=>'gen_index()',
    );
    print gen_modal_botton($data);
?>

</div>
</div>