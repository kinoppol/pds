<?php

$teacher_id=$hGET['tid'];

$teacher_data=sSelectTb($appDb,'teacher_data','*','id='.$teacher_id);

//print_r($teacher_data);
?>
<form action="<?php print site_url('authen/login/save/register'); ?>" method="post">
<div class="form-group"><label>ชื่อครูพิเศษ</label>
<?php 
print $teacher_data[0]['name'];
?>
</div>
<div class="form-group"><label>หัวข้อที่สอน</label>
<input type="text" name="subject" required class="form-control">
</div>
<div class="form-group"><label>วันที่เริ่มสอน</label>
<input type="date" name="startUse" required class="form-control" value="<?php print date('Y-m-d')?>">
</div>
<div class="form-group"><label>สอนถึงวันที่</label>
<input type="date" name="endUse" required class="form-control" value="<?php print date('Y-m-d')?>">
</div>
<div class="form-group">
<button type="submit" class="btn btn-primary ml-auto">บันทึก</button>
</div>
</form>
