
<?php 
	session_start();
	include '../dbconnect.php';
	
  


    if(isset($_POST['editmethod']))
    {
        $edit_id = $_POST['edit_id'];
        $edit_metode = $_POST['edit_metode'];
        $edit_norek = $_POST['edit_norek'];
        $edit_an = $_POST['edit_an'];
        $edit_logo = $_POST['edit_logo'];

        $editmet = mysqli_query($conn, "UPDATE pembayaran SET metode='$edit_metode', norek='$edit_norek', an='$edit_an', logo='$edit_logo' WHERE no='$edit_id'");

        if ($editmet) {
            echo "<meta http-equiv='refresh' content='1; url= pembayaran.php'/>";
        } else {
            echo "<meta http-equiv='refresh' content='1; url= pembayaran.php'/>";
        }
    }


	if(isset($_POST['addmethod']))
	{
		$metode = $_POST['metode'];
		$norek = $_POST['norek'];
		$an = $_POST['an'];
		$logo = $_POST['logo'];
			  
		$tambahmet = mysqli_query($conn,"insert into pembayaran (metode,norek,an,logo) values ('$metode','$norek','$an','$logo')");
		if ($tambahmet){
		echo "
		<meta http-equiv='refresh' content='1; url= pembayaran.php'/>  ";
		} else { echo "
		 <meta http-equiv='refresh' content='1; url= pembayaran.php'/> ";
		}
		
	};
	?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
	<link rel="icon" 
      type="image/png" 
      href="../favicon.png">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kelola Metode Pembayaran - Bandeng Bu Yuwono</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
	
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
	<!-- Start datatable css -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
	
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
							<li><a href="index.php"><span>Home</span></a></li>
							<li><a href="../"><span>Kembali ke Toko</span></a></li>
							<li>
                                <a href="manageorder.php"><i class="ti-dashboard"></i><span>Kelola Pesanan</span></a>
                            </li>
							<li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout"></i><span>Kelola Toko
                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="kategori.php">Kategori</a></li>
                                    <li><a href="produk.php">Produk</a></li>
									<li class="active"><a href="pembayaran.php">Metode Pembayaran</a></li>
                                </ul>
                            </li>
							<li><a href="customer.php"><span>Kelola Pelanggan</span></a></li>
							<li><a href="user.php"><span>Kelola Staff</span></a></li>
                            <li>
                                <a href="../logout.php"><span>Logout</span></a>
                                
                            </li>
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li><h3><div class="date">
								<script type='text/javascript'>
						// <!--
						var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
						var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
						var date = new Date();
						var day = date.getDate();
						var month = date.getMonth();
						var thisDay = date.getDay(),
							thisDay = myDays[thisDay];
						var yy = date.getYear();
						var year = (yy < 1000) ? yy + 1900 : yy;
						document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);		
						//-->
						</script></b></div></h3>

						</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            
            <!-- page title area end -->
            <div class="main-content-inner">
               
                <!-- market value area start -->
                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
									<h2>Daftar Metode Pembayaran</h2>
									<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2">Tambah Metode</button>
                                </div>
                                    <div class="data-tables datatable-dark">
										 <table id="dataTable3" class="display" style="width:100%"><thead class="thead-dark">
											<tr>
												<th>No.</th>
												<th>Nama Metode</th>
												<th>No.Rek</th>
												<th>Atas Nama</th>
												<th>URL Logo</th>
                                                <th>Aksi</th>
											</tr></thead><tbody>
											<?php 
											$brgs=mysqli_query($conn,"SELECT * from pembayaran order by no ASC");
											$no=1;
											while($p=mysqli_fetch_array($brgs)){
												$id = $p['no'];

												?>
												
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $p['metode'] ?></td>
													<td><?php echo $p['norek'] ?></td>
													<td><?php echo $p['an'] ?></td>
													<td><?php echo $p['logo'] ?></td>

                                                  		<td>
                                                       
                                                       <!-- Edit button -->
                                                        <a href="javascript:void(0)" class="btn btn-warning" onclick="showUpdateModal(
                                                            '<?php echo $p['no']; ?>',
                                                            '<?php echo $p['metode']; ?>',
                                                            '<?php echo $p['norek']; ?>',
                                                            '<?php echo $p['an']; ?>',
                                                            '<?php echo $p['logo']; ?>'
                                                        )">Edit</a>





                                                       <!-- Delete button -->
                                                        <a href="proses_hapus_pembayaran.php?id=<?php echo $p['no']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                                                    </td>


													
												</tr>		
												
												<?php 
											}
											
											?>
										</tbody>
										</table>
                                    </div>
								 </div>
                            </div>
                        </div>
                    </div>
                </div>
              
                
                <!-- row area start-->
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>By Kelompok 1</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
	
	<!-- modal input -->
			<div id="myModal" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Tambah Metode</h4>
						</div>
						<div class="modal-body">
							<form method="post">
								<div class="form-group">
									<label>Nama Metode</label>
									<input name="metode" type="text" class="form-control" required autofocus>
								</div>
								<div class="form-group">
									<label>No. Rekening</label>
									<input name="norek" type="text" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Atas Nama</label>
									<input name="an" type="text" class="form-control" required>
								</div>
								<div class="form-group">
									<label>URL Logo</label>
									<input name="logo" type="text" class="form-control" required>
								</div>

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
								<input name="addmethod" type="submit" class="btn btn-primary" value="Tambah">
							</div>
						</form>
					</div>
				</div>
			</div>

                <!-- Edit Modal -->
                <div id="editModal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Metode</h4>
                            </div>
                            <div class="modal-body">
                                <!-- Form for editing data -->
                                <form method="post" action="proses_edit_pembayaran.php">
                                    <div class="form-group">
                                        <label for="edit_metode">Nama Metode</label>
                                        <input type="text" class="form-control" id="edit_metode" name="edit_metode" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="edit_norek">No. Rekening</label>
                                        <input type="text" class="form-control" id="edit_norek" name="edit_norek" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="edit_an">Atas Nama</label>
                                        <input type="text" class="form-control" id="edit_an" name="edit_an" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="edit_logo">URL Logo</label>
                                        <input type="text" class="form-control" id="edit_logo" name="edit_logo" required>
                                    </div>
                                    <!-- Hidden input to pass the Metode Pembayaran ID -->
                                    <input type="hidden" name="edit_id" id="edit_id">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary" name="editmethod">Simpan Perubahan</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>



	
	<script>
	$(document).ready(function() {
    $('#dataTable3').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
	} );
	</script>
	
	<!-- jquery latest version -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
		<!-- Start datatable js -->
	 <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
	
    <script>
    // Function to set values for the modal fields
    function showUpdateModal(id, metode, norek, an, logo) {
        // Set values for the modal fields
        $("#editModal input[name='edit_id']").val(id);
        $("#editModal input[name='edit_metode']").val(metode);
        $("#editModal input[name='edit_norek']").val(norek);
        $("#editModal input[name='edit_an']").val(an);
        $("#editModal input[name='edit_logo']").val(logo);

        // Show the modal
        $("#editModal").modal("show");
    }
</script>

<script>
		function confirmDelete(id) {
			// Tampilkan konfirmasi hapus menggunakan sweetalert atau modal
			var confirmDelete = confirm('Apakah Anda yakin ingin menghapus produk ini?');
			if (confirmDelete) {
				// Lakukan pengiriman data hapus menggunakan AJAX atau akses file hapus langsung
				// Implementasikan sesuai kebutuhan Anda
				window.location.href = 'proses_hapus_pembayaran.php?id=' + id;
			} else {
				// Batalkan operasi hapus
			}
		}
	</script>


</body>
</html>
