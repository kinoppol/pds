<div class="container">
<div id="ajaxResponse">
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
<?php
load_fun('form');

print "<p id='investigate_table'>โปรดรอสักครู่..</p>";
$data=array(
    'id'=>'progress_investigate',
    'title'=>'การดำเนินสำนวน สอบสวน',
    'content'=>'<p id="progress_content">โปรดรอสักครู่..</p>'                
);
print gen_modal($data);

$data=array(
    'id'=>'detail_investigate',
    'title'=>'รายละเอียดการดำเนินการ',
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
            print site_url('ajax/investigate/list_progress/table');
            ?>');
    }
</script>