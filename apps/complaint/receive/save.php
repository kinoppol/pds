<?php
load_fun('system_alert');
$data=array(
    'receive_code'=>sQ($_POST['receive_code']),
    'level_confidential'=>sQ($_POST['level_confidential']),
    'complaint_code'=>sQ($_POST['complaint_code']),
    'subject'=>sQ($_POST['subject']),
    'source_id'=>sQ($_POST['source_id']),
    'owner_id'=>sQ(current_user('id')),
);
$result=sInsertTb($systemDb,"complaint",$data);
if($result){
    $data['icon']='fa fa-save';
    $data['color']='alert-success';
    $data['text']='&nbsp;บันทึกข้อมูลเรียบร้อยแล้ว';
print genAlert($data);
print '<script>
$("#receiveForm").trigger("reset");
</script>';
}else{
    
    $data['icon']='fa fa-save';
    $data['color']='alert-danger';
    $data['text']='&nbsp;ไม่สามารถบันทึกข้อมูลได้';
print genAlert($data);
}