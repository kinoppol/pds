<?php
load_fun('form');

$inputDetail = array(
    'receive_code' => array(
        'label' => 'เลขรับเรื่อง/ธุรการ',
        'type' => 'text',
        'placeholder' => 'ว่างไว้เพื่อกำหนดโดยอัตโนมัติ',
        'icon' => 'fa fa-sort-amount-desc',
        'value' => $docData['receive_code']
    ),
    'level_confidential' => array(
        'label' => 'ชั้นความลับ',
        'type' => 'select',
        'icon' => 'fa fa-angle-double-down',
        'item' => array(
            'top_secret' => 'ลับที่สุด',
            'secret' => 'ลับมาก',
            'confidential' => 'ลับ'
        ),
        'def' => $docData['level_confidential'] ? $docData['level_confidential'] : date('Y')
    ),
    'doc_title' => array(
        'label' => 'เรื่อง',
        'type' => 'textarea',
        'icon' => 'fa fa-header',
        'value' => $docData['doc_title']
    ),
    'note' => array(
        'label' => 'หมายเหตุ',
        'type' => 'textarea',
        'icon' => 'fa fa-warning',
        'value' => $docData['note']
    ),
    'doc_from' => array(
        'label' => 'ต้นเรื่อง',
        'type' => 'text',
        'icon' => 'fa fa-user',
        'value' => $docData['doc_from']
    ),
    'endorser' => array(
        'label' => 'ผู้ลงนาม',
        'type'=>'select',
        'item'=>array(
            "director"=>'ผู้อำนวยการ',
            "deputy"=>'รองผู้อำนวยการ',
        ),
        'def'=>"director",
    ),
    'dow' => array(
        'label' => 'วันในสัปดาห์',
        'type'=>'select',
        'attr'=>array('multiple'),
        'item'=>array(
            "m"=>'จันทร์',
            "t"=>'อังคาร',
            "w"=>'พุธ',
            "th"=>'พฤหัสบดี',
            "f"=>'ศุกร์',
        ),
        
        'icon'=>'fa fa-book',
        'def'=>array('m','w','th'),
    ),
    'date_sign' => array(
        'label' => 'ลงนามวันที่',
        'type' => 'date',
        'icon' => 'fa fa-calendar',
        'value' => $docData['date_sign'] ? $docData['date_sign'] : date('Y-m-d')
    ),
    'date_sign' => array(
        'label' => 'เวลา',
        'type' => 'time',
        'icon' => 'fa fa-calendar',
        'value' => $docData['date_sign'] ? $docData['date_sign'] : date('H:i')
    ),

    'submit' => array(
        'label' => '&nbsp;',
        'type' => 'submit',
        'value' => 'บันทึก'
    )
);
$onSubmit .= '
alert("Save");
';
$inputForm = genInput($inputDetail, 4, 12);
?>
<div class="container">
<div id="ajaxResponse">
</div>
<div class="card"><div class="card-body"><div class="row"><div class="col-12 col-md-12 col-lg-12">
<?php
$saveURL=site_url('ajax/user/profile/save');
print genForm(array(
    'id' => 'bookForm',
    'action' => $saveURL,
    'ajaxSubmit' => $inputDetail,
    'response' => 'ajaxResponse',
    'onSubmit' => $onSubmit,
    'item' => $inputForm
));
?>
</div>
</div>
</div>
</div>
</div>