<?php
load_fun('system_alert');
//print_r($_FILES);
$investigate_id=$hGET['id'];
$step_id=$hGET['step_id'];
print $investigate_id;
print $step_id;
//$chk_step=sSelectTb($systemDb,'complaint_timeline','count(*) as c','complaint_id='.sQ($complaint_id).' AND step_id ='.sQ($step_id));
$chk_step=chk_step($investigate_id,$step_id);

$validextensions = array("jpeg", "jpg", "pdf","JPEG","JPG","PDF");

   $temporary = explode(".", $_FILES["attach_file"]["name"]);
   //print_r($temporary);
   
//    $file_extension = end($temporary);
//    print($file_extension);

   if(!$chk_step)
   {//ถ้ายังไม่มีการบันทึกการดำเนินการ
        if(count($temporary)==0||$temporary[0]==''){//ถ้าไม่ได้แนบไฟล์
            $data['icon']='fa fa-save';
            $data['color']='alert-danger';
            $data['text']='&nbsp;กรุณาแนบไฟล์รูปภาพหรือ PDF'.$err_txt.$systemDb['db']->error;
            print genAlert($data);
            print '<script>    $("#detail_investigate").modal("hide"); </script>;';
            exit();
        }
        $file_extension = end($temporary);
        print($file_extension);
        if(!in_array($file_extension, $validextensions))
        {//ถ้าแนบไฟล์อื่นที่ไม่ได้กำหนดชนิดไว้
            $data['icon']='fa fa-save';
            $data['color']='alert-danger';
            $data['text']='&nbsp;คุณแนบไฟล์อื่นที่ไม่ใช่รูปภาพหรือ PDF'.$err_txt.$systemDb['db']->error;
            print genAlert($data);
            print '<script> $("#detail_investigate").modal("hide");</script>';
            exit();
        }
    }//จบ ถ้ายังไม่มีการบันทึกการดำเนินการ
        $file_extension = end($temporary);
        $dir=BASE_PATH."/upload_files/investigate_id_".$investigate_id.'/';
        $file_name=$hGET['step_id'].'.'.$file_extension;
        $target=$dir.$file_name;

        if (!file_exists($dir)) {    mkdir($dir, 0777, true);   }

        $tmp_name=$_FILES["attach_file"]["tmp_name"];
        move_uploaded_file($tmp_name, $target);
        if($chk_step)
        {
            $data=array(
            'timeline_detail'=>sQ(json_encode(
                array(
                    'step_comment'=>$_POST['step_comment'],
                    )
                ))
            );
            $result=sUpdateTb($systemDb,'investigate_timeline',$data,'investigate_id='.sQ($investigate_id).' AND step_id='.sQ($step_id));
        }else
        {
            $data=array(
                'investigate_id'=>$investigate_id,
                'step_id'=>$step_id,
                'date_step'=>sQ(date('Y-m-d')),
                'timeline_detail'=>sQ(json_encode(
                    array(
                        'step_comment'=>$_POST['step_comment'],
                        )
                    ))
            );
            $result=sInsertTb($systemDb,'investigate_timeline',$data);
        }
        if($result){
            $data['icon']='fa fa-save';
            $data['color']='alert-success';
            $data['text']='&nbsp;บันทึกข้อมูลเรียบร้อยแล้ว';
            print genAlert($data);
                print '<script>
                $("#detail_investigate").modal("hide");
                load_step();
                </script>';
        }
        else
        {
            $data['icon']='fa fa-save';
            $data['color']='alert-danger';
            $data['text']='&nbsp;ไม่สามารถบันทึกข้อมูลได้'.$err_txt.$systemDb['db']->error;
            print genAlert($data);
        }
        print '<script>$("#detail_investigate").modal("hide");</script>';