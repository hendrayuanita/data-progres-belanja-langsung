<?php $this->load->view('admin/header');?>
 <!-- PAGE CONTENT -->
            <div class="page-content">
                <?php echo form_open('admin/editpage/'.$this->uri->segment(3)); ?>
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                    <!-- SEARCH -->
                    <li class="xn-search">
                        <form role="form">
                            <input type="text" name="search" placeholder="Search..."/>
                        </form>
                    </li>
                    <!-- END SEARCH -->
                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
                    </li> 
                    <!-- END SIGN OUT -->
                    
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                     

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li class="active">Dashboard</li>
                </ul>
                <!-- END BREADCRUMB --> 
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">
                            <?php foreach($admin as $u){ ?>
                            <form class="form-horizontal" action="<?php echo site_url() ?>/Admin/edit/<?php echo $u->admin_id?>" method="post" enctype="multipart/form-data"> 
							<input type="hidden" name="admin_id" value="<?php echo $u->admin_id?>">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Form</strong> Edit Admin</h3>
                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>
                                </div>
								
                                <div class="panel-body">   

									<div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Email</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="email" name="admin_email" value="<?php echo $u->admin_email ?>" class="form-control"/>
                                            </div>                                            
                                            <span class="help-block">Email Valid</span>
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Password</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="password" name="admin_password" value="<?php echo $u->admin_password ?>" class="form-control"/>
                                            </div>                                            
                                            <span class="help-block">Email Valid</span>
                                        </div>
                                    </div>
									
									
									<div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Nama</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="admin_nama" value="<?php echo $u->admin_nama ?>" class="form-control"/>
                                            </div>                                            
                                            <span class="help-block">Nama Anda</span>
                                        </div>
                                    </div>
                                   
									<div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Nomor Telp</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="admin_nomor_telp" value="<?php echo $u->admin_nomor_telp ?>" class="form-control"/>
                                            </div>                                            
                                            <span class="help-block">Contoh : +628984325671</span>
                                        </div>
                                    </div>
									
                                 <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Gambar</label>
                                        <div class="col-md-6 col-xs-12">    
											<img class="img-thumbnail" src="<?php echo base_url() . 'assets/images/'.$u->admin_gambar  ?>"/></a>
                                            <input type="file" class="fileinput btn-primary" name="admin_gambar" id="filename" title="Browse file"/>
                                            <span class="help-block">File tipe yang diterima .JPG dan Resolusi <3000px</span>
											
                                        </div>
                                    </div>
								 
                                </div>
                                <div class="panel-footer">
                                    <button class="btn btn-default">Clear Form</button>                                    
                                    <button class="btn btn-primary pull-right">Submit</button>
                                </div>
                            </div>
                            </form>
                            <?php } ?>
                        </div>
                    </div>                    
                    
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                                
            </div>            
            <!-- END PAGE CONTENT -->
<?php $this->load->view('admin/footer');?>