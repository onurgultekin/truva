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
            <h3 class="">Musluk Listesi</h3>
            </div>
            </div>
            </div>
          <!-- END JUMBOTRON -->
          <!-- START CONTAINER FLUID -->
          <div class="container-fluid container-fixed-lg m-t-10">
            <!-- BEGIN PlACE PAGE CONTENT HERE -->
            <div class="row">
              <div class="col-md-4 pull-right">
              <button class="btn btn-primary pull-right addNewTap m-b-10" data-toggle="modal" data-target="#addNewTapModal">Yeni Musluk Ekle</button>
              </div>
              <div class="col-md-4 pull-left" style="padding-left: 0px">
                <div class="col-xs-12">
                <input type="text" id="search-table" class="form-control pull-left" placeholder="Musluk Ara">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
              <table class="table table-striped" id="tableWithExportOptions">
              <thead>
              <tr>
              <th>Adı</th>
              <th>Holding Adı</th>
              <th>Şirket Adı</th>
              <th>Bar grubu</th>
              <th>İçki grubu</th>
              <th>İçki tipi</th>
              <th>İçki markası</th>
              <th class="no-sort"></th>
              </tr>
              </thead>
              <tbody>
                <?php
                foreach ($taps as $key => $tap) {
                  echo '<tr id="'.$tap->TapID.'">
                    <td>'.$tap->Name.'</td>
                    <td>'.$tap->HoldingName.'</td>
                    <td>'.$tap->CompanyName.'</td>
                    <td>'.$tap->BarGroupName.'</td>
                    <td>'.$tap->AlcoholGroupName.'</td>
                    <td>'.$tap->AlcoholTypeName.'</td>
                    <td>'.$tap->AlcoholBrandName.'</td>
                    <td><div class="pull-left"><button class="btn btn-warning getTapDetails btn-xs m-r-10" id="duzenle">Düzenle</button><button class="btn btn-danger btn-xs">Sil</button></div></td>
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
              <h5>Musluk <span class="semi-bold">Bilgileri</span></h5>
              <p class="p-b-10">Aşağıda musluk ile ilgili bilgileri bulabilirsiniz.</p>
            </div>
            <div class="modal-body">
              <form role="form" id="updateTapData">
                <div class="form-group appendTapDataHere">
                </div>
                <button type="submit" class="btn btn-primary m-t-5 updateTap">Bilgileri Düzenle</button>
                <div class="alert alert-success updateModalError unvisible m-t-10"></div>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="modal fade stick-up disable-scroll" id="addNewTapModal" role="dialog" aria-hidden="false">
      <div class="modal-dialog ">
        <div class="modal-content-wrapper">
          <div class="modal-content">
            <div class="modal-header clearfix text-left">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
              </button>
              <h5>Yeni Musluk <span class="semi-bold">Ekle</span></h5>
            </div>
            <div class="modal-body" style="overflow:hidden;">
              <form role="form" class="form-group" id="appendNewTapData">
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
                  $placeholder = '';
                  if($field["id"] == "NetPrice" || $field["id"] == "SalePrice"){
                    $placeholder = 'placeholder="0.00"';
                  }
                  echo '<div class="col-sm-6">
                  <div class="form-group form-group-default required '.$class.' ">
                    <label>'.$field["name"].':</label>
                    <div class="controls">
                      <input type="'.$field["type"].'" class="form-control" name="'.$field["id"].'" id="'.$field["id"].'" required data-msg="'.$message.'" '.$placeholder.'>
                    </div>
                  </div>
                </div>';
                }else{
                  if($field["id"] == "AlcoholGroupID"){
                    echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2 required">
                    <label class="">'.$field["name"].'</label>
                    <select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Ülke seçin" data-init-plugin="select2">
                      <option value="0">Lütfen seçin</option>';
                      foreach ($alcoholGroups as $key => $alcoholGroup) {
                        echo '<option value='.$alcoholGroup->AlcoholGroupID.'>'.$alcoholGroup->Name.'</option>';
                      }
                      echo '</select>
                    </div></div>';
                  }else
                  if($field["id"] == "AlcoholBrandID"){
                    echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2 required">
                    <label class="">'.$field["name"].'</label>
                    <select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Ülke seçin" data-init-plugin="select2">
                      <option value="0">Lütfen seçin</option>';
                      foreach ($alcoholBrands as $key => $alcoholBrand) {
                        echo '<option value='.$alcoholBrand->AlcoholBrandID.'>'.$alcoholBrand->Name.'</option>';
                      }
                      echo '</select>
                    </div></div>';
                  }else
                  if($field["id"] == "AlcoholTypeID"){
                    echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2 required">
                    <label class="">'.$field["name"].'</label>
                    <select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Ülke seçin" data-init-plugin="select2">
                      <option value="0">Lütfen seçin</option>';
                      foreach ($alcoholTypes as $key => $alcoholType) {
                        echo '<option value='.$alcoholType->AlcoholTypeID.'>'.$alcoholType->Name.'</option>';
                      }
                      echo '</select>
                    </div></div>';
                  }else
                  if($field["id"] == "HoldingID"){
                    echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2">
                    <label class="">'.$field["name"].'</label>
                    <select class="full-width '.$field["class"].' '.$field["disabled"].'" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Holding seçin" data-init-plugin="select2">
                      <option value="0">Lütfen seçin</option>';
                      foreach ($holdings as $key => $holding) {
                        echo '<option value='.$holding->HoldingID.'>'.$holding->HoldingName.'</option>';
                      }
                      echo '</select>
                    </div></div>';
                  }else
                  if($field["id"] == "TapStatusID"){
                    echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2">
                    <label class="">'.$field["name"].'</label>
                    <select class="full-width '.$field["class"].' '.$field["disabled"].'" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Holding seçin" data-init-plugin="select2">
                      <option value="0">Lütfen seçin</option>';
                      foreach ($tapStatuses as $key => $tapStatus) {
                        echo '<option value='.$tapStatus->TapStatusID.'>'.$tapStatus->Name.'</option>';
                      }
                      echo '</select>
                    </div></div>';
                  }else
                  if($field["id"] == "collector_id"){
                    echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2 required">
                    <label class="">'.$field["name"].'</label>
                    <select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Şirket Tipi seçin" data-init-plugin="select2">
                      <option value="0">Lütfen seçin</option>';
                      foreach ($collectors as $key => $collector) {
                        echo '<option value='.$collector->collector_id.'>'.$collector->device_key.'</option>';
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
              <div class="row m-b-10">
                  <div class="col-md-4">
                  <div class="form-group form-group-default required m-t-10">
                    <label>Button CL Real</label>
                    <div class="controls">
                    <input type="text" class="form-control" id="buttonClReal" placeholder="0.00">
                    </div>
                  </div>
                  <div class="form-group form-group-default required m-t-10">
                    <label>Button CL Shown</label>
                    <div class="controls">
                    <input type="text" class="form-control" id="buttonClShown" placeholder="0.00">
                    </div>
                  </div>
                  <button type="button" class="btn btn-primary pull-right addButtonDataToTable"><i class="fa fa-angle-double-right"></i></button>
                  </div>
                  <div class="col-md-8">
                    <table class="table table-striped buttonTable">
                        <thead>
                          <th style="text-transform: none !important; padding-top: 0px;">Button Adı</th>
                          <th style="text-transform: none !important; padding-top: 0px;">Button CL Real</th>
                          <th style="text-transform: none !important; padding-top: 0px;">Button CL Shown</th>
                          <th style="text-transform: none !important; padding-top: 0px;"></th>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                  </div>
                  </div>
                <button type="submit" class="btn btn-primary btn-block addNewTapButton">Yeni Musluk Ekle</button>
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
      <h5 class="text-primary "><span class="semi-bold TapNameinModal"></span> adlı alkol tipini silmek istediğinizden emin misiniz? Lütfen bu işlemi geri alamayacağınızı unutmayın.</h5>
      <br>
      <button type="button" class="btn btn-success btn-block deleteTapButton">Evet</button>
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
    <script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/jquery-autonumeric/autoNumeric.js"></script>
    <!-- END VENDOR JS -->
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="<?php echo base_url() ?>truva/js/pages.min.js"></script>
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
    <script src="<?php echo base_url() ?>assets/plugins/moment/moment.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/scripts.js?v=<?php echo time(); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>truva/js/pages.min.js"></script>
    <script type="text/javascript">
      $(function(){
        var buttonsArray = [];
        initTable();
        getDetails(".getTapDetails","/general/getTapById","TapId",".appendTapDataHere");
        $("#appendNewTapData").validate({
          rules: {
              collector_id:{min:1},
              AlcoholBrandID:{min:1},
              AlcoholTypeID:{min:1},
              AlcoholGroupID:{min:1},
              BarGroupID:{min:1},
              CompanyID:{min:1},
              TapStatusID:{min:1}
          },
          submitHandler: function(form) {
            addNewTap(buttonsArray);
            }
        });
        $('#datepicker-range').datepicker({
          format: 'yyyy-mm-dd',
          endDate: '+0d'
        });
        $("#addNewTapModal").on("shown.bs.modal",function(){
          setTimeout(function () {$('select').select2();}, 300);
        })
        $("body").on("click",".deleteTapModal",function(){
          var userId = $(this).parents("tr").attr("id");
          var userName = $(this).parents("tr").find("td:eq(2)").html();
          $(".deleteModalError").html('').addClass("unvisible");
          $(".TapNameinModal").html(userName);
          $(".deleteTapButton").attr("id",userId);
          $("#modalSlideLeft").modal();
        })
        $("body").on("click",".deleteTapButton",function(){
          var TapID = $(this).attr("id");
          $(".deleteModalError").html('Lütfen bekleyiniz...').removeClass("unvisible");
          $.ajax({
            type:"POST",
            url:base_url+"/admin/deleteTap",
            data:{TapID:TapID},
            success:function(data){
              $(".deleteModalError").html(data.message).removeClass("unvisible");
              $("table").find("tr#"+TapID).fadeOut(500,function(){
                getTaps()
              })
            }
          })
        })
        $('#buttonClReal,#buttonClShown,#NetPrice,#SalePrice').autoNumeric('init');
        buttonIndex = 0;
        $("body").on("click",".addButtonDataToTable",function(){
          buttonIndex++;
          $(".modalError").html('').addClass("unvisible");
          var buttonName = "Button "+buttonIndex;
          var buttonClReal = $("#buttonClReal").val();
          var buttonClShown = $("#buttonClShown").val();
          var tableLength = $(".buttonTable tbody tr").length;
          if(tableLength < 4 && buttonName.length!=0 && buttonClReal.length!=0 && buttonClShown.length!=0){
            $(".buttonTable tbody").append('<tr>\
            <td>'+buttonName+'</td>\
            <td>'+buttonClReal+'</td>\
            <td>'+buttonClShown+'</td>\
            <td>\
                <div class="pull-right">\
                <button type="button" class="btn btn-danger btn-xs deleteButton"><i class="fa fa-times"></i></button>\
                </div>\
                </td>\
            </tr>');
            buttons = {
              buttonName:buttonName,
              buttonClReal:buttonClReal,
              buttonClShown:buttonClShown
            }
            buttonsArray.push(buttons);
          }else{
            if(tableLength >= 4){
              $(".modalError").html("4 butondan fazla giremezsiniz.").removeClass("unvisible");
            }else{
              $(".modalError").html("Lütfen bütün button alanlarını doldurun.").removeClass("unvisible");
            }
          }
        })
        $("body").on("click",".deleteButton",function(){
          buttonIndex--;
            $(this).parents("tr").fadeOut(500,function(){
                $(this).remove();
                var buttonsArray = [];
                _updateButtonsArray(buttonsArray,".buttonTable");
            })
        })
      })
    </script>
    <!-- END PAGE LEVEL JS -->
  </body>
</html>