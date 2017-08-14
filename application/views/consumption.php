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
            <h3 class="">Tüketim Raporları</h3>
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
                        <div class="col-md-4">
                        <div class="panel-body" style="padding-top: 0px;">
                        <h5>Tarih Seçin</h5>
                        <div class="input-daterange input-group" id="datepicker-range">
                          <input type="text" class="input-sm form-control" id="dateBegin" name="start">
                          <span class="input-group-addon">to</span>
                          <input type="text" class="input-sm form-control" id="dateEnd" name="end">
                          </div>
                        </div>
                        </div>
                        <div class="col-md-8">
                          <div class="panel-body" style="padding-top: 0px;">
                        <h5>Holding & Şirket</h5>
                        <div class="col-md-3 form-group form-group-default form-group-default-select2 required">
                        <label class="">Holding seçin</label>
                          <select class="full-width holdings" data-placeholder="Holding seçin" data-init-plugin="select2">
                          <option value="0">Lütfen seçin</option>
                            <?php 
                            foreach ($holdings as $key => $holding) {
                              echo '<option value='.$holding->HoldingID.'>'.$holding->HoldingName.'</option>';
                            }
                            ?>
                          </select>
                        </div>
                        <div class="col-md-3 form-group form-group-default form-group-default-select2 required">
                        <label class="">Şirket Seçin</label>
                          <select class="full-width companies disabled" disabled="disabled" data-placeholder="Şirket seçin" data-init-plugin="select2">
                            <option value="0">Lütfen seçin</option>
                          </select>
                        </div>
                        <div class="col-md-3 form-group form-group-default form-group-default-select2 required">
                        <label class="">Bar Seçin</label>
                          <select class="full-width bars disabled" disabled="disabled" data-placeholder="Bar seçin" data-init-plugin="select2">
                            <option value="0">Lütfen seçin</option>
                          </select>
                        </div>
                        <div class="col-md-3 form-group form-group-default form-group-default-select2 required">
                        <label class="">Musluk Seçin</label>
                          <select class="full-width taps disabled" disabled="disabled" data-placeholder="Musluk seçin" data-init-plugin="select2">
                            <option value="0">Lütfen seçin</option>
                          </select>
                        </div>
                        <button type="button" class="btn btn-primary pull-right m-t-10 apply">Raporla</button>
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
              <div class="col-md-3">
                <div class="panel panel-default bg-success">
                  <div class="panel-heading separator">
                    <div class="panel-title">TOPLAM KİŞİ
                    </div>
                  </div>
                  <div class="panel-body">
                    <h3 class="text-center">
                      <span class="semi-bold"></span>Lütfen holding seçiniz.</h3>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="panel panel-default bg-primary">
                    <div class="panel-heading separator">
                      <div class="panel-title">TOPLAM TÜKETİM ŞİŞE
                      </div>
                    </div>
                    <div class="panel-body">
                      <h3 class="text-center">
                        <span class="semi-bold"></span>Lütfen holding seçiniz.</h3>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                  <div class="panel panel-default bg-warning">
                    <div class="panel-heading separator">
                      <div class="panel-title">TOPLAM TÜKETİM CL
                      </div>
                    </div>
                    <div class="panel-body">
                      <h3 class="text-center">
                        <span class="semi-bold"></span>Lütfen holding seçiniz.</h3>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                  <div id="portlet-circular-color" class="panel panel-default bg-danger">
                    <div class="panel-heading separator">
                      <div class="panel-title">KİŞİ BAŞI ORTALAMA TÜKETİM
                      </div>
                    </div>
                    <div class="panel-body">
                      <h3 class="text-center">
                        <span class="semi-bold"></span>Lütfen holding seçiniz.</h3>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div id="container" style="width:100%; height:500px;"></div>
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
    <script src="<?php echo base_url() ?>truva/js/pages.min.js"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="<?php echo base_url() ?>assets/js/functions.js" type="text/javascript"></script>
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
    <script src="http://code.highcharts.com/highcharts.js"></script>
    <script src="<?php echo base_url() ?>assets/js/scripts.js?v=<?php echo time(); ?>" type="text/javascript"></script>
    <script type="text/javascript">
      $(function(){
        $('#datepicker-range').datepicker({
          format: 'yyyy-mm-dd',
          endDate: '+0d'
        });
        var chart = Highcharts.chart('container', {
          chart: {
              type: 'column'
          },
          title: {
              text: 'Toplam Tüketim'
          },
          xAxis: {
              categories: <?php  echo json_encode($reports->dates); ?>,
              crosshair: true
          },
          yAxis: {
              min: 0,
              title: {
                  text: 'Santilitre (cl)'
              }
          },
          tooltip: {
              headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
              pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                  '<td style="padding:0"><b>{point.y:.1f} cl</b></td></tr>',
              footerFormat: '</table>',
              shared: true,
              useHTML: true
          },
          credits: {
              enabled: false
          },
          plotOptions: {
              column: {
                  pointPadding: 0.2,
                  borderWidth: 0
              }
          },
          series: <?php echo json_encode($reports->graphData); ?>
      });
        $(".apply").on("click",function(){
            var dateBegin = $("#dateBegin").val();
            var dateEnd = $("#dateEnd").val();
            var data = {dateBegin:dateBegin,dateEnd:dateEnd};
            var holdingId = $(".holdings").val();
            var companyId = $(".companies").val();
            var barGroupId = $(".bars").val();
            var tapId = $(".taps").val();
            $.ajax({
              type:"POST",
              data:{dateBegin:dateBegin,dateEnd:dateEnd,holdingId:holdingId,companyId:companyId,barGroupId:barGroupId,tapId:tapId},
              url:base_url+"/general/getConsumptionByDate",
              success:function(data){
                chart.update({
                  series:data.graphData,
                  xAxis: {
                      categories: data.dates,
                      crosshair: true
                  }
                });
              }
            })
        })
      })
    </script>
    <!-- END PAGE LEVEL JS -->
  </body>
</html>