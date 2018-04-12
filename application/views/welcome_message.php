<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<meta charset="utf-8" />
	<title>Truva - Admin Dashboard Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
	<link rel="apple-touch-icon" href="truva/ico/60.png">
	<link rel="apple-touch-icon" sizes="76x76" href="truva/ico/76.png">
	<link rel="apple-touch-icon" sizes="120x120" href="truva/ico/120.png">
	<link rel="apple-touch-icon" sizes="152x152" href="truva/ico/152.png">
	<link rel="icon" type="image/x-icon" href="favicon.ico" />
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-touch-fullscreen" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="default">
	<meta content="" name="description" />
	<meta content="" name="author" />
	<link href="<?php echo base_url() ?>assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/plugins/bootstrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="<?php echo base_url() ?>assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="<?php echo base_url() ?>assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="<?php echo base_url() ?>truva/css/pages-icons.css" rel="stylesheet" type="text/css">
	<link class="main-stylesheet" href="<?php echo base_url() ?>truva/css/pages.css" rel="stylesheet" type="text/css" />
<!--[if lte IE 9]>
<link href="truva/css/ie9.css" rel="stylesheet" type="text/css" />
<![endif]-->
<script type="text/javascript">
	window.onload = function()
	{
	if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
		document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="truva/css/windows.chrome.fix.css" />'
	}
</script>
</head>
<body class="fixed-header ">
	<div class="login-wrapper ">
		<!-- START Login Background Pic Wrapper-->
		<div class="bg-pic">
			<!-- START Background Pic-->
			<img src="<?php echo base_url() ?>assets/img/bg.jpg" data-src="<?php echo base_url() ?>assets/img/bg.jpg" data-src-retina="<?php echo base_url() ?>assets/img/bg.jpg" alt="" class="lazy">
			<!-- END Background Pic-->
			<!-- START Background Caption-->
			<div class="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20">
				<h2 class="semi-bold text-white">
					Truva, önem verdiğiniz şeylerin tadını çıkarmanızı kolaylaştırır</h2>
					<p class="small">
						Copyright by Truva 2017
					</p>
				</div>
				<!-- END Background Caption-->
			</div>
			<!-- END Login Background Pic Wrapper-->
			<!-- START Login Right Container-->
			<div class="login-container bg-white">
				<div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
					<img src="<?php echo base_url() ?>assets/img/logo.png" alt="logo" data-src="assets/img/logo.png" data-src-retina="assets/img/logo_2x.png" width="78" height="22">
					<p class="p-t-35">Truva hesabınıza giriş yapın.</p>
					<!-- START Login Form -->
					<div class="alert alert-danger loginError unvisible" role="alert">
						<button class="close" data-dismiss="alert"></button>
						<strong>Hata: </strong>E-mail adresiniz veya şifreniz yanlış.
					</div>
					<form id="form-login" class="p-t-15" role="form">
						<!-- START Form Control-->
						<div class="form-group form-group-default required">
							<label>E-posta adresiniz</label>
							<div class="controls">
								<input type="email" name="username" class="form-control username" required data-msg="Lütfen geçerli bir e-posta adresi giriniz.">
							</div>
						</div>
						<!-- END Form Control-->
						<!-- START Form Control-->
						<div class="form-group form-group-default required">
							<label>Şifre</label>
							<div class="controls">
								<input type="password" class="form-control password" name="password" required data-msg="Bu alan zorunludur.">
							</div>
						</div>
						<!-- START Form Control-->
						<div class="row">
							<div class="col-md-6 no-padding">
								<div class="checkbox ">
									<input type="checkbox" value="1" id="checkbox1">
									<label for="checkbox1">Oturumumu sürekli açık tut.</label>
								</div>
							</div>
							<div class="col-md-6 text-right m-t-10">
								<a href="welcome/forgotPassword" class="text-info">Şifremi unuttum</a>
							</div>
						</div>
						<!-- END Form Control-->
						<button class="btn btn-complete btn-cons m-t-10" type="submit">Giriş Yap</button>
					</form>
				</div>
			</div>
			<!-- END Login Right Container-->
		</div>
		<div class="modal fade fill-in" id="modalFillIn" tabindex="-1" role="dialog" aria-labelledby="modalFillInLabel" aria-hidden="true">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		    <i class="pg-close"></i>
		</button>
		<div class="modal-dialog ">
		    <div class="modal-content">
		        <div class="modal-header">
		            <h2 class="text-center p-b-5"><span class="semi-bold">Giriş yapılıyor...</span></h2>
		        </div>
		        <div class="modal-body">
		        </div>
		        <div class="modal-footer">
		        </div>
		    </div>
		    <!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
		</div>
		<!-- BEGIN VENDOR JS -->
		<script src="<?php echo base_url() ?>assets/plugins/pace/pace.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery-1.11.1.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url() ?>assets/plugins/modernizr.custom.js" type="text/javascript"></script>
		<script src="<?php echo base_url() ?>assets/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url() ?>assets/plugins/bootstrapv3/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery-easy.js" type="text/javascript"></script>
		<script src="<?php echo base_url() ?>assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url() ?>assets/plugins/jquery-bez/jquery.bez.min.js"></script>
		<script src="<?php echo base_url() ?>assets/plugins/jquery-ios-list/jquery.ioslist.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url() ?>assets/plugins/jquery-actual/jquery.actual.min.js"></script>
		<script src="<?php echo base_url() ?>assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/select2/js/select2.full.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/classie/classie.js"></script>
		<script src="<?php echo base_url() ?>assets/plugins/switchery/js/switchery.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url() ?>assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
		<!-- END VENDOR JS -->
		<script src="<?php echo base_url() ?>truva/js/pages.min.js"></script>
		<script src="<?php echo base_url() ?>communication/1/socket.io.js"></script>
		<script>
			/*var webSocket = new WebSocket("ws://truva.co:6061/");
			/*while (webSocket.readyState == 0)
			{
				//console.log("Bağlanıyorum.");
			}
			if (webSocket.readyState == 1)
			{
			    webSocket.send("Onur");
			}
			*/
			$(function()
			{
				$('#form-login').validate({
					submitHandler: function(form) {
						$(".loginError").addClass("unvisible");
						login();
					  }
				})
			})
			function login(){
				var username = $(".username").val();
				var password = $(".password").val();
				//Pace.restart();
				$.ajax({
					type:"POST",
					url:"/welcome/login",
					dataType:"json",
					data:{identity:username,password:password},
					success:function(data){
						Pace.stop();
						if(data.success){
							$("#modalFillIn").modal();
							setTimeout(function(){
								location.href = "dashboard";
							},1000);
						}else{
							$(".loginError").removeClass("unvisible");
						}
					}
				})
			}
		</script>
		
	</body>
	</html>