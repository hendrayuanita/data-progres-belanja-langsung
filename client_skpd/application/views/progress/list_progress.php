            <?php $this->load->view('admin/header');?>
			<script>
				function printDiv(panelprint) {
				var printContents = document.getElementById(panelprint).innerHTML;
				var originalContents = document.body.innerHTML;

				document.body.innerHTML = printContents;
				window.print();

				document.body.innerHTML = originalContents;
}
			</script>
			<!-- PAGE CONTENT -->
            <div class="page-content">
                
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
                            <!-- Tables Goes Here :3 -->
							<!-- START BORDERED TABLE SAMPLE -->
                            <div class="panel panel-default" name="panelprint" id="printableArea">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Daftar Progress SKPD Bulan <?php echo $bulan ?> Tahun <?php echo $tahun ?></h3>
									<div class="pull-right">                                                                                    
									<button class="btn btn-default" onclick="printDiv('printableArea')"><span class="fa fa-print"></span> Cetak Halaman</button>
									</div>
                                </div>
                                <div class="panel-body" >
                                    <table class="table table-bordered">
                                        <thead>
										
                                            <tr>
                                                <th>Nama SKPD</th>
                                                <th width="40%">Progress</th>
												<th>Tanggal Input</th>
                                                <th>Total Pagu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php foreach($progress as $key) { 
											$skpd_nama         = $key->skpd_nama;
										?>
                                            <tr>
                                                <td><?php echo $key->skpd_nama ?></td>
												<?php 
												$query = $this->db->query("SELECT skpd_pagu, skpd_color FROM tbl_skpd WHERE skpd_nama = '$skpd_nama'");
												foreach ($query->result() as $row)
												{
												?>
                                                <td><div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $key->pengeluaran_nominal/$row->skpd_pagu*100; ?>%;background-color: <?php echo $row->skpd_color ?>"><?php echo $key->pengeluaran_nominal/$row->skpd_pagu*100; ?>%</div></td>
												<td><?php echo $key->pengeluaran_tgl ?></td>
                                                <td><?php echo $row->skpd_pagu ?></td>
												<?php } ?>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>                                
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
			<?php $this->load->view('admin/footer');?>