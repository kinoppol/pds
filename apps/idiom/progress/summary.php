
<div class="card"><div class="card-body">
<?php

$data_progress=array(
    'id'=>'detail_idiom',
    'src'=>site_url('ajax/idiom/progress/summary/id/'.$complaint_id.'/result/unfounded'),
    'onlyClickClose'=>true,    
);
//light_punishment
//punishment
    print '<button class="btn btn-success btn-lg btn-block">ไม่มีมูล</button>';
    print '<button class="btn btn-warning btn-lg btn-block">ผิดวินัยไม่ร้ายแรง</button>';
    print '<button class="btn btn-danger btn-lg btn-block">ผิดวินัยร้ายแรง</button>';

?>
</div>
</div>