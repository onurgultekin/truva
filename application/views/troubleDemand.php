<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Truva - Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    <link rel="apple-touch-icon" href="pages/ico/60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="pages/ico/76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="pages/ico/120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="pages/ico/152.png">
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
    <link href="<?php echo base_url() ?>assets/plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>assets/plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="<?php echo base_url() ?>assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css" media="screen">
    <link href="<?php echo base_url() ?>assets/plugins/summernote/css/summernote.css" rel="stylesheet" type="text/css" media="screen">
    <link href="<?php echo base_url() ?>assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" media="screen">
    <link href="<?php echo base_url() ?>assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" media="screen">
    <link href="<?php echo base_url() ?>truva/css/pages-icons.css" rel="stylesheet" type="text/css">
    <link class="main-stylesheet" href="<?php echo base_url() ?>truva/css/pages.css" rel="stylesheet" type="text/css" />
    <!--[if lte IE 9]>
	<link href="<?php echo base_url() ?>assets/plugins/codrops-dialogFx/dialog.ie.css" rel="stylesheet" type="text/css" media="screen" />
	<![endif]-->
  </head>
  <body class="fixed-header ">
    <?php $this->load->view("sidebar"); ?>
    <!-- START PAGE-CONTAINER -->
    <div class="page-container ">
      <!-- START HEADER -->
      <?php $this->load->view("header"); ?>
      <!-- END HEADER -->
      <!-- START PAGE CONTENT WRAPPER -->
      <div class="page-content-wrapper ">
        <!-- START PAGE CONTENT -->
        <div class="content ">
          <!-- START JUMBOTRON -->
          <div class="jumbotron  no-margin" data-pages="parallax">
            <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
            <div class="inner" style="transform: translateY(0px); opacity: 1;">
            <h3 class="">Arıza / Talep Listesi</h3>
            </div>
            </div>
            </div>
          <!-- END JUMBOTRON -->
          <!-- START CONTAINER FLUID -->
          <div class="container-fluid container-fixed-lg m-t-10">
            <!-- BEGIN PlACE PAGE CONTENT HERE -->
            <div class="row">
              <div class="col-md-4 pull-right">
              <button class="btn btn-primary pull-right addNewTechnicalServiceForm m-b-10" data-toggle="modal" data-target="#addNewTechnicalServiceFormModal">Yeni Arıza / Talep Ekle</button>
              </div>
              <div class="col-md-4 pull-left" style="padding-left: 0px">
                <div class="col-xs-12">
                <input type="text" id="search-table" class="form-control pull-left" placeholder="Arıza / Talep Ara">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
              <table class="table table-striped" id="tableWithExportOptions">
              <thead>
              <tr>
              <th>Bildirme Tipi</th>
              <th>Başlangıç Tarihi</th>
              <th>Bitiş Tarihi</th>
              <th>Bildiren</th>
              <th>Tamamlayan</th>
              <th>Açıklama</th>
              <th>Öncelik</th>
              <th>Durum</th>
              <th class="no-sort"></th>
              </tr>
              </thead>
              <tbody>
                <?php
                foreach ($technicalServiceForms as $key => $technicalServiceForm) {
                  $labelClassForPriority = 'label label-info';
                  $labelClassForStatus = 'label label-inverse';
                  if($technicalServiceForm->technicalServicePriorityID == 1){
                    $labelClassForPriority = 'label label-danger';
                  }
                  if($technicalServiceForm->technicalServiceStatusID == 2){
                    $labelClassForStatus = 'label label-success';
                  }
                  if($technicalServiceForm->technicalServiceStatusID == 3){
                    $labelClassForStatus = 'label label-warning';
                  }
                  if($technicalServiceForm->technicalServiceStatusID == 4){
                    $labelClassForStatus = 'label label-danger';
                  }
                  echo '<tr id="'.$technicalServiceForm->technicalServiceFormID.'">
                    <td>'.$technicalServiceForm->ReceivedBy.'</td>
                    <td>'.$technicalServiceForm->beginDate.' '.$technicalServiceForm->beginTime.'</td>
                    <td>'.$technicalServiceForm->endDate.' '.$technicalServiceForm->endTime.'</td>
                    <td>'.$technicalServiceForm->declaredUser.'</td>
                    <td>'.$technicalServiceForm->completedUser.'</td>
                    <td>'.$technicalServiceForm->description.'</td>
                    <td><span class="'.$labelClassForPriority.'">'.$technicalServiceForm->Priority.'</span></td>
                    <td><span class="'.$labelClassForStatus.'">'.$technicalServiceForm->EventStatus.'</span></td>
                    <td><div class="pull-left"><button class="btn btn-warning getTechnicalServiceFormDetails btn-xs" id="duzenle">Düzenle</button><button class="btn btn-info handleTechnicalServiceFormModal btn-xs m-r-5 m-l-5">Al</button><button class="btn btn-danger completeTechnicalServiceFormModal btn-xs">Tamamla</button></div></td>
                  </tr>';
                }
                ?>
              </tbody>
            </table>
              </div>
            </div>
            <!-- END PLACE PAGE CONTENT HERE -->
          </div>
          <!-- END CONTAINER FLUID -->
        </div>
        <!-- END PAGE CONTENT -->
        <!-- START COPYRIGHT -->
        <!-- START CONTAINER FLUID -->
        <!-- START CONTAINER FLUID -->
        <?php $this->load->view("footer"); ?>
        <!-- END COPYRIGHT -->
      </div>
      <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <div class="modal fade stick-up disable-scroll" id="modalSlideUp" role="dialog" aria-hidden="false">
      <div class="modal-dialog ">
        <div class="modal-content-wrapper">
          <div class="modal-content">
            <div class="modal-header clearfix text-left">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
              </button>
              <h5>Arıza / Talep <span class="semi-bold">Bilgileri</span></h5>
              <p class="p-b-10">Aşağıda günlük kişi ile ilgili bilgileri bulabilirsiniz.</p>
            </div>
            <div class="modal-body">
              <form role="form" id="updateTechnicalServiceFormData">
                <div class="form-group appendTechnicalServiceFormDataHere">
                </div>
                <button type="submit" class="btn btn-primary m-t-5 updateTechnicalServiceForm">Bilgileri Düzenle</button>
                <div class="alert alert-success updateModalError unvisible m-t-10"></div>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="modal fade stick-up disable-scroll" id="addNewTechnicalServiceFormModal" role="dialog" aria-hidden="false">
      <div class="modal-dialog ">
        <div class="modal-content-wrapper">
          <div class="modal-content">
            <div class="modal-header clearfix text-left">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
              </button>
              <h5>Yeni Günlük Kişi <span class="semi-bold">Ekle</span></h5>
            </div>
            <div class="modal-body" style="overflow:hidden;">
              <form role="form" class="form-group" id="appendNewTechnicalServiceFormData">
              <?php
             $i=0;
              echo '<div class="row">';
              foreach ($formFields as $key => $field) {
                $i++;
                $message = "Bu alan zorunludur";
                if($field["type"] == "email"){
                  $message = "Lütfen geçerli bir mail adresi giriniz.";
                }
                $class = "";
                if($field["type"] == "hidden"){
                  $class ="unvisible";
                }
                if($i%2==1 && $i!=1){
                  echo '</div><div class="row">';
                }
                if($field["type"]!="select"){
                  echo '<div class="col-sm-6">
                  <div class="form-group form-group-default required '.$class.' ">
                    <label>'.$field["name"].':</label>
                    <div class="controls">
                      <input type="'.$field["type"].'" class="form-control" name="'.$field["id"].'" id="'.$field["id"].'" required data-msg="'.$message.'">
                    </div>
                  </div>
                </div>';
                }else{
                  if($field["id"] == "completedUserID" || $field["id"] == "receivedUserID" || $field["id"] == "declaredUserID"){
                    echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2 required">
                    <label class="">'.$field["name"].'</label>
                    <select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Ülke seçin" data-init-plugin="select2">
                      <option value="0">Lütfen seçin</option>';
                      if($field["id"] == "completedUserID" || $field["id"] == "receivedUserID"){
                        foreach ($technicalServiceUsers as $key => $technicalServiceUser) {
                          echo '<option value='.$technicalServiceUser->id.'>'.$technicalServiceUser->yetkili_kisi.'</option>';
                        }
                      }
                      if($field["id"] == "declaredUserID"){
                        foreach ($users as $key => $user) {
                          echo '<option value='.$user->id.'>'.$user->first_name.' '.$user->last_name.'</option>';
                        }
                      }
                      echo '</select>
                    </div></div>';
                  }else
                  if($field["id"] == "tapID"){
                    echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2 required">
                    <label class="">'.$field["name"].'</label>
                    <select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Şirket Tipi seçin" data-init-plugin="select2">
                      <option value="0">Lütfen seçin</option>';
                      foreach ($taps as $key => $tap) {
                        echo '<option value='.$tap->TapID.'>'.$tap->Name.'</option>';
                      }
                      echo '</select>
                    </div></div>';
                  }else
                  if($field["id"] == "CompanyID"){
                    echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2 required">
                    <label class="">'.$field["name"].'</label>
                    <select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Şirket Tipi seçin" data-init-plugin="select2">
                      <option value="0">Lütfen seçin</option>';
                      foreach ($companies as $key => $company) {
                        echo '<option value='.$company->CompanyID.'>'.$company->CompanyName.'</option>';
                      }
                      echo '</select>
                    </div></div>';
                  }else
                  if($field["id"] == "technicalServiceReportTypeID"){
                    echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2 required">
                    <label class="">'.$field["name"].'</label>
                    <select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Şirket Tipi seçin" data-init-plugin="select2">
                      <option value="0">Lütfen seçin</option>';
                      foreach ($technicalServiceReportTypes as $key => $technicalServiceReportType) {
                        echo '<option value='.$technicalServiceReportType->TechnicalServiceReportTypeID.'>'.$technicalServiceReportType->Name.'</option>';
                      }
                      echo '</select>
                    </div></div>';
                  }else
                  if($field["id"] == "technicalServicePriorityID"){
                    echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2 required">
                    <label class="">'.$field["name"].'</label>
                    <select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Şirket Tipi seçin" data-init-plugin="select2">
                      <option value="0">Lütfen seçin</option>';
                      foreach ($technicalServicePriorities as $key => $technicalServicePriority) {
                        echo '<option value='.$technicalServicePriority->TechnicalServicePriorityID.'>'.$technicalServicePriority->Name.'</option>';
                      }
                      echo '</select>
                    </div></div>';
                  }else
                  if($field["id"] == "technicalServiceStatusID"){
                    echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2 required">
                    <label class="">'.$field["name"].'</label>
                    <select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Şirket Tipi seçin" data-init-plugin="select2">
                      <option value="0">Lütfen seçin</option>';
                      foreach ($technicalServiceStatuses as $key => $technicalServiceStatus) {
                        echo '<option value='.$technicalServiceStatus->TechnicalServiceStatusID.'>'.$technicalServiceStatus->Name.'</option>';
                      }
                      echo '</select>
                    </div></div>';
                  }else{
                    echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2 required">
                    <label class="">'.$field["name"].'</label>
                    <select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" '.$field["disabled"].' data-placeholder="Ülke seçin" data-init-plugin="select2">
                      <option value="0">Lütfen seçin</option>
                    </select>
                  </div></div>';
                  }
                }
              }
              ?>
              <div class="clearfix"></div>
                <button type="submit" class="btn btn-primary addNewTechnicalServiceFormButton">Yeni Günlük Kişi Ekle</button>
                <div class="alert alert-success modalError unvisible m-t-10"></div>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="modal fade slide-right" id="modalSlideLeft" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm">
      <div class="modal-content-wrapper">
      <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
      </button>
      <div class="container-xs-height full-height">
      <div class="row-xs-height">
      <div class="modal-body col-xs-height col-middle text-center   ">
      <h5 class="text-primary "><span class="semi-bold TechnicalServiceFormNameinModal"></span> adlı şirkete ait günlük kişi sayısını silmek istediğinizden emin misiniz? Lütfen bu işlemi geri alamayacağınızı unutmayın.</h5>
      <br>
      <button type="button" class="btn btn-success btn-block deleteTechnicalServiceFormButton">Evet</button>
      <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Hayır</button>
      <div class="alert alert-success m-t-10 deleteModalError unvisible"></div>
      </div>
      </div>
      </div>
      </div>
      </div>
       
      </div>
       
      </div>
    <!-- END PAGE CONTAINER -->
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
    <!-- END VENDOR JS -->
    <!-- BEGIN CORE TEMPLATE JS -->
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="<?php echo base_url() ?>assets/js/functions.js?v=<?php echo time(); ?>" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/jquery-inputmask/jquery.inputmask.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/jquery-datatable/media/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/plugins/jquery-datatable/media/js/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/lodash.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/moment/moment.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/scripts.js?v=<?php echo time(); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/jquery-autonumeric/autoNumeric.js"></script>
    <script src="<?php echo base_url() ?>truva/js/pages.min.js"></script>
    <script type="text/javascript">
      $(function(){
        initTable(187);
        $('#beginDate,#endDate').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
          }).on("changeDate",function(){
            $(this).trigger("focus").trigger("blur");
          })
        getDetails(".getTechnicalServiceFormDetails","/general/getTechnicalServiceFormById","TechnicalServiceFormId",".appendTechnicalServiceFormDataHere");
        $("#appendNewTechnicalServiceFormData").validate({
          submitHandler: function(form) {
            addNewTechnicalServiceForm();
            }
        });
        $("#updateTechnicalServiceFormData").validate({
          submitHandler: function(form) {
            updateTechnicalServiceForm();
            }
        });
        $("#addNewTechnicalServiceFormModal").on("shown.bs.modal",function(){
          setTimeout(function () {
            $('select').select2();
            $("#TotalGuest").autoNumeric('init', {
              aSep: '',
              aPad: false
            });
          }, 300);
        })
      })
    </script>
    <!-- END PAGE LEVEL JS -->
  </body>
</html>