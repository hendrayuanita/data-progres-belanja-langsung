<?php $this->load->view('admin/header');?>
 <!-- PAGE CONTENT -->
            <div class="page-content">
                <?php echo form_open('pengeluaran/editpage/'.$this->uri->segment(3)); ?>
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
                            <input type="text" disabled name="search" placeholder="Search..."/>
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
                            <?php foreach($pengeluaran as $c){ ?>
                            <form class="form-horizontal" action="<?php echo site_url() ?>/Pengeluaran/edit/<?php echo $c->pengeluaran_id?>" method="post" enctype="multipart/form-data"> 
							<?php $name=$this->session->userdata('nama'); ?>
							<input type="hidden" name="pengeluaran_id" value="<?php echo $c->pengeluaran_id?>">						
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Form</strong> Edit Pengeluaran</h3>
                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>
                                </div>
								
                                <div class="panel-body">   
									
									<div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">SKPD</label>
                                        <div class="col-md-6 col-xs-12"> 
                                            <select name="skpd_nama" class="form-control select">
											<option value="<?php echo $c->skpd_nama ?>"><?php echo $c->skpd_nama ?></option>
												<?php 
												$query = $this->db->query("SELECT * FROM tbl_skpd;");
												?>
												<?php foreach ($query->result() as $skpd){
												?>
                                                <option value="<?php echo $skpd->skpd_nama ?>"><?php echo $skpd->skpd_nama ?></option>
												<?php } ?>
                                            </select>
                                            <span class="help-block">Pilih SKPD</span>
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Nominal Pengeluaran</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" value="<?php echo $c->pengeluaran_nominal ?>" name="pengeluaran_nominal" class="form-control"/>
                                            </div>                                            
                                            <span class="help-block">Contoh : 1000000</span>
                                        </div>
                                    </div>
									
									<div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Tanggal Pengeluaran</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                <input type="text" value="<?php echo $c->pengeluaran_tgl ?>" name="pengeluaran_tgl" class="form-control datepicker">                                            
                                            </div>
                                            <span class="help-block">Format yyyy/mm/dd</span>
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Ditulis Oleh</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" readonly name="pengeluaran_added_by" value="<?php echo $name ?>" class="form-control"/>
                                            </div>                                            
                                            <span class="help-block">Akun yang mengisikan data ini</span>
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