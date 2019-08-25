<?php
load_fun('form');
$investigate_data=sSelectTb($systemDb,'investigate','*','complaint_id='.$hGET['id']);
$investigate_data=$investigate_data[0];
$inputDetail = array(
    'investigate_id' => array(
        'type' => 'hidden',
        'value' => $investigate_data['id']
    ),
    'investigate_code' => array(
        'label' => 'เลขหนังสือสั่งการ',
        'type' => 'text',
        'placeholder' => 'เลขหนังสือที่ได้รับจากคำสั่งสอบสวน',
        'attr'=>array('required'),
        'icon' => 'fa fa-sort-amount-desc',
        'value' => $investigate_data['investigate_code']
    ),
    'subject' => array(
        'label' => 'เรื่องที่สอบสวน',
        'type' => 'text',
        'placeholder' => 'ชื่อจากเรื่องร้องเรียน หรือ ชื่อเรื่องใหม่',
        'icon' => 'fa fa-edit',
        'attr'=>array('required'),
        'value' => $investigate_data['subject']
    ),
    'investigator' => array(
        'label' => 'ผู้ถูกสอบสวน',
        'type' => 'text',
        'placeholder' => 'ชื่อผู้ถูกสอบสวน',
        'attr'=>array('required'),
        'icon' => 'fa fa-user',
        'value' => $investigate_data['investigator']
    ),
    'investigate_type' => array(
        'label' => 'ความผิด',
        'type' => 'select',
        'item' => array(
             'unfounded'=>'ไม่มีมูล',
            'light_punishment'=>'มีมูล ผิดวินัยไม่ร้ายแรง',
            'punishment'=>'มีมูล ผิดวินัยร้ายแรง',
            ),
        'icon' => 'fa fa-user-secret'
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
$saveURL=site_url('ajax/investigate/receive/save');
print genForm(array(
'id' => 'editForm',
'action' => $saveURL,
'ajaxSubmit' => $inputDetail,
'response' => 'ajaxResponse',
'onSubmit' => $onSubmit,
'item' => $inputForm
));