<div class="container">
<div id="ajaxResponse">
</div>
<div class="card"><div class="card-body">
<?php
    
    // $data=array(
    //     'id'=>'modal_investigate',
    //     'label'=>'<i class="fa fa-plus"></i> เพิ่มเรื่องสอบสวน',
    //     'color'=>'btn-primary',
    //     'onlyClickClose'=>true,
    //     //'onClick'=>'gen_index()',
    // );
    // print gen_modal_botton($data);
?>

</div>
</div>

<div class="card"><div class="card-body"><div class="row"><div class="col-12 col-md-12 col-lg-12">
<?php
load_fun('form');

print "<p id='investigate_table'>โปรดรอสักครู่..</p>";

//ฟอร์มรับเรื่อง
    $inputDetail = array(
        'complaint_id' => array(
            'label' => 'รหัสการร้องเรียน',
            'type' => 'number',
            'placeholder' => 'ว่างไว้เพื่อกำหนดโดยอัตโนมัติ',
            'icon' => 'fa fa-sort-amount-desc',
            'value' => $docData['complaint_id']
        ),
        'subject' => array(
            'label' => 'เรื่องที่สอบสวน',
            'type' => 'text',
            'placeholder' => 'ว่างไว้เพื่อกำหนดโดยอัตโนมัติ',
            'icon' => 'fa fa-edit',
            'value' => $docData['subject']
        ),
        'investigate_type' => array(
            'label' => 'ประเภทการสอบสวน',
            'type' => 'select',
            'item' => array(
                // 'unfounded'=>'ไม่มีมูล',
                'light_punishment'=>'มีมูล ผิดวินัยไม่ร้ายแรง',
                'punishment'=>'มีมูล ผิดวินัยร้ายแรง',
            ),
            'icon' => 'fa fa-user-secret'
        ),
        // 'result' => array(
        //     'label' => 'ผลการสอบสวน',
        //     'type' => 'textarea',
        //     'icon' => 'fa fa-edit',
        //     'value' => $docData['result']
        // ),
        // 'appeal' => array(
        //     'label' => 'การอุทธรณ์',
        //     'type' => 'select',
        //     'item'=>array(
        //         'Y'=>'อุทธรณ์',
        //         'N'=>'ไม่อุทธรณ์',
        //     ),
        //     'icon' => 'fa fa-list'
        // ),
        // 'undecided_case_code' => array(
        //     'label' => 'หมายเลขคดีดำ',
        //     'type' => 'text',
        //     'icon' => 'fa fa-edit',
        //     'value' => $docData['undecided_case_code']
        // ),
        // 'decided_case_code' => array(
        //     'label' => 'หมายเลขคดีแดง',
        //     'type' => 'text',
        //     'icon' => 'fa fa-edit',
        //     'value' => $docData['decided_case_code']
        // ),
        'submit' => array(
            'label' => '&nbsp;',
            'type' => 'submit',
            'value' => 'บันทึก'
        )
    );
    $onSubmit .= '
    $("#modal_investigate").modal("hide");
    load_table_investigate();
    ';
    $inputForm = genInput($inputDetail, 5, 12);
    $saveURL=site_url('ajax/investigate/receive/save');
    $form_content=genForm(array(
    'id' => 'receiveForm',
    'action' => $saveURL,
    'ajaxSubmit' => $inputDetail,
    'response' => 'ajaxResponse',
    'onSubmit' => $onSubmit,
    'item' => $inputForm
));

    $data=array(
        'id'=>'modal_investigate',
        'title'=>'รับเรื่องสอบสวน',
        'content'=>'<p id="progress_content">'.$form_content.'</p>'                
    );
    print gen_modal_box($data);

    $data=array(
        'id'=>'delete_investigate',
        'title'=>'ลบเรื่องสอบสวน',
        'content'=>'<p id="progress_content">โปรดรอสักครู่..</p>'                
    );
    print gen_modal($data);

    $data=array(
        'id'=>'edit_investigate',
        'title'=>'แก้ไขเรื่องที่สอบสวน',
        'content'=>'<p id="progress_content">โปรดรอสักครู่..</p>'                
    );
    print gen_modal($data);
?>

</div>
</div>
</div>
</div>
</div>
<script>
$(function(){
    load_table_investigate();
});

    function load_table_investigate(){
        $('#investigate_table').load('<?php
            print site_url('ajax/investigate/list/table');
            ?>');
    }
</script>