

<?php
$complaint_id=$hGET['id'];
$complaint_data=sSelectTb($systemDb,'complaint','*','id='.sQ($complaint_id));
$complaint=$complaint_data[0];
$data_progress=array(
    'id'=>'detail_idiom',
    'src'=>site_url('ajax/idiom/progress/summary/id/'.$complaint_id.'/result/unfounded'),
    'onlyClickClose'=>true,    
);
//light_punishment
//punishment
    print '<div class="card"><div class="card-body"><button id="unfounded" class="btn btn-success btn-lg btn-block">ไม่มีมูล</button></div></div>';
    print '<div class="card"><div class="card-body"><button id="light_punishment" class="btn btn-warning btn-lg btn-block">ผิดวินัยไม่ร้ายแรง</button></div></div>';
    print '<div class="card"><div class="card-body"><button id="punishment" class="btn btn-danger btn-lg btn-block">ผิดวินัยร้ายแรง</button></div></div>';

?>
</div>
</div>
<script>
    $("#progress_idiom").modal('hide');
    $("#unfounded").click(function(){
        if(confirm(
            "ยืนยันการสรุปสำนวนว่า \"<?php print $complaint['subject']; ?>\" \n นั้นไม่มีมูล"
        )){
            window.location = "<?php print site_url('main/idiom/summary/save/id/'.$complaint_id.'/result/unfounded'); ?>";
        }
    });

    $("#light_punishment").click(function(){
        if(confirm(
            "ยืนยันการสรุปสำนวนว่า \"<?php print $complaint['subject']; ?>\" \n นั้นผิดวินัย \"ไม่\" ร้ายแรง"
        )){
            window.location = "<?php print site_url('main/idiom/summary/save/id/'.$complaint_id.'/result/light_punishment'); ?>";
        }
    });

    $("#punishment").click(function(){
        if(confirm(
            "ยืนยันการสรุปสำนวนว่า \"<?php print $complaint['subject']; ?>\" \n นั้นผิดวินัย \"ร้ายแรง\""
        )){
            window.location = "<?php print site_url('main/idiom/summary/save/id/'.$complaint_id.'/result/punishment'); ?>";
        }
    });
</script>