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
    'complaint_code' => array(
        'label' => 'หมายเลขเรื่องร้องเรียน',
        'type' => 'text',
        'placeholder' => 'ว่างไว้เพื่อกำหนดโดยอัตโนมัติ',
        'icon' => 'fa fa-sort-amount-desc',
        'value' => $docData['complaint_code']
    ),
    'complaint_subject' => array(
        'label' => 'เรื่องที่ร้องเรียน',
        'type' => 'text',
        'icon' => 'fa fa-header',
        'value' => $docData['complaint_subject']
    ),
    'source_id' => array(
        'label' => 'รหัสแหล่งที่มาของเรื่องร้องเรียน',
        'type' => 'text',
        'icon' => 'fa fa-warning',
        'value' => $docData['source_id']
    ),
    'owner_id' => array(
        'label' => 'รหัสเจ้าของสำนวน',
        'type' => 'text',
        'icon' => 'fa fa-user',
        'value' => $docData['owner_id']
    ),
    'submit' => array(
        'label' => '&nbsp;',
        'type' => 'submit',
        'value' => 'เพิ่มเรื่องร้องเรียน'
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