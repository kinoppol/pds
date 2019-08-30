<?php
load_fun('form');
$step_data=sSelectTb($systemDb,'step_data','*','id='.sQ($hGET['step_id']));
$step_data=$step_data[0];

$timeline_data=sSelectTb($systemDb,'complaint_timeline','*','complaint_id='.sQ($hGET['id']).' AND step_id='.sQ($hGET['step_id']));
$timeline_data=$timeline_data[0];
$step_comment_data=$timeline_data['timeline_detail'];
$step_comment_data=json_decode($step_comment_data);

print '<h3>'.$step_data['step_name'].'</h3>';
$inputDetail = array(
    'attach_file' => array(
        'label' => 'แนบหลักฐาน',
        'type' => 'file',
        'class'=> 'btn-primary',
        'placeholder' => 'ภาพถ่ายหรือไฟล์ PDF',
        'button_text' => 'เลือกไฟล์ <i class="fa fa-paperclip"></i>',
        'attr'=>array('accept'=>'.jpg,.jpeg,.pdf,.JPG,.JPEG,.PDF'),
        //'icon' => 'fa fa-paperclip',
        'value' => ''
    ),
    'step_comment' => array(
        'label' => 'ความเห็น',
        'type' => 'text',
        'placeholder' => '',
        'icon' => 'fa fa-commenting-o',
        'value' => $step_comment_data->step_comment,
    ),
    'submit' => array(
        'label' => '&nbsp;',
        'type' => 'submit',
        'value' => 'บันทึก'
    )
);
$onSubmit .= '
$("#detail_idiom").modal("hide");
';
$inputForm = genInput($inputDetail, 4, 12);
$saveURL=site_url('ajax/idiom/progress/save/id/'.$hGET['id'].'/step_id/'.$hGET['step_id']);
print gen_form(array(
'id' => 'stepForm',
'action' => $saveURL,
'ajaxSubmit' => $inputDetail,
'response' => 'stepResponse',
'onSubmit' => $onSubmit,
'item' => $inputForm
));