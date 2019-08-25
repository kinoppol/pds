<?php
    $title="รับเรื่องร้องเรียน";
?>
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

print "<p id='complaint_table'>โปรดรอสักครู่..</p>";

//ฟอร์มรับเรื่อง
    $inputDetail = array(
        'receive_code' => array(
            'label' => 'เลขรับเรื่อง',
            'type' => 'text',
            'placeholder' => '',
            'icon' => 'fa fa-sort-amount-desc',
            'value' => ''
        ),
        'receive_date' => array(
            'label' => 'วันที่รับเรื่อง',
            'type' => 'date',
            'placeholder' => '',
            'icon' => 'fa fa-calendar',
            'value' => date('Y-m-d')
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
            'value' => ''
        ),
        'complainant' => array(
            'label' => 'ผู้ถูกร้องเรียน',
            'type' => 'textarea',
            'icon' => 'fa fa-user',
            'value' => ''
        ),
        'source_id' => array(
            'label' => 'ประเภทที่มา',
            'type' => 'select',
            'item'=>array(
                1=>'บัตรสนเท่ห์',
                2=>'หน่วยงานภายนอก',
                3=>'เว็บไซต์',
                4=>'สตง.',
                5=>'ป.ป.ช.'
            ),
            'icon' => 'fa fa-list'
        ),
        'source_name' => array(
            'label' => 'ชื่อที่มา',
            'type' => 'text',
            'icon' => 'fa fa-edit'
        ),
        'submit' => array(
            'label' => '&nbsp;',
            'type' => 'submit',
            'value' => 'บันทึก'
        )
    );
    $onSubmit .= '
    $("#modal_resive").modal("hide");
    load_table_complaint();
    ';
    $inputForm = genInput($inputDetail, 4, 12);
    $saveURL=site_url('ajax/complaint/receive/save');
    $form_content=genForm(array(
    'id' => 'receiveForm',
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

    $data=array(
        'id'=>'transfer_complaint',
        'title'=>'มอบหมายสำนวน',
        'content'=>'<p id="progress_content">โปรดรอสักครู่..</p>'                
    );
    print gen_modal($data);

    $data=array(
        'id'=>'edit_complaint',
        'title'=>'แก้ไขเรื่องร้องเรียน',
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
    load_table_complaint();
});
    function load_table_complaint(){
        $('#complaint_table').load('<?php
            print site_url('ajax/complaint/list/table');
            ?>');
    }
</script>