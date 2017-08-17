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
    <link class="main-stylesheet" href="<?php echo base_url() ?>truva/css/pages.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
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
            <h3 class="">Holding Listesi</h3>
            </div>
            </div>
            </div>
          <!-- END JUMBOTRON -->
          <!-- START CONTAINER FLUID -->
          <div class="container-fluid container-fixed-lg m-t-10">
            <!-- BEGIN PlACE PAGE CONTENT HERE -->

                <div class="row">
              <div class="col-md-12">
                <div class="sm-m-l-5 sm-m-r-5">
                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                      <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                             Filtreleme
                            </a>
                          </h4>
                      </div>
                      <div id="collapseOne" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
                      <div class="row">
                        <div class="col-md-12">
                        <div class="panel-body" style="padding-top: 0px">
                        <h5>Adres</h5>
                        <div class="col-md-3 form-group form-group-default form-group-default-select2 required">
                        <label class="">Ülke seçin</label>
                          <select class="full-width countries" data-placeholder="Ülke seçin" data-init-plugin="select2">
                          <option value="0">Lütfen seçin</option>
                            <?php 
                            foreach ($countries as $key => $country) {
                              echo '<option value='.$country->CountryID.'>'.$country->CountryName.'</option>';
                            }
                            ?>
                          </select>
                        </div>
                        <div class="col-md-3 form-group form-group-default form-group-default-select2 required">
                        <label class="">Şehir seçin</label>
                          <select class="full-width cities disabled" disabled="disabled" data-placeholder="Şehir seçin" data-init-plugin="select2">
                            <option value="0">Lütfen seçin</option>
                          </select>
                        </div>
                        <div class=" col-md-3 form-group form-group-default form-group-default-select2 required">
                        <label class="">İlçe seçin</label>
                          <select class="full-width districts disabled" disabled="disabled" data-placeholder="İlçe seçin" data-init-plugin="select2">
                            <option value="0">Lütfen seçin</option>
                          </select>
                        </div>
                        <div class="col-md-3 form-group form-group-default form-group-default-select2 required">
                        <label class="">Semt seçin</label>
                          <select class="full-width areas disabled" disabled="disabled" data-placeholder="Semt seçin" data-init-plugin="select2">
                            <option value="0">Lütfen seçin</option>
                          </select>
                        </div>
                        </div>
                        </div>
                        </div>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 pull-left"  style="padding:0">
                <div class="col-xs-12">
                <input type="text" id="search-table" class="form-control" placeholder="Holding Ara">
                </div>
              </div>
              <div class="col-md-8 pull-right">
              <button class="btn btn-primary pull-right addNewHolding" data-toggle="modal" data-target="#addNewHoldingModal">Yeni Holding Ekle</button>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
              <table class="table table-striped" id="tableWithExportOptions">
              <thead>
              <tr>
              <th>Holding Adı</th>
              <th>Email</th>
              <th>Telefon</th>
              <th>İl</th>
              <th>İlçe</th>
              <th>Semt</th>
              <th class="no-sort"></th>
              </tr>
              </thead>
              <tbody>
                <?php
                foreach ($holdings as $key => $holding) {
                  echo '<tr id="'.$holding->HoldingID.'">
                    <td>'.$holding->HoldingName.'</td>
                    <td>'.$holding->HoldingEmail.'</td>
                    <td>'.$holding->HoldingTelephone.'</td>
                    <td>'.$holding->CityName.'</td>
                    <td>'.$holding->CountyName.'</td>
                    <td>'.$holding->AreaName.'</td>
                    <td><div class="pull-left"><button class="btn btn-primary getCompanyByHoldingId btn-xs" id= "'.$holding->HoldingID.'">Detay</button><button class="btn btn-warning getHoldingDetails btn-xs m-l-10 m-r-10">Düzenle</button><button class="btn btn-danger deleteHoldingModal btn-xs">Sil</button></div></td>
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
    <div class="modal fade stick-up disable-scroll" id="showHoldingCompanies" tabindex="-1" role="dialog" aria-hidden="false">
      <div class="modal-dialog modal-lg">
        <div class="modal-content-wrapper">
          <div class="modal-content">
            <div class="modal-header clearfix text-left">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
              </button>
              <h5>Holding'e ait şirket <span class="semi-bold">bilgileri</span></h5>
              <p class="p-b-10">Aşağıda holdinge ait şirket bilgilerini bulabilirsiniz.</p>
            </div>
            <div class="modal-body">
              <table class="table table-striped">
                <thead>
                  <th>Adı</th>
                  <th>Tipi</th>
                  <th>Adresi</th>
                </thead>
                <tbody>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="modal fade slide-up disable-scroll" id="modalSlideUpSmall" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-sm">
      <div class="modal-content-wrapper">
      <div class="modal-content">
      <div class="modal-body text-center m-t-20">
      <h4 class="no-margin p-b-10">Bu holding'e ait şirket yok.</h4>
      <button type="button" class="btn btn-primary btn-cons" data-dismiss="modal">Tamam</button>
      </div>
      </div>
      </div>
       
      </div>
      </div>
    <div class="modal fade stick-up disable-scroll" id="modalSlideUp" tabindex="-1" role="dialog" aria-hidden="false">
      <div class="modal-dialog ">
        <div class="modal-content-wrapper">
          <div class="modal-content">
            <div class="modal-header clearfix text-left">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
              </button>
              <h5>Holding <span class="semi-bold">Bilgileri</span></h5>
              <p class="p-b-10">Aşağıda holding ile ilgili bilgileri bulabilirsiniz.</p>
            </div>
            <div class="modal-body">
              <form role="form" name="updateHoldingData" id="updateHoldingData">
                <div class="form-group appendHoldingDataHere">
                </div>
                <button type="submit" class="btn btn-primary m-t-5">Bilgileri Düzenle</button>
                <div class="alert alert-success updateModalError unvisible m-t-10"></div>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
   <div class="modal fade stick-up disable-scroll" id="addNewHoldingModal" role="dialog" aria-hidden="false">
      <div class="modal-dialog ">
        <div class="modal-content-wrapper">
          <div class="modal-content">
            <div class="modal-header clearfix text-left">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
              </button>
              <h5>Yeni Holding <span class="semi-bold">Ekle</span></h5>
            </div>
            <div class="modal-body">
              <form role="form" class="form-group" id="appendNewHoldingData">
              <?php
              $i = 0; 
              echo '
              <div class="row">
              ';
              foreach ($formFields as $key => $field) {
                $i++;
                $message = "Bu alan zorunludur";
                if($field["type"] == "email"){
                  $message = "Lütfen geçerli bir mail adresi giriniz.";
                }
                if($i%2==1 && $i!=1){
                    echo '</div>
                    <div class="row">
                    ';
                  }
                if($field["type"]!="select"){
                  echo '
                  <div class="col-sm-6">
                        <div class="form-group form-group-default required">
                          <label>'.$field["name"].':</label>
                          <div class="controls">
                          <input type="'.$field["type"].'" class="form-control" name="'.$field["id"].'" id="'.$field["id"].'" required data-msg="'.$message.'">
                          </div>
                        </div>
                  </div>';
                }else{
                  if($field["id"] == "CountryID"){
                  echo '
                  <div class="col-sm-6">
                  <div class="form-group form-group-default form-group-default-select2 required">
                        <label class="">'.$field["name"].'</label>
                          <select class="full-width '.$field["class"].' '.$field["disabled"].'" name="'.$field["id"].'" id="'.$field["id"].'" data-placeholder="Ülke seçin" data-init-plugin="select2" required data-msg="'.$message.'">
                          <option value="0">Lütfen seçin</option>';
                            foreach ($countries as $key => $country) {
                              echo '
                              <option value='.$country->CountryID.'>'.$country->CountryName.'</option>
                              ';
                            }
                          echo '</select>
                        </div>
                  </div>';
                }else{
                  echo '
                  <div class="col-sm-6">
                  <div class="form-group form-group-default form-group-default-select2 required">
                        <label class="">'.$field["name"].'</label>
                          <select class="full-width '.$field["class"].' '.$field["disabled"].'" '.$field["disabled"].' name="'.$field["id"].'" id="'.$field["id"].'" data-placeholder="Ülke seçin" data-init-plugin="select2" required data-msg="'.$message.'">
                          <option value="0">Lütfen seçin</option>
                          </select>
                        </div>
                  </div>';
                }
                }
              }
              ?>
                <button type="submit" class="btn btn-primary btn-block">Yeni Holding Ekle</button>
                <div class="alert alert-success modalError unvisible m-t-10"></div>
              </form>
            </div>
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
      <h5 class="text-primary "><span class="semi-bold holdingNameinModal"></span> adlı holdingi silmek istediğinizden emin misiniz? Lütfen bu işlemi geri alamayacağınızı unutmayın.</h5>
      <br>
      <button type="button" class="btn btn-success btn-block deleteHoldingButton">Evet</button>
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
    <script src="<?php echo base_url() ?>assets/js/functions.js?v=<?php echo time(); ?>" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/jquery-inputmask/jquery.inputmask.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/jquery-datatable/media/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <!-- <script src="<?php echo base_url() ?>assets/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js" type="text/javascript"></script> -->
    <script src="<?php echo base_url() ?>assets/plugins/jquery-datatable/media/js/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/lodash.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/moment/moment.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/scripts.js?v=<?php echo time(); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>truva/js/pages.min.js"></script>
    <script src="<?php echo base_url() ?>truva/js/holdings.js?v=<?php echo time(); ?>"></script>
    <!-- END PAGE LEVEL JS -->
  </body>
</html>