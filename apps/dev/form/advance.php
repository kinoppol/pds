<?php
load_fun('form');

$inputDetail = array(
    'select_once' => array(
        'label' => 'หมายเลขคำสั่ง',
        'type'=>'select',
        'chosen'=>true,
        'class'=>'chosen-select form-control',
        'item'=>array(
            1=>'หมายเลข ๑',
            2=>'หมายเลข ๒',
            3=>'หมายเลข ๓',
            4=>'หมายเลข ๔',
            5=>'หมายเลข ๕',
            6=>'หมายเลข ๖',
        ),
        'def'=>3,
    ),
    
    'select_multiple' => array(
        'label' => 'เลือกได้หลายตัวเลือก',
        'type' => 'text',
        'type'=>'select',
        'chosen'=>true,
        'class'=>'chosen-select form-control',
        'attr'=>array('multiple'),
        'item'=>array(
            1=>'หมายเลข ๑',
            2=>'หมายเลข ๒',
            3=>'หมายเลข ๓',
            4=>'หมายเลข ๔',
            5=>'หมายเลข ๕',
            6=>'หมายเลข ๖',
        ),
        'def'=>2,
    ),'select_multiple2' => array(
        'label' => 'เลือกได้หลายตัวเลือก',
        'type' => 'text',
        'type'=>'select',
        'chosen'=>true,
        'class'=>'chosen-select form-control',
        'attr'=>array('multiple'),
        'item'=>array(
            1=>'หมายเลข ๑',
            2=>'หมายเลข ๒',
            3=>'หมายเลข ๓',
            4=>'หมายเลข ๔',
            5=>'หมายเลข ๕',
            6=>'หมายเลข ๖',
        ),
        'def'=>array(1,2,5),
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