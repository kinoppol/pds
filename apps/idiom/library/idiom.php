<?php
    function chk_step($complaint_id,$step_id){
        global $systemDb;
        $chk_step=sSelectTb($systemDb,'complaint_timeline','count(*) as c','complaint_id='.sQ($complaint_id).' AND step_id ='.sQ($step_id));
        $chk_step=$chk_step[0];
        if($chk_step['c']==1){
            return true;
        }else{
            return false;
        }

    }

    function gen_progress_btn($data,$com_id){
        $ret='';
            foreach($data as $row){
                $data_progress=array(
                    'id'=>'detail_idiom',
                    'src'=>site_url('ajax/idiom/progress/detail/id/'.$com_id.'/step_id/'.$row['id']),
                    'onlyClickClose'=>true,    
                );
                $ret.= '<a '.gen_modal_link($data_progress).' class="btn '.$row['color'].' btn-lg btn-block" ><i class="'.$row['bullet'].'"></i> '.$row['title'].'</a>';
            }
            return $ret;
        }
?>