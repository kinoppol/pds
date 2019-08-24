<?php
load_fun('form');

$inputDetail = array(
    'receive_code' => array(
        'label' => 'เลขรับเรื่อง',
        'type' => 'text',
        'placeholder' => '',
        'icon' => 'fa fa-sort-amount-desc',
        'value' => $docData['doc_code']
    ),
    'complaint_code' => array(
        'label' => 'เลขเรื่องร้องเรียน',
        'type' => 'text',
        'placeholder' => '',
        'icon' => 'fa fa-edit',
        'value' => $docData['note']
    ),
    'level_confidential' => array(
        'label' => 'ชั้นความรับ',
        'type' => 'select',
        'item' => array(
            'ลับ'=>'ลับ',
            'ลับมาก'=>'ลับมาก',
            'ลับที่สุด'=>'ลับที่สุด',
        ),
        'icon' => 'fa fa-user-secret'
    ),
    'subject' => array(
        'label' => 'ชื่อเรื่องร้องเรียน',
        'type' => 'textarea',
        'icon' => 'fa fa-edit',
        'value' => $docData['note']
    ),
    'source_id' => array(
        'label' => 'ประเภทที่มา',
        'type' => 'select',
        'item'=>array(
            1=>'บัตรสนเทห์',
            2=>'หน่วยงานภายนอก',
            3=>'เว็บไซต์',
        ),
        'icon' => 'fa fa-list'
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