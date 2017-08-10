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
            <h3 class="">Kullanıcı Listesi</h3>
            </div>
            </div>
            </div>
          <!-- END JUMBOTRON -->
          <!-- START CONTAINER FLUID -->
          <div class="container-fluid container-fixed-lg m-t-10">
            <!-- BEGIN PlACE PAGE CONTENT HERE -->
            <div class="row">
              <div class="col-md-4">
              <button class="btn btn-primary pull-left addNewUser m-b-10" data-toggle="modal" data-target="#addNewUserModal">Yeni Kullanıcı Ekle</button>
              </div>
              <div class="col-md-4 pull-right">
                <div class="col-xs-12">
                <input type="text" id="search-table" class="form-control pull-right" placeholder="Kullanıcı Ara">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
              <table class="table table-striped" id="tableWithExportOptions">
              <thead>
              <tr>
              <th>E-mail</th>
              <th>Adı</th>
              <th>Soyadı</th>
              <th>Adres</th>
              <th>Telefon</th>
              <th class="no-sort"></th>
              </tr>
              </thead>
              <tbody>
                <?php
                foreach ($users as $key => $user) {
                  echo '<tr id="'.$user->id.'">
                    <td>'.$user->email.'</td>
                    <td>'.$user->first_name.'</td>
                    <td>'.$user->last_name.'</td>
                    <td>'.$user->address.'</td>
                    <td>'.$user->phone.'</td>
                    <td><div class="pull-right"><button class="btn btn-warning getUserDetails btn-rounded btn-xs" id="duzenle">Düzenle</button><button class="btn btn-danger deleteUserModal btn-rounded btn-xs m-l-10">Sil</button></div></td>
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
        <div class="container-fluid container-fixed-lg footer">
          <div class="copyright sm-text-center">
            <p class="small no-margin pull-left sm-pull-reset">
              <span class="hint-text">Copyright &copy; 2017 </span>
              <span class="font-montserrat">TRUVA</span>.
              <span class="hint-text">All rights reserved. </span>
              <!-- <span class="sm-block"><a href="#" class="m-l-10 m-r-10">Terms of use</a> | <a href="#" class="m-l-10">Privacy Policy</a></span>-->
            </p>
            <p class="small no-margin pull-right sm-pull-reset">
              <a href="#">Hand-crafted</a> <span class="hint-text">&amp; Made with Love ®</span>
            </p>
            <div class="clearfix"></div>
          </div>
        </div>
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
              <h5>Kullanıcı <span class="semi-bold">Bilgileri</span></h5>
              <p class="p-b-10">Aşağıda kullanıcı ile ilgili bilgileri bulabilirsiniz.</p>
            </div>
            <div class="modal-body">
              <form role="form" id="updateUserData">
                <div class="form-group appendUserDataHere">
                </div>
                <button type="submit" class="btn btn-primary btn-block m-t-5 updateUser">Bilgileri Düzenle</button>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="modal fade stick-up disable-scroll" id="addNewUserModal" role="dialog" aria-hidden="false">
      <div class="modal-dialog ">
        <div class="modal-content-wrapper">
          <div class="modal-content">
            <div class="modal-header clearfix text-left">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
              </button>
              <h5>Yeni Kullanıcı <span class="semi-bold">Ekle</span></h5>
            </div>
            <div class="modal-body" style="overflow:hidden;">
              <form role="form" class="form-group" id="appendNewUserData">
              <?php
              $i = 0; 
              echo '<div class="row">';
              foreach ($formFields as $key => $field) {
                $i++;
                $message = "Bu alan zorunludur";
                if($field["type"] == "email"){
                  $message = "Lütfen geçerli bir mail adresi giriniz.";
                }
                if($i%2==1 && $i!=1){
                    echo '</div><div class="row">';
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
                  if($field["id"] == "country_id"){
                  echo '
                  <div class="col-sm-6">
                  <div class="form-group form-group-default form-group-default-select2 required">
                        <label class="">'.$field["name"].'</label>
                          <select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Ülke seçin" data-init-plugin="select2">
                          <option value="0">Lütfen seçin</option>';
                            foreach ($countries as $key => $country) {
                              echo '
                              <option value='.$country->CountryID.'>'.$country->CountryName.'</option>
                              ';
                            }
                          echo '</select>
                        </div>
                  </div>';
                }else
                if($field["id"] == "group_id"){
                  echo '
                  <div class="col-sm-6">
                  <div class="form-group form-group-default form-group-default-select2 required">
                        <label class="">'.$field["name"].'</label>
                          <select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Ülke seçin" data-init-plugin="select2">
                          <option value="0">Lütfen seçin</option>';
                            foreach ($userGroups as $key => $userGroup) {
                              echo '
                              <option value='.$userGroup->id.'>'.$userGroup->description.'</option>
                              ';
                            }
                          echo '</select>
                        </div>
                  </div>';
                }else
                if($field["id"] == "CompanyID"){
                  echo '<div class="col-sm-6">
                  <div class="form-group form-group-default form-group-default-select2 required">
                        <label class="">'.$field["name"].'</label>
                          <select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Ülke seçin" data-init-plugin="select2">
                          <option value="0">Lütfen seçin</option>';
                            foreach ($companies as $key => $company) {
                              echo '
                              <option value='.$company->CompanyID.'>'.$company->CompanyName.'</option>
                              ';
                            }
                          echo '</select>
                        </div></div>';
                }else
                if($field["id"] == "HoldingID"){
                  echo '<div class="col-sm-6">
                  <div class="form-group form-group-default form-group-default-select2 required">
                        <label class="">'.$field["name"].'</label>
                          <select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Ülke seçin" data-init-plugin="select2">
                          <option value="0">Lütfen seçin</option>';
                            foreach ($holdings as $key => $holding) {
                              echo '
                              <option value='.$holding->HoldingID.'>'.$holding->HoldingName.'</option>
                              ';
                            }
                          echo '</select>
                        </div></div>';
                }else
                {
                  echo '
                  <div class="col-sm-6">
                  <div class="form-group form-group-default form-group-default-select2 required">
                        <label class="">'.$field["name"].'</label>
                          <select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" '.$field["disabled"].' data-placeholder="Ülke seçin" data-init-plugin="select2">
                          <option value="0">Lütfen seçin</option>
                          </select>
                        </div>
                  </div>';
                }
                }
              }
              ?>
                <button type="submit" class="btn btn-primary btn-block addNewUserButton">Yeni Kullanıcı Ekle</button>
                <div class="alert alert-danger modalError unvisible m-t-10"></div>
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
      <h5 class="text-primary "><span class="semi-bold userNameinModal"></span> adlı kullanıcıyı silmek istediğinizden emin misiniz? Lütfen bu işlemi geri alamayacağınızı unutmayın.</h5>
      <br>
      <button type="button" class="btn btn-success btn-block deleteUserButton">Evet</button>
      <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Hayır</button>
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
    <script src="<?php echo base_url() ?>assets/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js" type="text/javascript"></script>
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
    <script type="text/javascript">
      $(function(){
        initTable();
        getCitiesInModal();
        getDistrictsInModal();
        getAreasInModal();
        getDetails(".getUserDetails","/admin/getUserById","userId",".appendUserDataHere");
        $("#appendNewUserData").validate({
          rules: {
            group_id:{min:1},
            country_id:{min:1},
            city_id:{min:1},
            county_id:{min:1},
            CompanyID:{min:1},
            HoldingID:{min:1}
        },
          submitHandler: function(form) {
            addNewUser();
            }
        });
        $("#postcode").mask("99999");

        $("#addNewUserModal").on("shown.bs.modal",function(){
          setTimeout(function () {$('select').select2();}, 300);
        })
        $("body").on("click",".deleteUserModal",function(){
          var userId = $(this).parents("tr").attr("id");
          var userName = $(this).parents("tr").find("td:eq(1)").html();
          $(".userNameinModal").html(userName);
          $(".deleteUserButton").attr("id",userId);
          $("#modalSlideLeft").modal();
        })
      })
    </script>
    <!-- END PAGE LEVEL JS -->
  </body>
</html>