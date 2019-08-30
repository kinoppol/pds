<?php
load_fun('system_alert');
print_r($_FILES);


$validextensions = array("jpeg", "jpg", "pdf","JPEG","JPG","PDF");

   $temporary = explode(".", $_FILES["attach_file"]["name"]);
   print_r($temporary);
   if(count($temporary)==0||$temporary[0]==''){//ถ้าไม่ได้แนบไฟล์
    $data['icon']='fa fa-save';
    $data['color']='alert-danger';
    $data['text']='&nbsp;กรุณาแนบไฟล์รูปภาพหรือ PDF'.$err_txt.$systemDb['db']->error;
    print genAlert($data);
    print '
<script>
    $("#detail_idiom").modal("hide");
</script>
';
       exit();
   }
   $file_extension = end($temporary);

   if(!in_array($file_extension, $validextensions)){//ถ้าแนบไฟล์อื่นที่ไม่ได้กำหนดชนิดไว้
    $data['icon']='fa fa-save';
    $data['color']='alert-danger';
    $data['text']='&nbsp;คุณแนบไฟล์อื่นที่ไม่ใช่รูปภาพหรือ PDF'.$err_txt.$systemDb['db']->error;
    print genAlert($data);
    print '
<script>
    $("#detail_idiom").modal("hide");
</script>
';
       exit();
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
    $data['text']='&nbsp;ไม่สามารถบันทึกข้อมูลได้'.$err_txt.$systemDb['db']->error;
print genAlert($data);
}

print '
<script>
    $("#detail_idiom").modal("hide");
</script>
';