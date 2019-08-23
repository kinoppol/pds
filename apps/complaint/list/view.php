<div class="container">
<div id="ajaxResponse">
</div>
<div class="card"><div class="card-body">
<?php
    
    $data=array(
        'id'=>'modal_resive',
        'label'=>'<i class="fa fa-plus"></i> รับเรื่องร้องเรียน',
        'color'=>'btn-primary',
        'onlyClickClose'=>true,
        //'onClick'=>'gen_index()',
    );
    print gen_modal_botton($data);
?>
</div>
</div>

<div class="card"><div class="card-body"><div class="row"><div class="col-12 col-md-12 col-lg-12">
<?php
load_fun('form');

load_fun('table');
load_fun('datatable');

$data=array("head"=>array(
    'เลขรับเรื่อง',
    'หมายเลขเรื่องร้องเรียน',
    'ชื่อเรื่องร้องเรียน',
    'แหล่งที่มา',
    'เจ้าของสำนวน'
    ),
    'id'=>'school',
    'item'=>$complaint_data,
    'pagelength'=>10,
    'order'=>'[[ 0, "asc" ]]'
    );
    print datatable($data);

//ฟอร์มรับเรื่อง
    $inputDetail = array(
        'resive_code' => array(
            'label' => 'เลขรับเรื่อง',
            'type' => 'text',
            'placeholder' => 'ว่างไว้เพื่อกำหนดโดยอัตโนมัติ',
            'icon' => 'fa fa-sort-amount-desc',
            'value' => $docData['doc_code']
        ),
        'complaint_code' => array(
            'label' => 'เลขเรื่องร้องเรียน',
            'type' => 'text',
            'placeholder' => 'ว่างไว้เพื่อกำหนดโดยอัตโนมัติ',
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
    $saveURL=site_url('ajax/complaint/resive/save');
    $form_content=genForm(array(
    'id' => 'resiveForm',
    'action' => $saveURL,
    'ajaxSubmit' => $inputDetail,
    'response' => 'ajaxResponse',
    'onSubmit' => $onSubmit,
    'item' => $inputForm
));

    $data=array(
        'id'=>'modal_resive',
        'title'=>'รับเรื่องร้องเรียน',
        'content'=>'<p id="progress_content">'.$form_content.'</p>'                
    );
    print gen_modal_box($data);
?>

</div>
</div>
</div>
</div>
</div>