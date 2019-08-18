<?php
    $themeURL=site_url('system/template/'.$theme,true);
    $componentURL=$themeURL.'./src/HTML/';
?>
<!DOCTYPE html>
<html lang="en">
<head>        
    <title><?php print $systemTitle ?></title>
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <link rel="icon" type="image/ico" href="favicon.ico"/>
    
    <link href="<?php print $componentURL; ?>css/stylesheets.css" rel="stylesheet" type="text/css" />        
    
    <script type='text/javascript' src='<?php print $componentURL; ?>js/plugins/jquery/jquery.min.js'></script>
    <script type='text/javascript' src='<?php print $componentURL; ?>js/plugins/jquery/jquery-ui.min.js'></script>   
    <script type='text/javascript' src='<?php print $componentURL; ?>js/plugins/jquery/jquery-migrate.min.js'></script>
    <script type='text/javascript' src='<?php print $componentURL; ?>js/plugins/jquery/globalize.js'></script>    
    <script type='text/javascript' src='<?php print $componentURL; ?>js/plugins/bootstrap/bootstrap.min.js'></script>
    
    <script type='text/javascript' src='<?php print $componentURL; ?>js/plugins/uniform/jquery.uniform.min.js'></script>
    
    <script type='text/javascript' src='<?php print $componentURL; ?>js/plugins.js'></script>    
    <script type='text/javascript' src='<?php print $componentURL; ?>js/actions.js'></script>    
    <script type='text/javascript' src='<?php print $componentURL; ?>js/settings.js'></script>
</head>
<body class="bg-img-num1"> 
    
    <div class="container">        

        <div class="login-block">
            <div class="block block-transparent">
                <div class="head">
                    <div class="user">
                        <div class="info user-change">                                                                                
                            <img src="<?php print $componentURL; ?>img/example/user/dmitry_b.jpg" class="img-circle img-thumbnail"/>
                            <div class="user-change-button">
                                <span class="icon-off"></span>
                            </div>
                        </div>                            
                    </div>
                </div>
                <div class="content controls npt">
                    <div class="form-row user-change-row">
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="icon-user"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Login"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="icon-key"></span>
                                </div>
                                <input type="password" class="form-control" placeholder="Password"/>
                            </div>
                        </div>
                    </div>                        
                    <div class="form-row">
                        <div class="col-md-6">
                            <a href="#" class="btn btn-default btn-block btn-clean">Register</a>                                
                        </div>
                        <div class="col-md-6">
                            <a href="#" class="btn btn-default btn-block btn-clean">Log In</a>
                        </div>
                    </div>
                    <div class="form-row">                            
                        <div class="col-md-12">
                            <a href="#" class="btn btn-link btn-block">Forgot your password?</a>
                        </div>
                    </div>                         
                    <div class="form-row">
                        <div class="col-md-12 tac"><strong>OR USE</strong></div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <a href="#" class="btn btn-danger btn-block"><span class="icon-google-plus"></span> &nbsp; Google</a>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <a href="#" class="btn btn-primary btn-block"><span class="icon-twitter"></span> &nbsp; Tweeter</a>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>

    </div>

</body>
</html>