<?php

load_fun('table');
load_fun('datatable');

//$investigate_data=sSelectTb($systemDb,"investigate",'id,complaint_id,investigate_code,subject,investigate_type,investigator,result,appeal,undecided_case_code,decided_case_code','owner_id='.current_user('id').'');
$sql="SELECT
ig.id,
ig.investigate_code,
ig.subject,
ig.investigator,
ig.investigate_type,
sd.step_name,
it.date_step
FROM
investigate ig
INNER JOIN investigate_timeline it ON ig.id = it.investigate_id
INNER JOIN step_data sd ON it.step_id = sd.id
WHERE ig.owner_id = ".current_user('id')."  
GROUP BY ig.id
ORDER BY it.date_step DESC,
it.step_id DESC";
//print $sql;
 $investigate_data=mysqli_query($db,$sql);
//print_r($complaint_data);
$arr_investigate_type=array('ไม่มีมูล'=>'unfounded','มีมูล ผิดวินัยไม่ร้ายแรง'=>'light_punishment','มีมูล ผิดวินัยร้ายแรง'=>'punishment',);
$i=-1;
foreach($investigate_data as $row){
    $i++;
    $data_progress=array(
        'id'=>'progress_investigate',
        'src'=>site_url('ajax/investigate/progress/form/id/'.$row['id']),
        'onlyClickClose'=>true,    
    );
    $table_data[]=array(
        'investigate_code'=>$row['investigate_code'],
        'subject'=>$row['subject'],
        'investigator'=>$row['investigator'],
        'investigate_type'=>array_search(trim($row['investigate_type']),$arr_investigate_type),
        'step_name'=>$row['step_name'],
        'date_step'=>datethaishort($row['date_step']),
        'edit_button'=>'
        <a '.gen_modal_link($data_progress).' class="btn btn-primary" ><i class="fa fa-edit"></i> ดำเนินการ</a>
        ',
    );
    
}
$data=array("head"=>array(
    'เลขสั่งการสอบสวน',
    'เรื่องสอบสวน',
    'ผู้ถูกสอบสวน',
    'ประเภทความผิด',
    'อยู่ในขั้นตอน',
    'ลงรับเรื่อง',
    'ดำเนินการ'
    ),
    'id'=>'complaint',
    'item'=>$table_data,
    'pagelength'=>10,
    'order'=>'[[ 0, "asc" ]]'
    );
    print datatable($data);