<div class="container">
<?php
$complaint_id=$hGET['id'];
$complaint_data=sSelectTb($systemDb,'complaint','*','id='.sQ($complaint_id));
$complaint=$complaint_data[0];
    $title="การติดตามการดำเนินงาน";
    print "<h1>".$title."</h1>
    <p>".$complaint['subject']."</p>";

    $timeline_data=sSelectTb($systemDb,'complaint_timeline','*','complaint_id='.$complaint_id.' order by step_id');
    
    $data=array();
    $step_data=sSelectTb($systemDb,'step_data','*','1 order by id');
    foreach($timeline_data as $row){
        $step_detail=$row['timeline_detail'];
        $step_detail=json_decode($step_detail);
        $dir_uri="upload_files/id_".$complaint_id.'/';
        $dir=BASE_PATH.$dir_uri;
        $file_link=$dir.$row['step_id'].'.jpg';
        if(file_exists($file_link)){
            $file_url=site_url($dir_uri.$row['step_id'].'.jpg',true);
        }else{
            
            $file_url=site_url($dir_uri.$row['step_id'].'.pdf',true);
        }
        $data[]=array(
            'color'=>'success',
            'date'=>$row['date_step'],
            'title'=>$step_data[$row['step_id']-1]['step_name'],
            'comment'=>$step_detail->step_comment.' <a href="'.$file_url.'" class="btn btn-primary" target="_blank">หลักฐาน</a>',
        );
    }

    print gen_timeline($data);
?>

</div><!-- container -->