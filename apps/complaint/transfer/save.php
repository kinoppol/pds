<?php
$complaint_id=$_POST['complaint_id'];
$user_id=$_POST['user_id'];

sUpdateTb($systemDb,'complaint',array('owner_id'=>$user_id),'id='.$complaint_id);
?>
<div class="card"><div class="card-body">
หมอบหมายสำนวนเรียบร้อยแล้ว
<div></div>