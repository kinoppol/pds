<?php
load_fun('form');
$complaint_data=sSelectTb($systemDb,'complaint','*','id='.$hGET['id']);
$complaint_data=$complaint_data[0];

$inputDetail = array(
    'receive_code' => array(
        'label' => 'เลขรับเรื่อง',
        'type' => 'text',
        'placeholder' => '',
        'icon' => 'fa fa-sort-amount-desc',
        'value' => $complaint_data['receive_code']
    ),
    'receive_date' => array(
        'label' => 'วันที่รับเรื่อง',
        'type' => 'text',
        'placeholder' => '',
        'icon' => 'fa fa-calendar',
        'value' => $complaint_data['receive_date']
    ),
    'level_confidential' => array(
        'label' => 'ชั้นความรับ',
        'type' => 'select',
        'item' => array(
            'ลับ'=>'ลับ',
            'ลับมาก'=>'ลับมาก',
            'ลับที่สุด'=>'ลับที่สุด',
        ),
        'icon' => 'fa fa-user-secret',
        'def'=>$complaint_data['level_confidential']
    ),
    'subject' => array(
        'label' => 'ชื่อเรื่องร้องเรียน',
        'type' => 'textarea',
        'icon' => 'fa fa-edit',
        'value' => $complaint_data['subject']
    ),
    'complainant' => array(
        'label' => 'ผู้ถูกร้องเรียน',
        'type' => 'textarea',
        'icon' => 'fa fa-user',
        'value' => $complaint_data['complainant']
    ),
    'source_id' => array(
        'label' => 'ประเภทที่มา',
        'type' => 'select',
        'item'=>array(
            1=>'บัตรสนเท่ห์',
            2=>'หน่วยงานภายนอก',
            3=>'เว็บไซต์',
        ),
        'icon' => 'fa fa-list',
        'def'=>$complaint_data['source_id']
    ),
    'submit' => array(
        'label' => '&nbsp;',
        'type' => 'submit',
        'value' => 'บันทึก'
    )
);
$onSubmit .= '
$("#modal_resive").modal("hide");
';
$inputForm = genInput($inputDetail, 4, 12);
$saveURL=site_url('ajax/complaint/edit/save/id/'.$hGET['id']);
print gen_form(array(
'id' => 'editForm',
'action' => $saveURL,
'ajaxSubmit' => $inputDetail,
'response' => 'ajaxResponse',
'onSubmit' => $onSubmit,
'item' => $inputForm
));