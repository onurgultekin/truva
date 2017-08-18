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
    <link href="<?php echo base_url() ?>truva/css/pages-icons.css" rel="stylesheet" type="text/css">
    <link class="main-stylesheet" href="<?php echo base_url() ?>truva/css/pages.css" rel="stylesheet" type="text/css" />
    <!--[if lte IE 9]>
	<link href="<?php echo base_url() ?>assets/plugins/codrops-dialogFx/dialog.ie.css" rel="stylesheet" type="text/css" media="screen" />
	<![endif]-->
  </head>
  <body class="fixed-header ">
    <?php
    foreach ($alcoholTypePercentages as $key => $value) {
      if($value->AlcoholName == ""){
        $value->AlcoholName = "İçki Adı";
      }
      $piechart[$key]["name"] = $value->AlcoholName;
      $piechart[$key]["y"] = (int)$value->alcoholTypeCount;
    } ?>
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
            <h3 class="">Dashboard</h3>
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
                        <div class="panel-body" style="padding-bottom: 0px;">
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
                        <div class="col-md-3 form-group form-group-default form-group-default-select2 required">
                        <label class="">İlçe seçin</label>
                          <select class="full-width districts disabled" disabled="disabled" data-placeholder="İlçe seçin" data-init-plugin="select2">
                            <option value="0">Lütfen seçin</option>
                          </select>
                        </div>
                        <div class="col-md-3 form-group form-group-default form-group-default-select2 required">
                        <label class="">Semt seçin</label>
                          <select class="full-width areas disabled" disabled="disabled" data-placeholder="Kasaba & Köy seçin" data-init-plugin="select2">
                            <option value="0">Lütfen seçin</option>
                          </select>
                        </div>
                        </div>
                        </div>
                        <div class="col-md-12">
                          <div class="panel-body" style="padding-top: 0px">
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
              <div class="overlay unvisible" style="position: absolute; background-color: #fff; opacity: 0.5; width: 100%; height: 100%; z-index: 1000;">
                    <div class="progress-circle-indeterminate m-t-40 text-center" style="left:-30px; position: relative;width: 50px; height: 50px"></div>
                  </div>
                <div class="panel panel-default bg-success">
                  <div class="panel-heading separator">
                    <div class="panel-title">TOPLAM ŞİRKET
                    </div>
                  </div>
                  <div class="panel-body">
                    <h3 class="text-center">
                      <span class="semi-bold"><?php echo $totalCompanyCount; ?></span></h3>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="overlay unvisible" style="position: absolute; background-color: #fff; opacity: 0.5; width: 100%; height: 100%; z-index: 1000;">
                    <div class="progress-circle-indeterminate m-t-40 text-center" style="left:-30px; position: relative;width: 50px; height: 50px"></div>
                  </div>
                  <div class="panel panel-default bg-primary">
                    <div class="panel-heading separator">
                      <div class="panel-title">TOPLAM MUSLUK</div>
                    </div>
                    <div class="panel-body">
                      <h3 class="text-center">
                        <span class="semi-bold"><?php echo $totalTapCount; ?></span></h3>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                  <div class="overlay unvisible" style="position: absolute; background-color: #fff; opacity: 0.5; width: 100%; height: 100%; z-index: 1000;">
                    <div class="progress-circle-indeterminate m-t-40 text-center" style="left:-30px; position: relative;width: 50px; height: 50px"></div>
                  </div>
                  <div class="panel panel-default bg-warning">
                    <div class="panel-heading separator">
                      <div class="panel-title">TOPLAM AKTİF MUSLUK
                      </div>
                    </div>
                    <div class="panel-body">
                      <h3 class="text-center">
                        <span class="semi-bold"><?php echo $totalActiveTapCount; ?></span></h3>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                  <div class="overlay unvisible" style="position: absolute; background-color: #fff; opacity: 0.5; width: 100%; height: 100%; z-index: 1000;">
                    <div class="progress-circle-indeterminate m-t-40 text-center" style="left:-30px; position: relative;width: 50px; height: 50px"></div>
                  </div>
                  <div id="portlet-circular-color" class="panel panel-default bg-danger">
                    <div class="panel-heading separator">
                      <div class="panel-title">TOPLAM BAR
                      </div>
                    </div>
                    <div class="panel-body">
                      <h3 class="text-center">
                        <span class="semi-bold"><?php echo $totalActiveTapCount; ?></span></h3>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div id="container" style="width:100%; height:400px;"></div>
                  </div>
                  <div class="col-md-4">
                    <div id="container2" style="width:100%; height:400px;"></div>
                  </div>
                  <div class="col-md-4">
                    <div id="container3" style="width:100%; height:400px;"></div>
                  </div>
                </div>
                <div class="row m-t-10">
                <div class="col-md-8">
                  <div class="map-controls">
                    <div class="pull-left">
                    <div class="btn-group btn-group-vertical" data-toggle="buttons-radio">
                    <button id="map-zoom-in" class="btn btn-success btn-xs"><i class="fa fa-plus"></i>
                    </button>
                    <button id="map-zoom-out" class="btn btn-success btn-xs"><i class="fa fa-minus"></i>
                    </button>
                    </div>
                    </div>
                    </div>
                  <div class="map" id="google-map" style="height: 500px">
                    
                  </div>
                  </div>
                  <div class="col-md-4">
                <div data-pages="portlet" class="panel panel-default" id="portlet-basic">
                  <div class="panel-heading ">
                    <div class="panel-title">Son 5 musluk verisi
                    </div>
                    <div class="panel-controls">
                      <ul>
                        <li><a data-toggle="collapse" class="portlet-collapse" href="#"><i class="portlet-icon portlet-icon-collapse"></i></a>
                        </li>
                        <li><a data-toggle="refresh" class="portlet-refresh" href="#"><i class="portlet-icon portlet-icon-refresh"></i></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="panel-body">
                      <table class="table table-striped">
                        <thead>
                          <th>Adı</th>
                          <th>CL</th>
                          <th>Tarih</th>
                        </thead>
                        <tbody>
                          <?php 
                          foreach ($last5taps as $key => $last5tap) {
                            echo '<tr>
                            <td>'.$last5tap->Name.'</td>
                            <td>'.$last5tap->ButtonClShown.'</td>
                            <td>'.$last5tap->Date.'</td>
                            </tr>';
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
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
    <script src="<?php echo base_url() ?>assets/js/portlets.js" type="text/javascript"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="<?php echo base_url() ?>assets/js/functions.js?v=<?php echo time(); ?>" type="text/javascript"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyBtXOG51L5IaQOE8MIC2bsUOSaKGM0bRJE" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/google_map.js" type="text/javascript"></script>
    <script src="http://code.highcharts.com/highcharts.js"></script>
    <script src="<?php echo base_url() ?>assets/js/scripts.js?v=<?php echo time(); ?>" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
        $(".holdings").on("change",function(){
            var dateBegin = $("#dateBegin").val();
            var dateEnd = $("#dateEnd").val();
            var data = {dateBegin:dateBegin,dateEnd:dateEnd};
            var holdingId = $(".holdings").val();
            var companyId = $(".companies").val();
            var barGroupId = $(".bars").val();
            var tapId = $(".taps").val();
            myChart.showLoading();
            personBased.showLoading();
            piechart.showLoading();
            $.ajax({
              type:"POST",
              data:{dateBegin:dateBegin,dateEnd:dateEnd,holdingId:holdingId,companyId:0,barGroupId:0,tapId:0},
              url:base_url+"/general/getConsumptionByDate",
              success:function(data){
                myChart.hideLoading();
                personBased.hideLoading();
                piechart.hideLoading();
                myChart.update({
                  series:data.consumed.graphData,
                  xAxis: {
                      categories: data.consumed.dates,
                      crosshair: true
                  }
                });
                personBased.update({
                  series:data.average.graphData,
                  xAxis: {
                      categories: data.average.dates,
                      crosshair: true
                  }
                });
              }
            })
        });
        $(".companies").on("change",function(){
            var dateBegin = $("#dateBegin").val();
            var dateEnd = $("#dateEnd").val();
            var data = {dateBegin:dateBegin,dateEnd:dateEnd};
            var holdingId = $(".holdings").val();
            var companyId = $(".companies").val();
            var barGroupId = $(".bars").val();
            var tapId = $(".taps").val();
            myChart.showLoading();
            personBased.showLoading();
            piechart.showLoading();
            $.ajax({
              type:"POST",
              data:{dateBegin:dateBegin,dateEnd:dateEnd,holdingId:holdingId,companyId:companyId,barGroupId:0,tapId:0},
              url:base_url+"/general/getConsumptionByDate",
              success:function(data){
                myChart.hideLoading();
                personBased.hideLoading();
                piechart.hideLoading();
                myChart.update({
                  series:data.consumed.graphData,
                  xAxis: {
                      categories: data.consumed.dates,
                      crosshair: true
                  }
                });
                personBased.update({
                  series:data.average.graphData,
                  xAxis: {
                      categories: data.average.dates,
                      crosshair: true
                  }
                });
              }
            })
        }) 
        $(".bars").on("change",function(){
            var dateBegin = $("#dateBegin").val();
            var dateEnd = $("#dateEnd").val();
            var data = {dateBegin:dateBegin,dateEnd:dateEnd};
            var holdingId = $(".holdings").val();
            var companyId = $(".companies").val();
            var barGroupId = $(".bars").val();
            var tapId = $(".taps").val();
            myChart.showLoading();
            personBased.showLoading();
            piechart.showLoading();
            $.ajax({
              type:"POST",
              data:{dateBegin:dateBegin,dateEnd:dateEnd,holdingId:holdingId,companyId:companyId,barGroupId:barGroupId,tapId:0},
              url:base_url+"/general/getConsumptionByDate",
              success:function(data){
                myChart.hideLoading();
                personBased.hideLoading();
                piechart.hideLoading();
                myChart.update({
                  series:data.consumed.graphData,
                  xAxis: {
                      categories: data.consumed.dates,
                      crosshair: true
                  }
                });
                personBased.update({
                  series:data.average.graphData,
                  xAxis: {
                      categories: data.average.dates,
                      crosshair: true
                  }
                });
              }
            })
        }) 
        $(".taps").on("change",function(){
            var dateBegin = $("#dateBegin").val();
            var dateEnd = $("#dateEnd").val();
            var data = {dateBegin:dateBegin,dateEnd:dateEnd};
            var holdingId = $(".holdings").val();
            var companyId = $(".companies").val();
            var barGroupId = $(".bars").val();
            var tapId = $(".taps").val();
            myChart.showLoading();
            personBased.showLoading();
            piechart.showLoading();
            $.ajax({
              type:"POST",
              data:{dateBegin:dateBegin,dateEnd:dateEnd,holdingId:holdingId,companyId:companyId,barGroupId:barGroupId,tapId:tapId},
              url:base_url+"/general/getConsumptionByDate",
              success:function(data){
                myChart.hideLoading();
                personBased.hideLoading();
                piechart.hideLoading();
                myChart.update({
                  series:data.consumed.graphData,
                  xAxis: {
                      categories: data.consumed.dates,
                      crosshair: true
                  }
                });
                personBased.update({
                  series:data.average.graphData,
                  xAxis: {
                      categories: data.average.dates,
                      crosshair: true
                  }
                });
              }
            })
        }) 
            var myChart = Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Son bir aylık toplam tüketim'
    },
    xAxis: {
        categories: <?php echo json_encode($totalDailyConsumed->dates); ?>,
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Tüketim(cl)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: <?php echo json_encode($totalDailyConsumed->graphData); ?>
});
            var personBased = Highcharts.chart('container2', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Kişi bazlı ortalama içki tüketimi'
    },
    xAxis: {
        categories: <?php echo json_encode($averageConsumed->dates); ?>
    },
    yAxis: {
        title: {
            text: 'Tüketim'
        }
    },
    tooltip: {
        pointFormat: '{series.name} kişi başı ortalama <b>{point.y:,.0f} CL </b> '
    },
    series: <?php echo json_encode($averageConsumed->graphData); ?>
});
            var piechart = Highcharts.chart('container3', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Oransal Tüketim Dağılımı'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
        series: [{
            name: 'İçkiler',
            data: <?php echo json_encode($piechart); ?> 
        }]
    });
            refreshLastTapData();
            });
    </script>
    <!-- END PAGE LEVEL JS -->
  </body>
</html>