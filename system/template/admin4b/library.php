<?php

function gen_sub_menu($arr,$id){
      global $currentURI;
      global $function;
      global $parentActive;
      global $app;
      $ret='';
      $show='';
      foreach($arr as $sub){
                	$sub_url_arr=explode('/',$sub['url']);
                	//print_r();
                	//print $currentURI;
                    if($sub['url']==$currentURI||($app==$sub_url_arr[1]&&$function==$sub_url_arr[2])){
                       
                       if($app==$sub_url_arr[1]&&$function==$sub_url_arr[2]){
                           $show=' show';
                        }
                        if($sub['url']==$currentURI){
                           $subActive='active';
                        }
                        //$subActive='active';
                        
                        $parentActive='active open';
                        //print "ACTIVE".$parentActive;
                    }
                    else $subActive='';
                    
      

                    $ret.='<li class="'.$subActive.'">
                    <a href="'.site_url($sub['url']).'">
                        <span class="sidebar-nav-icon '.$sub['bullet'].'"></span>
                        <span class="sidebar-nav-text">
                        '.$sub['title'].'</span>
                    </a>

                    <b class="arrow"></b>
                    '.
                    (is_array($sub['item'])&&count($sub['item'])?gen_sub_menu($sub['item'],$id.$k):'')
                    .'
                </li>
                ';
                }
         $head='<ul id="'.$id.'" class="collapse '.$show.'" data-parent="#sidebar-nav">';
         $ret.='</ul>';
      return $head.$ret;
   }

    function gen_main_menu($menu_id=NULL, $menu=array(), $def=NULL,$class='nav nav-list',$title='') {
        global $function;
        global $template;
        global $parentActive;
        global $currentURI;
        global $app;
        global $file;
        $ret='';
        
        foreach($menu as $k=>$grpMenu){
            if(!$grpMenu['cond']) continue;
            $currentURI=$template.'/'.$app.'/'.$function.'/'.$file;
            $subMenu='';
            if(isset($grpMenu['item'])&&count($grpMenu['item'])>0){
                $parentActive='';
                $subMenu.=gen_sub_menu($grpMenu['item'],$k);
                
            }
            //print "> ".$parentActive." | ";
                   //print $grpMenu['title'];
            if($parentActive!=''){
                $activeMenu=$parentActive;
            }else{
                if($grpMenu['url']==$currentURI){
                    $activeMenu='active';
                }else{
                   
                    $activeMenu='';
                }
            }
            //print "->".$activeMenu."<-";
            $ret.='<li class="'.$activeMenu.'">
            ';
            if(isset($grpMenu['item'])&&count($grpMenu['item'])>0){
                $ret.='<a href="#'.$k.'" data-toggle="collapse">
                ';
            }else{
                $ret.='<a href="'.site_url($grpMenu['url']).'">
                ';
            }
            if(isset($grpMenu['bullet']))$ret.='<span class="sidebar-nav-icon '.$grpMenu['bullet'].'"></span>            ';
            $ret.='<span class="sidebar-nav-text">'.$grpMenu['title'].'</span>
            ';
            if(isset($grpMenu['item'])&&count($grpMenu['item'])>0){
                $ret.='<b class="arrow fa fa-angle-down"></b>
                ';
            }else{
                $ret.='<b class="arrow"></b>
                ';
            }
            $ret.='</a>'.$subMenu.'</li>';
        }

            $titleMenu=$title?'<span class="sidebar-nav-header">'.$title.'</span>':'';

        return $titleMenu.'
        <ul>
        ' . $ret . '
        </ul>';
    }

    function sHeader($header,$subheader,$class=''){
    	$ret='<div class="page-header '.$class.'">
							<h1>
                                '.$header.'
                            </h1>
								<p>
									'.$subheader.'
								</p>
							
							<div id="systemAlert"></div>
						</div>';
		return $ret;
    }