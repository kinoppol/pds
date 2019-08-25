<?php
load_fun('system_alert');
if(isset($_POST['subject'])&&trim($_POST['subject'])!=''){
$data=array(
    'investigate_code'=>sQ($_POST['investigate_code']),
    'subject'=>sQ($_POST['subject']),
    'investigate_type'=>sQ($_POST['investigate_type']),
    'investigator'=>sQ($_POST['investigator']),
    // 'result'=>sQ($_POST['result']),
    // 'appeal'=>sQ($_POST['appeal']),
    // 'undecided_case_code'=>sQ($_POST['undecided_case_code']),
    // 'decided_case_code'=>sQ($_POST['decided_case_code']),
);
$cond=sQ($_POST['investigate_id']);
$result=sUpdateTb($systemDb,"investigate",$data,'id='.$cond);
}else{
    $err_txt=' โปรดระบุชื่อเรื่อง';
}

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
    $data['text']='&nbsp;ไม่สามารถบันทึกข้อมูลได้'.$err_txt;
print genAlert($data);
}