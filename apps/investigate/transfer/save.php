<?php
load_fun('system_alert');
$investigate_id=$_POST['investigate_id'];
$user_id=$_POST['user_id'];

sUpdateTb($systemDb,'investigate',array('owner_id'=>$user_id),'id='.$investigate_id);

$data['icon']='fa fa-save';
    $data['color']='alert-success';
    $data['text']='&nbsp;หมอบหมายเรื่องสอบสวนเรียบร้อยแล้ว';
print genAlert($data);
print '
<script>
load_table_investigate();
</script>
';