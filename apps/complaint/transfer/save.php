<?php
load_fun('system_alert');
$complaint_id=$_POST['complaint_id'];
$user_id=$_POST['user_id'];

sUpdateTb($systemDb,'complaint',array('owner_id'=>$user_id),'id='.$complaint_id);

$data['icon']='fa fa-save';
    $data['color']='alert-success';
    $data['text']='&nbsp;หมอบหมายสำนวนเรียบร้อยแล้ว';
print genAlert($data);
print '
<script>
load_table_complaint();
</script>
';