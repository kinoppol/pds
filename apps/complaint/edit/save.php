<?php
load_fun('system_alert');

if(isset($_POST['subject'])&&trim($_POST['subject'])!=''){
$data=array(
    'receive_code'=>sQ($_POST['receive_code']),
    'level_confidential'=>sQ($_POST['level_confidential']),
    'receive_date'=>sQ($_POST['receive_date']),
    'subject'=>sQ($_POST['subject']),
    'complainant'=>sQ($_POST['complainant']),
    'source_id'=>sQ($_POST['source_id']),
    'owner_id'=>sQ(current_user('id')),
);
$result=sUpdateTb($systemDb,"complaint",$data,'id='.$hGET['id']);
}else{
    $err_txt=' โปรดระบุชื่อเรื่อง';
}

if($result){
    $data['icon']='fa fa-save';
    $data['color']='alert-success';
    $data['text']='&nbsp;บันทึกข้อมูลเรียบร้อยแล้ว';
print genAlert($data);
print '<script>
$("#edit_complaint").modal("hide");
load_table_complaint();
</script>';
}else{
    
    $data['icon']='fa fa-save';
    $data['color']='alert-danger';
    $data['text']='&nbsp;ไม่สามารถบันทึกข้อมูลได้'.$err_txt;
print genAlert($data);
print '<script>
$("#edit_complaint").modal("hide");
</script>';
}