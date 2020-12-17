<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>Login - Tiketayas.com</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="<?php echo base_url(); ?>assets/favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url(); ?>assets/css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->                                    
    </head>
    <body>
        
        <div class="login-container">
        
            <div class="login-box animated fadeInDown">
                <div class="login-logo"></div>
                <div class="login-body">
                    <div class="login-title"><strong>Daftar</strong> Untuk Melanjutkan</div>
                    <form action="<?php echo site_url() ?>/user/register_user" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" name="nama_user" class="form-control" placeholder="nama_user"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" name="jenis_kelamin" class="form-control" placeholder="jenis_kelamin"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" name="username" class="form-control" placeholder="username"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" name="password" class="form-control" placeholder="password"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" name="alamat" class="form-control" placeholder="alamat"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" name="no_telp" class="form-control" placeholder="no_telp"/>
                        </div>
                    </div>
                    <div class="form-group">
                    <!--     <div class="col-md-6">
                            <a href="#" class="btn btn-link btn-block">Lupa Password ?</a>
                        </div> -->
                        <div class="col-md-6">
                            <button class="btn btn-info btn-block">Daftar</button>
                        </div>
                    </div>
                    <div class="login-subtitle">
                       Sudah Punya Akun !? \(0_0)/ <a href="<?php echo site_url()?>/user/log">Log In Akun Disini ! \(^o^\)</a>
                    </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2018 Negev With Rahma Nuzula & Rinjang Esa
                    </div>
                    <div class="pull-left">
                        <a href="#">About</a> |
                        <a href="#">Privacy</a> |
                        <a href="#">Contact Us</a>
                    </div>
                </div>
            </div>
            
        </div>
        
    </body>
</html>






