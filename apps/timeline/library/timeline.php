<?php
function gen_timeline($data){
    $str='';
    foreach($data as $row){
        $str.='
        <li class="event-'.$row['color'].'">
        <div class="header">
            '.$row['date'].'
        </div>
        <div class="card col-12 col-md-12 col-lg-9">
          <div class="card-header text-'.$row['color'].'">
            <i class="fa fa-check mr-2"></i> '.$row['title'].'
          </div>
          <div class="card-body">
            '.$row['comment'].'
          </div>
        </div>
      </li>
      ';
    }
    $ret='
<div class="timeline">
  <ul>
   '.$str.'
    </ul>
</div>
';
return $ret;
}