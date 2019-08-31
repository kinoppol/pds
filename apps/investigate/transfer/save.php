<?php
load_fun('system_alert');
$investigate_id=$_POST['investigate_id'];
$user_id=$_POST['user_id'];

sUpdateTb($systemDb,'investigate',array('owner_id'=>$user_id),'id='.$investigate_id);
$data=array(
    'investigate_id'=>sQ($_POST['investigate_id']),
    'step_id'=>7,
    'date_step'=>sQ(date('Y-m-d')),
);
sInsertTb($systemDb,'investigate_timeline',$data);

$data['icon']='fa fa-save';
    $data['color']='alert-success';
    $data['text']='&nbsp;หมอบหมายเรื่องสอบสวนเรียบร้อยแล้ว';
print genAlert($data);
print '
<script>
load_table_investigate();
</script>
';