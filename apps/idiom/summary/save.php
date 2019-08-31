<?php
$complaint_id=$hGET['id'];
$result=$hGET['result'];

$complaint_data=sSelectTb($systemDb,'complaint','*','id='.sQ($complaint_id));
$complaint=$complaint_data[0];

$inv_data=array(
    "complaint_id"=>sQ($complaint_id),
    "subject"=>sQ("การสอบสวน : ".$complaint["subject"]),
    "investigate_type"=>sQ($result),
    "owner_id"=>2,
);

sInsertTb($systemDb,'investigate',$inv_data);
sUpdateTb($systemDb,'complaint',array('result'=>sQ($result)),'id='.$complaint_id);
redirect(site_url('main/idiom/list/view'));