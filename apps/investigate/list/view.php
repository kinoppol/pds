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
            'label' => 'เลขสั่งการสอบสวน',
            'type' => 'number',
            'placeholder' => 'ว่างไว้เพื่อกำหนดโดยอัตโนมัติ',
            'icon' => 'fa fa-sort-amount-desc',
            'value' => $docData['complaint_id']
        ),
        'investigate_code' => array(
            'label' => 'เลขสั่งการสอบสวน',
            'type' => 'number',
            'placeholder' => 'เลขที่ได้รับจากคำสั่งสอบสวน',
            'icon' => 'fa fa-sort-amount-desc',
            'value' => $docData['investigate_code']
        ),
        'subject' => array(
            'label' => 'เรื่องที่สอบสวน',
            'type' => 'text',
            'placeholder' => 'ชื่อจากเรื่องร้องเรียน หรือ ชื่อเรื่องใหม่',
            'icon' => 'fa fa-edit',
            'value' => $docData['subject']
        ),
        'investigator' => array(
            'label' => 'ผู้ถูกสอบสวน',
            'type' => 'text',
            'placeholder' => 'ชื่อผู้ถูกสอบสวน',
            'icon' => 'fa fa-user',
            'value' => $docData['investigator']
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
        'owner_id' => array(
            'label' => 'เจ้าของสำนวน',
            'type' => 'select',
            'item' => array(
                // 'unfounded'=>'ไม่มีมูล',
                'light_punishment'=>'มีมูล ผิดวินัยไม่ร้ายแรง',
                'punishment'=>'มีมูล ผิดวินัยร้ายแรง',
            ),
        ),
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