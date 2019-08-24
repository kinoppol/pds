<?php
load_fun('form');
$investigate_data=sSelectTb($systemDb,'investigate','*','id='.$hGET['id']);
$investigate_data=$investigate_data[0];
$inputDetail = array(
    'complaint_id' => array(
        'label' => 'รหัสการร้องเรียน',
        'type' => 'number',
        'placeholder' => 'ว่างไว้เพื่อกำหนดโดยอัตโนมัติ',
        'icon' => 'fa fa-sort-amount-desc',
        'value' => $investigate_data['complaint_id']
    ),
    'subject' => array(
        'label' => 'เรื่องที่สอบสวน',
        'type' => 'text',
        'placeholder' => 'ว่างไว้เพื่อกำหนดโดยอัตโนมัติ',
        'icon' => 'fa fa-edit',
        'value' => $investigate_data['subject']
    ),
    'investigate_type' => array(
        'label' => 'ประเภทการสอบสวน',
        'type' => 'select',
        'item' => array(
            'unfounded'=>'ไม่มีมูล',
            'light_punishment'=>'มีมูล ผิดวินัยไม่ร้ายแรง',
            'punishment'=>'มีมูล ผิดวินัยร้ายแรง',
        ),
        'icon' => 'fa fa-user-secret'
    ),
    'result' => array(
        'label' => 'ผลการสอบสวน',
        'type' => 'textarea',
        'icon' => 'fa fa-edit',
        'value' => $investigate_data['result']
    ),
    'appeal' => array(
        'label' => 'การอุทธรณ์',
        'type' => 'select',
        'item'=>array(
            'Y'=>'อุทธรณ์',
            'N'=>'ไม่อุทธรณ์',
        ),
        'icon' => 'fa fa-list'
    ),
    'undecided_case_code' => array(
        'label' => 'หมายเลขคดีดำ',
        'type' => 'text',
        'icon' => 'fa fa-edit',
        'value' => $investigate_data['undecided_case_code']
    ),
    'decided_case_code' => array(
        'label' => 'หมายเลขคดีแดง',
        'type' => 'text',
        'icon' => 'fa fa-edit',
        'value' => $investigate_data['decided_case_code']
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
$saveURL=site_url('ajax/complaint/receive/save');
print genForm(array(
'id' => 'receiveForm',
'action' => $saveURL,
'ajaxSubmit' => $inputDetail,
'response' => 'ajaxResponse',
'onSubmit' => $onSubmit,
'item' => $inputForm
));