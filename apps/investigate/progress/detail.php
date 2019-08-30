<?php
load_fun('form');

$inputDetail = array(
    'step_comment' => array(
        'label' => 'ความเห็น',
        'type' => 'text',
        'placeholder' => '',
        'icon' => 'fa fa-commenting-o',
        'value' => $complaint_data['receive_code']
    ),
    'attach_file' => array(
        'label' => 'แนบหลักฐาน',
        'type' => 'file',
        'class'=> 'btn-primary',
        'placeholder' => 'ภาพถ่ายหรือไฟล์ PDF',
        'button_text' => 'เลือกไฟล์ <i class="fa fa-paperclip"></i>',
        //'icon' => 'fa fa-paperclip',
        'value' => $complaint_data['receive_code']
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
$saveURL=site_url('ajax/idiom/progress/save/id/'.$hGET['id']);
print gen_form(array(
'id' => 'stepForm',
'action' => $saveURL,
'ajaxSubmit' => $inputDetail,
'response' => 'stepResponse',
'onSubmit' => $onSubmit,
'item' => $inputForm
));