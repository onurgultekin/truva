var base_url = 'http://test.truva.co';
var modalCloseTimeout = 2000;
$.fn.serializeObject = function() {
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name]) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};
function refreshLastTapData(){
    setInterval(function(){
        $(".portlet-refresh").click();
    },10000);
}
function getCitiesInModal(){
    $("body").on("change",".countriesinmodal",function(){
        var selectedCountry = $(this).val();
        $.ajax({
            type:"POST",
            url:base_url+"/general/getCitiesByCountryId",
            data:{countryId:selectedCountry},
            success:function(data){
                $(".citiesinmodal").html('<option value="0">Lütfen seçin</option>').removeAttr("disabled").removeClass("disabled");
                $.each(data,function(k,city){
                    $(".citiesinmodal").append('<option value="'+city.CityID+'">'+city.CityName+'</option>');
                })
            }
        })
    })
}

function getDistrictsInModal(){
    $("body").on("change",".citiesinmodal",function(){
        var selectedCity = $(this).val();
        $.ajax({
            type:"POST",
            url:base_url+"/general/getDistrictsByCityId",
            data:{cityId:selectedCity},
            success:function(data){
                $(".districtsinmodal").html('<option value="0">Lütfen seçin</option>').removeAttr("disabled").removeClass("disabled");
                $.each(data,function(k,district){
                    $(".districtsinmodal").append('<option value='+district.CountyID+'>'+district.CountyName+'</option>');
                })
            }
        })
    })
}

function getAreasInModal(){
    $("body").on("change",".districtsinmodal",function(){
        var selectedDistrict = $(this).val();
        $.ajax({
            type:"POST",
            url:base_url+"/general/getAreasByDistrictId",
            data:{districtId:selectedDistrict},
            success:function(data){
                $(".areasinmodal").html('<option value="0">Lütfen seçin</option>').removeAttr("disabled").removeClass("disabled");
                $.each(data,function(k,area){
                    $(".areasinmodal").append('<option value='+area.AreaID+'>'+area.AreaName+'</option>');
                })
            }
        })
    })
}
var initTable = function(width = 184,search = "", displayLenght = 20) {
    var table = $('#tableWithExportOptions');
    var extensions = {
        "sFilter": "dataTables_filter custom_filter_class",
        "sLength": "dataTables_length custom_length_class"
    };
    var settings = {
        "sDom": "<'row'<'col-md-12 pull-left m-t-10'l>><t><'row'<p i>>",
        "destroy": true,
        "oSearch": {"sSearch": search},
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "scrollCollapse": false,
        "oLanguage": {
            "sLengthMenu": "_MENU_  <span style='vertical-align:bottom'>kayıt göster</span>",
            "sInfo": " _TOTAL_ kayıt arasından <b>_START_ ve _END_</b> arası gösteriliyor."
        },
        "dom": 'rt<"bottom"ilp><"clear">',
        "columnDefs": [ {
              "targets": 'no-sort',
              "width":width+"px",
              "orderable": false
        } ],
        "iDisplayLength": displayLenght,
        "aLengthMenu": [[10, 20, 50, -1], [10, 20, 50, "All"]],
        "pagingType": "simple_numbers",
        "scrollX": true
    };
    table.dataTable(settings);
    $('#search-table').keyup(function() {
        table.fnFilter($(this).val());
    });
    
}
function gatherTapData(array){
$(".tapContainer").each(function(k,v){
var buttons = [];
var barcodes = [];
var tapId = $(this).find(".activeTaps").val();
array[k] = {tapId:tapId};
  $(this).find(".tableContent .buttonTable tbody tr").each(function(k1,v1){
      var buttonName = $(this).find("td").eq(0).text();
      var buttonClReal = $(this).find("td").eq(1).text();
      var buttonClShown = $(this).find("td").eq(2).text();
        buttonData = {
        buttonName:buttonName,
        buttonClReal:buttonClReal,
        buttonClShown:buttonClShown
      }
      buttons.push(buttonData);
      array[k].buttons = buttons;
  })
  console.log(array);
})
}
function _updateButtonsArray(array,tableClass){
  $.each($(tableClass+" tbody tr"),function(){
      var index = $(this).index();
      var buttonId = $(this).attr("id");
      $(this).find("td").eq(0).html("Button "+(index+1));
      var buttonName = $(this).find("td").eq(0).text();
      var buttonClReal = $(this).find("td").eq(1).text();
      var buttonClShown = $(this).find("td").eq(2).text();
      buttons = {
        buttonName:buttonName,
        buttonClReal:buttonClReal,
        buttonClShown:buttonClShown
      }
      array.push(buttons);
  })
}
function getDetails(button,endpoint,elementName,appendableDiv){
    $("body").on("click",button,function(){
        Pace.restart();
        var elementId = $(this).parents("tr").attr("id");
        var request = $(this).attr("id");
        dataString={};
        dataString[elementName]=elementId;
        $.ajax({
            type:"POST",
            url:base_url+endpoint,
            data:dataString,
            success:function(data){
                $(appendableDiv).empty();
                $(appendableDiv).html(data);
                $("#modalSlideUp").modal();
                $("select").select2();
                if(button == ".getHoldingDetails"){
                    $('.countriesinmodal').on("select2:selecting", function(e) { 
                        getCitiesInModal();
                    });
                    $("#updateHoldingData").validate({
                        rules: {
                            CountryID:{min:1},
                            CityID:{min:1},
                            CountyID:{min:1},
                            AreaID:{min:1}
                        },
                        submitHandler: function(form) {
                            updateHolding();
                        }
                    });
                }
                if(button == ".getCompanyDetails"){
                    $("#updateCompanyData").validate({
                        rules: {
                            CountryID:{min:1},
                            CityID:{min:1},
                            CountyID:{min:1},
                            AreaID:{min:1},
                            CompanyTypeID:{min:1}
                        },
                        submitHandler: function(form) {
                            updateCompany();
                        }
                    });
                }
                if(button == ".getUserDetails"){
                    $("#updateUserData").validate({
                        rules: {
                            CountryID:{min:1},
                            city_id:{min:1},
                            county_id:{min:1},
                            group_id:{min:1},
                            CompanyID:{min:1}
                        },
                        submitHandler: function(form) {
                            updateUser();
                        }
                    });
                }
                if(button == ".getTechnicalServiceDetails"){
                    $("#updateTechnicalServiceData").validate({
                        rules: {
                            CountryID:{min:1},
                            CityID:{min:1},
                            CountyID:{min:1},
                            AreaID:{min:1}
                        },
                        submitHandler: function(form) {
                            updateTechnicalService();
                        }
                    });
                }
                if(button == ".getCompanyDailyGuestDetails"){
                    $('#Date').datepicker({
                        format: 'yyyy-mm-dd',
                        autoclose: true
                      }).on("changeDate",function(){
                        $(this).trigger("focus").trigger("blur");
                      })
                    $("#TotalGuest").autoNumeric('init', {
                      aSep: '',
                      aPad: false
                    });
                }
                if(button == ".getTechnicalServiceFormDetails"){
                    $('#beginDate,#endDate').datepicker({
                        format: 'yyyy-mm-dd',
                        autoclose: true
                      }).on("changeDate",function(){
                        $(this).trigger("focus").trigger("blur");
                      })
                }
                if(button == ".getTapDetails"){
                    var updateButtonsArray = [];
                    _updateButtonsArray(updateButtonsArray,".updateButtonTable");
                    $('#buttonClReal,#buttonClShown,#NetPrice,#SalePrice').autoNumeric('init');
                    var buttonIndex = $(".updateButtonTable tbody tr").length;
                    $("body").on("click",".addButtonDataToTableForUpdate",function(){
                      $(".modalError").html('').addClass("unvisible");
                      var buttonId = $(this).parents("tr").attr("id");
                      buttonIndex++;
                      var buttonName = "Button "+buttonIndex;
                      var buttonClReal = $("#buttonClReal").val();
                      var buttonClShown = $("#buttonClShown").val();
                      var tableLength = $(".updateButtonTable tbody tr").length;
                      if(tableLength < 4 && buttonName.length!=0 && buttonClReal.length!=0 && buttonClShown.length!=0){
                        $(".updateButtonTable tbody").append('<tr>\
                            <td>'+buttonName+'</td>\
                            <td>'+buttonClReal+'</td>\
                            <td>'+buttonClShown+'</td>\
                            <td>\
                                <div class="pull-right">\
                                <button type="button" class="btn btn-danger btn-xs deleteButtonForUpdate"><i class="fa fa-times"></i></button>\
                                </div>\
                                </td>\
                            </tr>');
                        buttons = {
                          buttonName:buttonName,
                          buttonClReal:buttonClReal,
                          buttonClShown:buttonClShown
                        }
                        updateButtonsArray.push(buttons);
                      }else{
                        if(tableLength >= 4){
                          $(".updateModalError").html("4 butondan fazla giremezsiniz.").removeClass("unvisible");
                        }else{
                          $(".updateModalError").html("Lütfen bütün button alanlarını doldurun.").removeClass("unvisible");
                        }
                      }
                    })
                    $("body").on("click",".deleteButtonForUpdate",function(){
                        buttonIndex--;
                        $(this).parents("tr").fadeOut(500,function(){
                            $(this).remove();
                            var updateButtonsArray = [];
                            _updateButtonsArray(updateButtonsArray,".updateButtonTable");
                        })
                    })
                    $("#updateTapData").validate({
                      submitHandler: function(form) {
                        var updateButtonsArray = [];
                        _updateButtonsArray(updateButtonsArray,".updateButtonTable");
                        updateTap(updateButtonsArray);
                        }
                    });
                }
            }
        })
        Pace.stop();
    })
}
function addNewHolding(){
    var data = $("#appendNewHoldingData").serializeObject();
    $(".modalError").html('Lütfen bekleyiniz...');
    $.ajax({
        type:"POST",
        url:base_url+"/admin/addNewHolding",
        data:data,
        success:function(data){
            $(".modalError").html(data.message).removeClass("unvisible");
            getHoldings();
            setTimeout(function(){
                $(".modalError").addClass("unvisible");
                $(".modalError").parents("div.modal").modal("hide");
                $("#appendNewHoldingData").find("select").val(0).change();
                $(".citiesinmodal,.districtsinmodal,.areasinmodal").attr("disabled","disabled");
                $("#appendNewHoldingData label").removeClass("fade");
                $("#appendNewHoldingData").find("input").val("");
            },modalCloseTimeout)
        }
    })
}
function updateHolding(){
    var data = $("#updateHoldingData" ).serializeObject();
    $(".updateModalError").html('Lütfen bekleyiniz...').removeClass("unvisible");
    $.ajax({
        type:"POST",
        url:base_url+"/admin/updateHolding",
        data:data,
        success:function(data){
            $(".updateModalError").html(data.message).removeClass("unvisible");
            getHoldings();
            setTimeout(function(){
                $(".updateModalError").addClass("unvisible");
                $("#modalSlideUp").modal("hide");
            },modalCloseTimeout)
        }
    })
}
function getHoldings(){
    var tableLength = $(".dataTables_length select").val();
    Pace.restart();
    $("#tableWithExportOptions").dataTable().fnDestroy();
    $.ajax({
        type:"GET",
        url:base_url+"/general/getHoldings",
        success:function(data){
            $("#tableWithExportOptions tbody").empty();
            $.each(data.message,function(key,holding){
                $("#tableWithExportOptions tbody").append('<tr id="'+holding.HoldingID+'">\
                    <td>'+holding.HoldingName+'</td>\
                    <td>'+holding.HoldingEmail+'</td>\
                    <td>'+holding.HoldingTelephone+'</td>\
                    <td>'+holding.CityName+'</td>\
                    <td>'+holding.CountyName+'</td>\
                    <td>'+holding.AreaName+'</td>\
                    <td><div class="pull-left"><button class="btn btn-primary getCompanyByHoldingId btn-xs" id= "'+holding.HoldingID+'">Detay</button><button class="btn btn-warning getHoldingDetails btn-xs m-l-10 m-r-10">Düzenle</button><button class="btn btn-danger deleteHoldingModal btn-xs">Sil</button></div></td></tr>')
            })
            initTable(null,$('#search-table').val(),tableLength);
            Pace.stop();
        }
    })
}
function addNewCompany(){
    var data = $("#appendNewCompanyData" ).serializeObject();
    $(".modalError").html('Lütfen bekleyiniz...');
    $.ajax({
        type:"POST",
        url:base_url+"/admin/addNewCompany",
        data:data,
        success:function(data){
            $(".modalError").html(data.message).removeClass("unvisible");
            getCompanies();
            setTimeout(function(){
                $(".modalError").addClass("unvisible");
                $("#addNewCompanyModal").modal("hide");
                $("#appendNewCompanyData").find("select").val(0).change();
                $(".citiesinmodal,.districtsinmodal,.areasinmodal").attr("disabled","disabled");
                $("#appendNewCompanyData label").removeClass("fade");
                $("#appendNewCompanyData").find("input").val("");
            },modalCloseTimeout)
        }
    })
}
function updateCompany(){
    var data = $("#updateCompanyData" ).serializeObject();
    $(".updateModalError").html('Lütfen bekleyiniz...').removeClass("unvisible");
    $.ajax({
        type:"POST",
        url:base_url+"/admin/updateCompany",
        data:data,
        success:function(data){
            $(".updateModalError").html(data.message).removeClass("unvisible");
            getCompanies();
            setTimeout(function(){
                $(".updateModalError").addClass("unvisible");
                $("#modalSlideUp").modal("hide");
            },modalCloseTimeout);
        }
    })
}
function getCompanies(){
    var tableLength = $(".dataTables_length select").val();
    Pace.restart();
    $("#tableWithExportOptions").dataTable().fnDestroy();
    $.ajax({
        type:"GET",
        url:base_url+"/general/getCompanies",
        success:function(data){
            $("#tableWithExportOptions tbody").empty();
            $.each(data.message,function(key,company){
                $("#tableWithExportOptions tbody").append('<tr id="'+company.CompanyID+'"><td>'+company.CompanyName+'</td><td>'+company.CompanyType+'</td><td>'+company.TotalBar+'</td><td>'+company.TotalTap+'</td><td><div class="pull-left"><button class="btn btn-primary getBarGroupListForCompany btn-xs" id="'+company.CompanyID+'">Detay</button><button class="btn btn-warning getCompanyDetails btn-xs m-r-10 m-l-10">Düzenle</button><button class="btn btn-danger deleteCompanyModal btn-xs">Sil</button></div></td></tr>')
            })
            initTable(null,$('#search-table').val(),tableLength);
            Pace.stop();
        }
    })
}
function getHoldingByCountryId(){
    $(".countries").on("change",function(){
        var selectedCountry = $(this).val();
        Pace.restart();
        $("#tableWithExportOptions").dataTable().fnDestroy();
        $.ajax({
            type:"POST",
            url:base_url+"/general/getHoldingByCountryId",
            data:{countryId:selectedCountry},
            success:function(data){
                console.log(data);
                if(selectedCountry==0){
                    getHoldings();
                }else{
                $("#tableWithExportOptions tbody").empty();
                    if(data.message.length != 0){
                        $.each(data.message,function(key,holding){
                            $("#tableWithExportOptions tbody").append('<tr id="'+holding.HoldingID+'">\
                                <td>'+holding.HoldingName+'</td>\
                                <td>'+holding.HoldingEmail+'</td>\
                                <td>'+holding.HoldingTelephone+'</td>\
                                <td>'+holding.CityName+'</td>\
                                <td>'+holding.CountyName+'</td>\
                                <td>'+holding.AreaName+'</td>\
                                <td><div class="pull-left"><button class="btn btn-primary getCompanyByHoldingId btn-xs" id= "'+holding.HoldingID+'">Detay</button><button class="btn btn-warning getHoldingDetails btn-xs m-l-10 m-r-10">Düzenle</button><button class="btn btn-danger deleteHoldingModal btn-xs">Sil</button></div></td></tr>')
                        })
                    }else{
                        $("#modalSlideUpSmall").find("h4").html("Bu ülkeye ait holding bulunamadı.");
                        $("#modalSlideUpSmall").modal();
                    }
                }
                initTable();
                Pace.stop();
            }
        })
    })
}
function getHoldingByCityId(){
    $(".cities").on("change",function(){
        var selectedCity = $(this).val();
        Pace.restart();
        $("#tableWithExportOptions").dataTable().fnDestroy();
        if(selectedCity == 0){
            $(".countries").trigger("change");
        }else{
        $.ajax({
            type:"POST",
            url:base_url+"/general/getHoldingByCityId",
            data:{cityId:selectedCity},
            success:function(data){
            $("#tableWithExportOptions tbody").empty();
                if(data.message.length != 0){
                    $.each(data.message,function(key,holding){
                        $("#tableWithExportOptions tbody").append('<tr id="'+holding.HoldingID+'">\
                            <td>'+holding.HoldingName+'</td>\
                            <td>'+holding.HoldingEmail+'</td>\
                            <td>'+holding.HoldingTelephone+'</td>\
                            <td>'+holding.CityName+'</td>\
                            <td>'+holding.CountyName+'</td>\
                            <td>'+holding.AreaName+'</td>\
                            <td><div class="pull-left"><button class="btn btn-primary getCompanyByHoldingId btn-xs" id= "'+holding.HoldingID+'">Detay</button><button class="btn btn-warning getHoldingDetails btn-xs m-l-10 m-r-10">Düzenle</button><button class="btn btn-danger deleteHoldingModal btn-xs">Sil</button></div></td></tr>')
                    })
                }else{
                    $("#modalSlideUpSmall").find("h4").html("Bu şehire ait holding bulunamadı.");
                    $("#modalSlideUpSmall").modal();
                }
                initTable();
                Pace.stop();
            }
        })
        }
    })
}
function getHoldingByCountyId(){
    $(".districts").on("change",function(){
        var selectedCounty = $(this).val();
        Pace.restart();
        $("#tableWithExportOptions").dataTable().fnDestroy();
        if(selectedCounty == 0){
            $(".cities").trigger("change");
        }else{
            $.ajax({
                type:"POST",
                url:base_url+"/general/getHoldingByCountyId",
                data:{countyId:selectedCounty},
                success:function(data){
                    $("#tableWithExportOptions tbody").empty();
                    if(data.message.length != 0){
                        $.each(data.message,function(key,holding){
                            $("#tableWithExportOptions tbody").append('<tr id="'+holding.HoldingID+'">\
                                <td>'+holding.HoldingName+'</td>\
                                <td>'+holding.HoldingEmail+'</td>\
                                <td>'+holding.HoldingTelephone+'</td>\
                                <td>'+holding.CityName+'</td>\
                                <td>'+holding.CountyName+'</td>\
                                <td>'+holding.AreaName+'</td>\
                                <td><div class="pull-left"><button class="btn btn-primary getCompanyByHoldingId btn-xs" id= "'+holding.HoldingID+'">Detay</button><button class="btn btn-warning getHoldingDetails btn-xs m-l-10 m-r-10">Düzenle</button><button class="btn btn-danger deleteHoldingModal btn-xs">Sil</button></div></td></tr>')
                        })
                    }else{
                        $("#modalSlideUpSmall").find("h4").html("Bu ilçeye ait holding bulunamadı.");
                        $("#modalSlideUpSmall").modal();
                    }
                    initTable();
                    Pace.stop();
                }
            })
        }   
    })
}
function getHoldingByAreaId(){
    $(".areas").on("change",function(){
        var selectedArea = $(this).val();
        Pace.restart();
        $("#tableWithExportOptions").dataTable().fnDestroy();
        if(selectedArea == 0){
            $(".districts").trigger("change");
        }else{
        $.ajax({
            type:"POST",
            url:base_url+"/general/getHoldingByAreaId",
            data:{areaId:selectedArea},
            success:function(data){
                $("#tableWithExportOptions tbody").empty();
                if(data.message.length != 0){
                    $.each(data.message,function(key,holding){
                        $("#tableWithExportOptions tbody").append('<tr id="'+holding.HoldingID+'">\
                            <td>'+holding.HoldingName+'</td>\
                            <td>'+holding.HoldingEmail+'</td>\
                            <td>'+holding.HoldingTelephone+'</td>\
                            <td>'+holding.CityName+'</td>\
                            <td>'+holding.CountyName+'</td>\
                            <td>'+holding.AreaName+'</td>\
                            <td><div class="pull-left"><button class="btn btn-primary getCompanyByHoldingId btn-xs" id= "'+holding.HoldingID+'">Detay</button><button class="btn btn-warning getHoldingDetails btn-xs m-l-10 m-r-10">Düzenle</button><button class="btn btn-danger deleteHoldingModal btn-xs">Sil</button></div></td></tr>')
                    })
                }else{
                    $("#modalSlideUpSmall").find("h4").html("Bu semte ait holding bulunamadı");
                    $("#modalSlideUpSmall").modal();
                }
                initTable();
                Pace.stop();
            }
        })
    }
    });
}
function getCompanyByHoldingIdForHoldingPage(){
    $("body").on("click",".getCompanyByHoldingId",function(){
        var holdingId = $(this).attr("id");
        $.ajax({
            type:"POST",
            url:base_url+"/general/getCompanyByHoldingId",
            data:{holdingId:holdingId},
            success:function(data){
                if(data.resultCode == 0){
                    $("#showHoldingCompanies").find("table tbody").empty();
                    $.each(data.message,function(key,company){
                        $("#showHoldingCompanies").find("table tbody").append('<tr><td>'+company.CompanyName+'</td><td>'+company.CompanyType+'</td><td>'+company.CompanyAdress+'</td></tr>');
                    })
                    $("#showHoldingCompanies").modal();
                }else{
                    $("#modalSlideUpSmall").find("h4").html(data.message);
                    $("#modalSlideUpSmall").modal();
                }
            }
        })
    })
}
function getCompanyByCountryId(){
    $(".countries").on("change",function(){
        var selectedCountry = $(this).val();
        Pace.restart();
        $("#tableWithExportOptions").dataTable().fnDestroy();
        $.ajax({
            type:"POST",
            url:base_url+"/general/getCompanyByCountryId",
            data:{countryId:selectedCountry},
            success:function(data){
                $("#tableWithExportOptions tbody").empty();
                if(data.message.length > 0){
                    $.each(data.message,function(key,company){
                        $("#tableWithExportOptions tbody").append('<tr id="'+company.CompanyID+'"><td>'+company.CompanyName+'</td><td>'+company.CompanyType+'</td><td>'+company.TotalBar+'</td><td>'+company.TotalTap+'</td><td><div class="pull-left"><button class="btn btn-primary getBarGroupListForCompany btn-xs" id="'+company.CompanyID+'">Detay</button><button class="btn btn-warning getCompanyDetails btn-xs m-r-10 m-l-10">Düzenle</button><button class="btn btn-danger deleteCompanyModal btn-xs">Sil</button></div></td></tr>')
                    })
                }else{
                    $("#modalSlideUpSmall").find("h4").html("Bu ülkeye ait şirket  bulunamadı.");
                    $("#modalSlideUpSmall").modal();
                }
                initTable();
                Pace.stop();
            }
        })
    })
}
function getCompanyByCityId(){
    $(".cities").on("change",function(){
        var selectedCity = $(this).val();
        Pace.restart();
        $("#tableWithExportOptions").dataTable().fnDestroy();
        $.ajax({
            type:"POST",
            url:base_url+"/general/getCompanyByCityId",
            data:{cityId:selectedCity},
            success:function(data){
                $("#tableWithExportOptions tbody").empty();
                if(data.message.length > 0){
                    $.each(data.message,function(key,company){
                        $("#tableWithExportOptions tbody").append('<tr id="'+company.CompanyID+'"><td>'+company.CompanyName+'</td><td>'+company.CompanyType+'</td><td>'+company.TotalBar+'</td><td>'+company.TotalTap+'</td><td><div class="pull-left"><button class="btn btn-primary getBarGroupListForCompany btn-xs" id="'+company.CompanyID+'">Detay</button><button class="btn btn-warning getCompanyDetails btn-xs m-r-10 m-l-10">Düzenle</button><button class="btn btn-danger deleteCompanyModal btn-xs">Sil</button></div></td></tr>')
                    })
                }else{
                    $("#modalSlideUpSmall").find("h4").html("Bu şehire ait şirket  bulunamadı.");
                    $("#modalSlideUpSmall").modal();
                }
                initTable();
                Pace.stop();
            }
        })
    })
}
function getCompanyByCountyId(){
    $(".districts").on("change",function(){
        var selectedCounty = $(this).val();
        Pace.restart();
        $("#tableWithExportOptions").dataTable().fnDestroy();
        $.ajax({
            type:"POST",
            url:base_url+"/general/getCompanyByCountyId",
            data:{countyId:selectedCounty},
            success:function(data){
                $("#tableWithExportOptions tbody").empty();
                if(data.message.length > 0){
                    $.each(data.message,function(key,company){
                        $("#tableWithExportOptions tbody").append('<tr id="'+company.CompanyID+'"><td>'+company.CompanyName+'</td><td>'+company.CompanyType+'</td><td>'+company.TotalBar+'</td><td>'+company.TotalTap+'</td><td><div class="pull-left"><button class="btn btn-primary getBarGroupListForCompany btn-xs" id="'+company.CompanyID+'">Detay</button><button class="btn btn-warning getCompanyDetails btn-xs m-r-10 m-l-10">Düzenle</button><button class="btn btn-danger deleteCompanyModal btn-xs">Sil</button></div></td></tr>')
                    })
                }else{
                    $("#modalSlideUpSmall").find("h4").html("Bu ilçeye ait şirket  bulunamadı.");
                    $("#modalSlideUpSmall").modal();
                }
                initTable();
                Pace.stop();
            }
        })
    })
}
function getCompanyByAreaId(){
    $(".areas").on("change",function(){
        var selectedArea = $(this).val();
        Pace.restart();
        $("#tableWithExportOptions").dataTable().fnDestroy();
        $.ajax({
            type:"POST",
            url:base_url+"/general/getCompanyByAreaId",
            data:{areaId:selectedArea},
            success:function(data){
                $("#tableWithExportOptions tbody").empty();
                if(data.message.length > 0){
                    $.each(data.message,function(key,company){
                        $("#tableWithExportOptions tbody").append('<tr id="'+company.CompanyID+'"><td>'+company.CompanyName+'</td><td>'+company.CompanyType+'</td><td>'+company.TotalBar+'</td><td>'+company.TotalTap+'</td><td><div class="pull-left"><button class="btn btn-primary getBarGroupListForCompany btn-xs" id="'+company.CompanyID+'">Detay</button><button class="btn btn-warning getCompanyDetails btn-xs m-r-10 m-l-10">Düzenle</button><button class="btn btn-danger deleteCompanyModal btn-xs">Sil</button></div></td></tr>')
                    })
                }else{
                    $("#modalSlideUpSmall").find("h4").html("Bu semte ait şirket  bulunamadı.");
                    $("#modalSlideUpSmall").modal();
                }
                initTable();
                Pace.stop();
            }
        })
    })
}
function getCompanyByHoldingId(){
    $(".holdingsforcompanies").on("change",function(){
        var selectedHolding = $(this).val();
        if(selectedHolding != null){
            Pace.restart();
            $("#tableWithExportOptions").dataTable().fnDestroy();
            $.ajax({
                type:"POST",
                url:base_url+"/general/getCompanyByHoldingId",
                data:{holdingId:selectedHolding},
                success:function(data){
                    $("#tableWithExportOptions tbody").empty();
                    if(data.resultCode == 0){
                        $.each(data.message,function(key,company){
                            $("#tableWithExportOptions tbody").append('<tr id="'+company.CompanyID+'"><td>'+company.CompanyName+'</td><td>'+company.CompanyType+'</td><td>'+company.TotalBar+'</td><td>'+company.TotalTap+'</td><td><div class="pull-left"><button class="btn btn-primary getBarGroupListForCompany btn-xs" id="'+company.CompanyID+'">Detay</button><button class="btn btn-warning getCompanyDetails btn-xs m-r-10 m-l-10">Düzenle</button><button class="btn btn-danger deleteCompanyModal btn-xs">Sil</button></div></td></tr>')
                        })
                    }else{
                        $("#modalSlideUpSmall").find("h4").html(data.message);
                        $("#modalSlideUpSmall").modal();
                    }
                    initTable();
                    Pace.stop();
                }
            })
        }else{
            getCompanies();
        }
    })
}
function getBarGroupListForCompany(){
    $("body").on("click",".getBarGroupListForCompany",function(){
        var companyId = $(this).attr("id");
        $.ajax({
            type:"POST",
            url:base_url+"/general/getBarsByCompanyId",
            data:{companyId:companyId},
            success:function(data){
                if(data.message.length > 0){
                    $("#showCompanyBarGroups").find("table tbody").empty();
                    $.each(data.message,function(key,barGroup){
                        $("#showCompanyBarGroups").find("table tbody").append('<tr><td>'+barGroup.Name+'</td><td>'+barGroup.Code+'</td></tr>');
                    })
                    $("#showCompanyBarGroups").modal();
                }else{
                    $("#modalSlideUpSmall").modal();
                }
            }
        })
    })
}
function addNewAlcoholBrand(){
    var data = $("#appendNewAlcoholBrandData" ).serializeObject();
    $(".modalError").html('Lütfen bekleyiniz...');
    $.ajax({
        type:"POST",
        url:base_url+"/admin/addNewAlcoholBrand",
        data:data,
        success:function(data){
            $(".modalError").html(data.message).removeClass("unvisible");
            getAlcoholBrands()
            setTimeout(function(){
                $(".modalError").addClass("unvisible");
                $(".modalError").parents("div.modal").modal("hide");
                $("#addNewAlcoholBrand label").removeClass("fade");
                $("#addNewAlcoholBrand").find("input").val("");
                $("#addNewAlcoholBrand").find("select").val(0).change();
            },modalCloseTimeout)
        }
    })
}
function updateAlcoholBrand(){
    var data = $("#updateAlcoholBrandData" ).serializeObject();
    $(".updateModalError").html('Lütfen bekleyiniz...');
    $.ajax({
        type:"POST",
        url:base_url+"/admin/updateAlcoholBrand",
        data:data,
        success:function(data){
            $(".updateModalError").html(data.message).removeClass("unvisible");
            getAlcoholBrands()
            setTimeout(function(){
                $(".updateModalError").addClass("unvisible");
                $("#modalSlideUp").modal("hide");
            },modalCloseTimeout)
        }
    })
}
function getAlcoholBrands(){
    Pace.restart();
    $("#tableWithExportOptions").dataTable().fnDestroy();
    $.ajax({
        type:"GET",
        url:base_url+"/general/getAlcoholBrands",
        success:function(data){
            $("#tableWithExportOptions tbody").empty();
            $.each(data,function(key,alcoholBrand){
                $("#tableWithExportOptions tbody").append('<tr id="'+alcoholBrand.AlcoholBrandID+'"><td>'+alcoholBrand.Code+'</td><td>'+alcoholBrand.Name+'</td><td>'+alcoholBrand.AlcoholTypeName+'</td><td><div class="pull-left"><button class="btn btn-warning getAlcoholBrandDetails btn-xs m-r-10" id="duzenle">Düzenle</button><button class="btn btn-danger deleteAlcoholBrandModal btn-xs">Sil</button></div></td></tr>')
            })
            initTable();
            Pace.stop();
        }
    })
}
function getAlcoholBrandsByAlcoholType(){
    $("body").on("change",".alcoholTypes",function(){
        var selectedType = $(this).val();
        Pace.restart();
        $.ajax({
            type:"POST",
            url:base_url+"/general/getAlcoholBrandByAlcoholType",
            data:{alcoholType:selectedType},
            success:function(data){
                $(".alcoholBrands").html('<option value="0">Lütfen seçin</option>').removeAttr("disabled").removeClass("disabled");
                $.each(data,function(k,alcoholBrand){
                    $(".alcoholBrands").append('<option value="'+alcoholBrand.AlcoholBrandID+'">'+alcoholBrand.Name+'</option>');
                })
                initTable();
                Pace.stop();
            }
        })
    })
}
function addNewAlcoholGroup(){
    var data = $("#appendNewAlcoholGroupData" ).serializeObject();
    $(".modalError").html('Lütfen bekleyiniz...');
    $.ajax({
        type:"POST",
        url:base_url+"/admin/addNewAlcoholGroup",
        data:data,
        success:function(data){
            $(".modalError").html(data.message).removeClass("unvisible");
            getAlcoholGroups()
            setTimeout(function(){
                $(".modalError").addClass("unvisible");
                $(".modalError").parents("div.modal").modal("hide");
                $("#appendNewAlcoholGroupData label").removeClass("fade");
                $("#appendNewAlcoholGroupData").find("input").val("");
                $("#appendNewAlcoholGroupData").find("select").val(0).change();
            },modalCloseTimeout)
        }
    })
}
function updateAlcoholGroup(){
    var data = $("#updateAlcoholGroupData" ).serializeObject();
    $(".updateModalError").html('Lütfen bekleyiniz...');
    $.ajax({
        type:"POST",
        url:base_url+"/admin/updateAlcoholGroup",
        data:data,
        success:function(data){
            $(".updateModalError").html(data.message).removeClass("unvisible");
            getAlcoholGroups()
            setTimeout(function(){
                $(".updateModalError").addClass("unvisible");
                $("#modalSlideUp").modal("hide");
            },modalCloseTimeout)
        }
    })
}
function getAlcoholGroups(){
    Pace.restart();
    $("#tableWithExportOptions").dataTable().fnDestroy();
    $.ajax({
        type:"GET",
        url:base_url+"/general/getAlcoholGroups",
        success:function(data){
            $("#tableWithExportOptions tbody").empty();
            $.each(data,function(key,alcoholGroup){
                $("#tableWithExportOptions tbody").append('<tr id="'+alcoholGroup.AlcoholGroupID+'"><td>'+alcoholGroup.Code+'</td><td>'+alcoholGroup.Name+'</td><td><div class="pull-left"><button class="btn btn-warning getAlcoholGroupDetails btn-xs m-r-10" id="duzenle">Düzenle</button><button class="btn btn-danger deleteAlcoholGroupModal btn-xs">Sil</button></div></tr>')
            })
            initTable();
            Pace.stop();
        }
    })
}
function addNewAlcoholType(){
    var data = $("#appendNewAlcoholTypeData" ).serializeObject();
    $(".modalError").html('Lütfen bekleyiniz...');
    $.ajax({
        type:"POST",
        url:base_url+"/admin/addNewAlcoholType",
        data:data,
        success:function(data){
            $(".modalError").html(data.message).removeClass("unvisible");
            getAlcoholTypes();
            setTimeout(function(){
                $(".modalError").html('').addClass("unvisible");
                $(".modalError").parents("div.modal").modal("hide");
                $("#appendNewAlcoholTypeData label").removeClass("fade");
                $("#appendNewAlcoholTypeData").find("input").val("");
                $("#appendNewAlcoholTypeData").find("select").val(0).change();
            },modalCloseTimeout)
        }
    })
}
function updateAlcoholType(){
    var data = $("#updateAlcoholTypeData" ).serializeObject();
    $(".updateModalError").html('Lütfen bekleyiniz...');
    $.ajax({
        type:"POST",
        url:base_url+"/admin/updateAlcoholType",
        data:data,
        success:function(data){
            $(".updateModalError").html(data.message).removeClass("unvisible");
            getAlcoholTypes();
            setTimeout(function(){
                $(".updateModalError").html('').addClass("unvisible");
                $(".updateModalError").parents("div.modal").modal("hide");
            },modalCloseTimeout)
        }
    })
}
function getAlcoholTypes(){
    Pace.restart();
    $("#tableWithExportOptions").dataTable().fnDestroy();
    $.ajax({
        type:"GET",
        url:base_url+"/general/getAlcoholTypes",
        success:function(data){
            $("#tableWithExportOptions tbody").empty();
            $.each(data,function(key,alcoholType){
                $("#tableWithExportOptions tbody").append('<tr id="'+alcoholType.AlcoholTypeID+'"><td>'+alcoholType.Code+'</td><td>'+alcoholType.Name+'</td><td>'+alcoholType.AlcoholGroupName+'</td><td><div class="pull-left"><button class="btn btn-warning getAlcoholTypeDetails m-r-10 btn-xs" id="duzenle">Düzenle</button><button class="btn btn-danger deleteAlcoholTypeModal btn-xs">Sil</button></div></td></tr>')
            })
            initTable();
            Pace.stop();
        }
    })
}
function addNewArea(){
    var data = $("#appendNewAreaData" ).serializeObject();
    $(".modalError").html('Lütfen bekleyiniz...');
    $.ajax({
        type:"POST",
        url:base_url+"/admin/addNewArea",
        data:data,
        success:function(data){
            $(".modalError").html(data.message).removeClass("unvisible");
            getAreas();
              setTimeout(function(){
                $(".modalError").addClass("unvisible");
                $(".modalError").parents("div.modal").modal("hide");
                $("#appendNewAreaData label").removeClass("fade");
                $("#appendNewAreaData").find("input").val("");
                $("#appendNewAreaData").find("select").val(0).change();
            },modalCloseTimeout)
        }
    })
}
function updateArea(){
    var data = $("#updateAreaData" ).serializeObject();
    $(".updateModalError").html('Lütfen bekleyiniz...');
    $.ajax({
        type:"POST",
        url:base_url+"/admin/updateArea",
        data:data,
        success:function(data){
            $(".updateModalError").html(data.message).removeClass("unvisible");
            getAreas();
              setTimeout(function(){
                $(".modalError").addClass("unvisible");
                $(".modalError").parents("div.modal").modal("hide");
            },modalCloseTimeout)
        }
    })
}
function addNewBarGroup(){
    var data = $("#appendNewBarGroupData" ).serializeObject();
    $(".modalError").html('Lütfen bekleyiniz...');
    $.ajax({
        type:"POST",
        url:base_url+"/admin/addNewBarGroup",
        data:data,
        success:function(data){
            $(".modalError").html(data.message).removeClass("unvisible");
            getBarGroups();
            setTimeout(function(){
                $(".modalError").html('').addClass("unvisible");
                $(".modalError").parents("div.modal").modal("hide");
                $("#appendNewBarGroupData label").removeClass("fade");
                $("#appendNewBarGroupData").find("input").val("");
                $("#appendNewBarGroupData").find("select").val(0).change();
            },modalCloseTimeout)
        }
    })
}
function updateBarGroup(){
    var data = $("#updateBarGroupData" ).serializeObject();
    $(".updateModalError").html('Lütfen bekleyiniz...');
    $.ajax({
        type:"POST",
        url:base_url+"/admin/updateBarGroup",
        data:data,
        success:function(data){
            $(".updateModalError").html(data.message).removeClass("unvisible");
            getBarGroups();
            setTimeout(function(){
                $(".updateModalError").html('').addClass("unvisible");
                $(".updateModalError").parents("div.modal").modal("hide");
            },modalCloseTimeout)
        }
    })
}
function getBarGroups(){
    Pace.restart();
    $("#tableWithExportOptions").dataTable().fnDestroy();
    $.ajax({
        type:"GET",
        url:base_url+"/general/getBarGroups",
        success:function(data){
            $("#tableWithExportOptions tbody").empty();
            $.each(data,function(key,barGroup){
                $("#tableWithExportOptions tbody").append('<tr id="'+barGroup.BarGroupID+'"><td>'+barGroup.Code+'</td><td>'+barGroup.Name+'</td><td><div class="pull-left"><button class="btn btn-warning getBarGroupDetails btn-xs m-r-10" id="duzenle">Düzenle</button><button class="btn btn-danger deleteBarGroupModal btn-xs">Sil</button></div></td></tr>')
            })
            initTable();
            Pace.stop();
        }
    })
}
function addNewCity(){
    var data = $("#appendNewCityData" ).serializeObject();
    $(".modalError").html('Lütfen bekleyiniz...');
    $.ajax({
        type:"POST",
        url:base_url+"/admin/addNewCity",
        data:data,
        success:function(data){
            $(".modalError").html(data.message).removeClass("unvisible");
            getCities();
              setTimeout(function(){
                $(".modalError").addClass("unvisible");
                $(".modalError").parents("div.modal").modal("hide");
                $("#appendNewCityData label").removeClass("fade");
                $("#appendNewCityData").find("input").val("");
                $("#appendNewCityData").find("select").val(0).change();
            },modalCloseTimeout)
        }
    })
}
function updateCity(){
    var data = $("#updateCityData" ).serializeObject();
    $(".updateModalError").html('Lütfen bekleyiniz...');
    $.ajax({
        type:"POST",
        url:base_url+"/admin/updateCity",
        data:data,
        success:function(data){
            $(".updateModalError").html(data.message).removeClass("unvisible");
            getCities();
              setTimeout(function(){
                $(".updateModalError").addClass("unvisible");
                $("#modalSlideUp").modal("hide");
            },modalCloseTimeout)
        }
    })
}
function addNewCollector(){
    var data = $("#appendNewCollectorData" ).serializeObject();
    $(".modalError").html('Lütfen bekleyiniz...');
    $.ajax({
        type:"POST",
        url:base_url+"/admin/addNewCollector",
        data:data,
        success:function(data){
            $(".modalError").html(data.message).removeClass("unvisible");
            getCollectors()
            setTimeout(function(){
                $(".modalError").addClass("unvisible");
                $(".modalError").parents("div.modal").modal("hide");
                $("#appendNewCollectorData label").removeClass("fade");
                $("#appendNewCollectorData").find("input").val("");
                $("#appendNewCollectorData").find("select").val(0).change();
            },modalCloseTimeout)
        }
    })
}
function updateCollector(){
    var data = $("#updateCollectorData" ).serializeObject();
    $(".updateModalError").html('Lütfen bekleyiniz...');
    $.ajax({
        type:"POST",
        url:base_url+"/admin/updateCollector",
        data:data,
        success:function(data){
            $(".updateModalError").html(data.message).removeClass("unvisible");
            getCollectors()
            setTimeout(function(){
                $(".updateModalError").addClass("unvisible");
                $("#modalSlideUp").modal("hide");
            },modalCloseTimeout)
        }
    })
}
function getCollectors(){
    Pace.restart();
    $("#tableWithExportOptions").dataTable().fnDestroy();
    $.ajax({
        type:"GET",
        url:base_url+"/general/getCollectorList",
        success:function(data){
            $("#tableWithExportOptions tbody").empty();
            $.each(data,function(key,collector){
              $("#tableWithExportOptions tbody").append('<tr id="'+collector.collector_id+'"><td>'+collector.ip_address+'</td><td>'+collector.Name+'</td><td>'+collector.notification_email+'</td><td>'+collector.Barcode+'</td><td>'+collector.Latitude+'</td><td>'+collector.Longitude+'</td><td><div class="pull-left"><button class="btn btn-warning getCollectorDetails btn-xs m-r-10" id="duzenle">Düzenle</button><button class="btn btn-danger btn-xs deleteCollectorModal">Sil</button></div></td></tr>')
          })
            initTable();
            Pace.stop();
        }
    })
}
function addNewCounty(){
    var data = $("#appendNewCountyData" ).serializeObject();
    $(".modalError").html('Lütfen bekleyiniz...');
    $.ajax({
        type:"POST",
        url:base_url+"/admin/addNewCounty",
        data:data,
        success:function(data){
            $(".modalError").html(data.message).removeClass("unvisible");
            getCounties();
              setTimeout(function(){
                $(".modalError").addClass("unvisible");
                $(".modalError").parents("div.modal").modal("hide");
                $("#appendNewCountryData label").removeClass("fade");
                $("#appendNewCountryData").find("input").val("");
                $("#appendNewCountyData").find("select").val(0).change();
            },modalCloseTimeout)
        }
    })
}
function updateCounty(){
    var data = $("#updateCountyData" ).serializeObject();
    $(".updateModalError").html('Lütfen bekleyiniz...');
    $.ajax({
        type:"POST",
        url:base_url+"/admin/updateCounty",
        data:data,
        success:function(data){
            $(".updateModalError").html(data.message).removeClass("unvisible");
            getCounties();
              setTimeout(function(){
                $(".updateModalError").addClass("unvisible");
                $("#modalSlideUp").modal("hide");
            },modalCloseTimeout)
        }
    })
}
function addNewCountry(){
    var data = $("#appendNewCountryData" ).serializeObject();
    $(".modalError").html('Lütfen bekleyiniz...');
    $.ajax({
        type:"POST",
        url:base_url+"/admin/addNewCountry",
        data:data,
        success:function(data){
            $(".modalError").html(data.message).removeClass("unvisible");
            getCountries();
              setTimeout(function(){
                $(".modalError").addClass("unvisible");
                $(".modalError").parents("div.modal").modal("hide");
                $("#appendNewCountryData label").removeClass("fade");
                $("#appendNewCountryData").find("input").val("");
            },modalCloseTimeout)
        }
    })
}
function updateCountry(){
    var data = $("#updateCountryData" ).serializeObject();
    $(".updateModalError").html('Lütfen bekleyiniz...');
    $.ajax({
        type:"POST",
        url:base_url+"/admin/updateCountry",
        data:data,
        success:function(data){
            $(".updateModalError").html(data.message).removeClass("unvisible");
            getCountries();
              setTimeout(function(){
                $(".updateModalError").addClass("unvisible");
                $("#modalSlideUp").modal("hide");
            },modalCloseTimeout)
        }
    })
}
function addNewUser(){
    var data = $("#appendNewUserData" ).serializeObject();
    $(".modalError").html('Lütfen bekleyiniz...');
    $.ajax({
        type:"POST",
        url:base_url+"/admin/addNewUser",
        data:data,
        success:function(data){
            $(".modalError").html(data.message).removeClass("unvisible");
        }
    })
}
function updateUser(){
    var data = $("#updateUserData" ).serializeObject();
    $(".updateModalError").html('Lütfen bekleyiniz...').removeClass("unvisible");
    $.ajax({
        type:"POST",
        url:base_url+"/admin/updateUser",
        data:data,
        success:function(data){
            $(".updateModalError").html(data.message).removeClass("unvisible");
            getUsers();
            setTimeout(function(){
                $(".updateModalError").addClass("unvisible");
                $("#modalSlideUp").modal("hide");
            },modalCloseTimeout)
        }
    })
}
function getUsers(){
    var tableLength = $(".dataTables_length select").val();
    Pace.restart();
    $("#tableWithExportOptions").dataTable().fnDestroy();
    $.ajax({
        type:"GET",
        url:base_url+"/admin/getUsers",
        success:function(data){
            $("#tableWithExportOptions tbody").empty();
            $.each(data,function(key,user){
                $("#tableWithExportOptions tbody").append('<tr id="'+user.id+'">\
                    <td>'+user.email+'</td>\
                    <td>'+user.first_name+'</td>\
                    <td>'+user.last_name+'</td>\
                    <td>'+user.address+'</td>\
                    <td>'+user.phone+'</td>\
                    <td>'+user.userRole+'</td>\
                    <td><div class="pull-right"><button class="btn btn-primary changeUserPassword btn-xs" id="duzenle">Şifre Değiştir</button><button class="btn btn-warning getUserDetails btn-xs m-l-5 m-r-5" id="duzenle">Düzenle</button><button class="btn btn-danger deleteUserModal btn-xs">Sil</button></div></td></tr>')
            })
            initTable(214,$('#search-table').val(),tableLength);
            Pace.stop();
        }
    })
}
function getCountries(){
    Pace.restart();
    $("#tableWithExportOptions").dataTable().fnDestroy();
    $.ajax({
        type:"GET",
        url:base_url+"/general/getCountries",
        success:function(data){
            $("#tableWithExportOptions tbody").empty();
            $.each(data,function(key,country){
                $("#tableWithExportOptions tbody").append('<tr id="'+country.CountryID+'">\
                    <td>'+country.BinaryCode+'</td>\
                    <td>'+country.TripleCode+'</td>\
                    <td>'+country.CountryName+'</td>\
                    <td>'+country.PhoneCode+'</td>\
                    <td><div class="pull-left"><button class="btn btn-warning getCountryDetails btn-xs m-r-10" id="duzenle">Düzenle</button><button class="btn btn-danger deleteCountryModal btn-xs">Sil</button></div></td></tr>')
            })
            initTable();
            Pace.stop();
        }
    })
}
function getCities(){
    Pace.restart();
    $("#tableWithExportOptions").dataTable().fnDestroy();
    $.ajax({
        type:"GET",
        url:base_url+"/general/getCities",
        success:function(data){
            $("#tableWithExportOptions tbody").empty();
            $.each(data,function(key,city){
                $("#tableWithExportOptions tbody").append('<tr id="'+city.CityID+'">\
                    <td>'+city.CityName+'</td>\
                    <td>'+city.PlateNo+'</td>\
                    <td>'+city.PhoneCode+'</td>\
                    <td>'+city.CountryName+'</td>\
                    <td><div class="pull-left"><button class="btn btn-warning getCityDetails btn-xs m-r-10" id="duzenle">Düzenle</button><button class="btn btn-danger deleteCityModal btn-xs">Sil</button></div></td></tr>')
            })
            initTable();
            Pace.stop();
        }
    })
}
function getCounties(){
    Pace.restart();
    $("#tableWithExportOptions").dataTable().fnDestroy();
    $.ajax({
        type:"GET",
        url:base_url+"/general/getCounties",
        success:function(data){
            $("#tableWithExportOptions tbody").empty();
            $.each(data,function(key,county){
                $("#tableWithExportOptions tbody").append('<tr id="'+county.CountyID+'">\
                    <td>'+county.CountyName+'</td>\
                    <td>'+county.CityName+'</td>\
                    <td><div class="pull-left"><button class="btn btn-warning getCountyDetails btn-xs m-r-10" id="duzenle">Düzenle</button><button class="btn btn-danger deleteCountyModal btn-xs">Sil</button></div></td></tr>')
            })
            initTable();
            Pace.stop();
        }
    })
}
function getAreas(){
    Pace.restart();
    $("#tableWithExportOptions").dataTable().fnDestroy();
    $.ajax({
        type:"GET",
        url:base_url+"/general/getAreas",
        success:function(data){
            $("#tableWithExportOptions tbody").empty();
            $.each(data,function(key,area){
                $("#tableWithExportOptions tbody").append('<tr id="'+area.AreaID+'">\
                    <td>'+area.AreaName+'</td>\
                    <td>'+area.CountyName+'</td>\
                    <td><div class="pull-left"><button class="btn btn-warning getAreaDetails btn-xs m-r-10" id="duzenle">Düzenle</button><button class="btn btn-danger deleteAreaModal btn-xs">Sil</button></div></td></tr>')
            })
            initTable();
            Pace.stop();
        }
    })
}
function addNewTechnicalService(){
    var data = $("#appendNewTechnicalServiceData" ).serializeObject();
    $(".modalError").html('Lütfen bekleyiniz...');
    $.ajax({
        type:"POST",
        url:base_url+"/admin/addNewTechnicalService",
        data:data,
        success:function(data){
            $(".modalError").html(data.message).removeClass("unvisible");
            getTechnicalServices();
            setTimeout(function(){
                $(".modalError").html('').addClass("unvisible");
                $(".modalError").parents("div.modal").modal("hide");
            },modalCloseTimeout)
        }
    })
}
function updateTechnicalService(){
    var data = $("#updateTechnicalServiceData" ).serializeObject();
    $(".updateModalError").html('Lütfen bekleyiniz...');
    $.ajax({
        type:"POST",
        url:base_url+"/admin/updateTechnicalService",
        data:data,
        success:function(data){
            $(".updateModalError").html(data.message).removeClass("unvisible");
            getTechnicalServices();
              setTimeout(function(){
                $(".updateModalError").addClass("unvisible");
                $("#modalSlideUp").modal("hide");
            },modalCloseTimeout)
        }
    })
}
function getTechnicalServices(){
    Pace.restart();
    $("#tableWithExportOptions").dataTable().fnDestroy();
    $.ajax({
        type:"GET",
        url:base_url+"/general/getTechnicalServiceList",
        success:function(data){
            $("#tableWithExportOptions tbody").empty();
            $.each(data,function(key,technicalService){
                $("#tableWithExportOptions tbody").append('<tr id="'+technicalService.TechnicalServiceListID+'">\
                    <td>'+technicalService.ServiceName+'</td>\
                    <td>'+technicalService.Adress+'</td>\
                    <td>'+technicalService.InvoiceTelephone+'</td>\
                    <td>'+technicalService.InvoiceMobile+'</td>\
                    <td>'+technicalService.InvoiceEmail+'</td>\
                    <td><div class="pull-left"><button class="btn btn-info getQualifiedUsers btn-xs m-r-5">Yetkili Kişiler</button><button class="btn btn-primary getTechnicalServiceUsers btn-xs">Kullanıcı Ata</button><button class="btn btn-warning getTechnicalServiceDetails btn-xs m-r-5 m-l-5" id="duzenle">Düzenle</button><button class="btn btn-danger deleteTechnicalServiceModal btn-xs">Sil</button></div></td></tr>')
            })
            initTable(291);
            Pace.stop();
        }
    })
}
function addNewCompanyDailyGuest(){
    var data = $("#appendNewCompanyDailyGuestData" ).serializeObject();
    $(".modalError").html('Lütfen bekleyiniz...');
    $.ajax({
        type:"POST",
        url:base_url+"/admin/addNewCompanyDailyGuest",
        data:data,
        success:function(data){
            $(".modalError").html(data.message).removeClass("unvisible");
            getCompanyDailyGuest();
            setTimeout(function(){
                $(".modalError").addClass("unvisible");
                $(".modalError").parents("div.modal").modal("hide");
                $("#appendNewCompanyDailyGuestData label").removeClass("fade");
                $("#appendNewCompanyDailyGuestData").find("input").val("");
                $("#appendNewCompanyDailyGuestData").find("select").val(0).change();
            },modalCloseTimeout)
        }
    })
}
function getCompanyDailyGuest(){
    Pace.restart();
    $("#tableWithExportOptions").dataTable().fnDestroy();
    $.ajax({
        type:"GET",
        url:base_url+"/general/getCompanyDailyGuest",
        success:function(data){
            $("#tableWithExportOptions tbody").empty();
            $.each(data,function(key,dailyGuests){
                $("#tableWithExportOptions tbody").append('<tr id="'+dailyGuests.TotalDailyGuestID+'">\
                    <td>'+dailyGuests.CompanyName+'</td>\
                    <td>'+dailyGuests.Date+'</td>\
                    <td>'+dailyGuests.TotalGuest+'</td>\
                    <td><div class="pull-left"><button class="btn btn-warning getCompanyDailyGuestDetails btn-xs m-r-10" id="duzenle">Düzenle</button><!-- <button class="btn btn-danger deleteCompanyDailyGuestModal btn-xs">Sil</button> --></div></td></tr>')
            })
            initTable();
            Pace.stop();
        }
    })
}
function updateCompanyDailyGuest(){
    var data = $("#updateCompanyDailyGuestData" ).serializeObject();
    $(".updateModalError").html('Lütfen bekleyiniz...').removeClass("unvisible");
    $.ajax({
        type:"POST",
        url:base_url+"/admin/updateCompanyDailyGuest",
        data:data,
        success:function(data){
            $(".updateModalError").html(data.message).removeClass("unvisible");
            getCompanyDailyGuest();
            setTimeout(function(){
                $(".updateModalError").addClass("unvisible");
                $("#modalSlideUp").modal("hide");
            },modalCloseTimeout)
        }
    })
}
function getCompanyBarGroups(){
    Pace.restart();
    $("#tableWithExportOptions").dataTable().fnDestroy();
    $.ajax({
        type:"GET",
        url:base_url+"/general/getCompanyBarGroups",
        success:function(data){
            $("#tableWithExportOptions tbody").empty();
            $.each(data,function(key,barGroup){
                $("#tableWithExportOptions tbody").append('<tr id="'+barGroup.CompanyID+'">\
                    <td>'+barGroup.CompanyName+'</td>\
                    <td>'+barGroup.ToplamBar+'</td>\
                    <td><div class="pull-left"><button class="btn btn-warning getCompanyBarGroupDetails btn-xs m-r-10" id="duzenle">Bar Grubu Ata</button></td></tr>')
            })
            initTable();
            Pace.stop();
        }
    })
}
function updateCompanyBarGroup(){
    var data = $("#updateCompanyBarGroupData" ).serializeObject();
    $(".updateModalError").html('Lütfen bekleyiniz...').removeClass("unvisible");
    $.ajax({
        type:"POST",
        url:base_url+"/admin/updateCompanyBarGroup",
        data:data,
        success:function(data){
            $(".updateModalError").html(data.message).removeClass("unvisible");
            getCompanyBarGroups();
            setTimeout(function(){
                $(".updateModalError").addClass("unvisible");
                $("#modalSlideUp").modal("hide");
            },modalCloseTimeout)
        }
    })
}
function updateTechnicalServiceUser(){
    var data = $("#updateTechnicalServiceUserData").serializeObject();
    $(".updateModalError").html('Lütfen bekleyiniz...').removeClass("unvisible");
    $.ajax({
        type:"POST",
        url:base_url+"/admin/updateTechnicalServiceUser",
        data:data,
        success:function(data){
            $(".updateModalError").html(data.message).removeClass("unvisible");
            getTechnicalServices();
            setTimeout(function(){
                $(".updateModalError").addClass("unvisible");
                $("#technicalServiceUsers").modal("hide");
            },modalCloseTimeout)
        }
    })
}
function addNewTap(buttonsArray){
    var data = $("#appendNewTapData" ).serializeObject();
    data.buttons = buttonsArray;
    $(".modalError").html('Lütfen bekleyiniz...');
    $.ajax({
        type:"POST",
        url:base_url+"/admin/addNewTap",
        data:data,
        success:function(data){
            $(".modalError").html(data.message).removeClass("unvisible");
            getTaps();
            setTimeout(function(){
                $(".modalError").html('').addClass("unvisible");
                $(".modalError").parents("div.modal").modal("hide");
                $("#appendNewCompanyDailyGuestData label").removeClass("fade");
                $("#appendNewCompanyDailyGuestData").find("input").val("");
                $("#appendNewCompanyDailyGuestData").find("select").val(0).change();
            },modalCloseTimeout)
        }
    })
}
function getTaps(){
    Pace.restart();
    $("#tableWithExportOptions").dataTable().fnDestroy();
    $.ajax({
        type:"GET",
        url:base_url+"/general/getTaps",
        success:function(data){
            $("#tableWithExportOptions tbody").empty();
            $.each(data,function(key,tap){
                $("#tableWithExportOptions tbody").append('<tr id="'+tap.TapID+'">\
                    <td>'+tap.ID1+'</td>\
                    <td>'+tap.status+'</td>\
                    <td>'+tap.Name+'</td>\
                    <td>'+tap.HoldingName+'</td>\
                    <td>'+tap.CompanyName+'</td>\
                    <td>'+tap.BarGroupName+'</td>\
                    <td>'+tap.AlcoholGroupName+'</td>\
                    <td>'+tap.AlcoholTypeName+'</td>\
                    <td>'+tap.AlcoholBrandName+'</td>\
                    <td><div class="pull-left"><button class="btn btn-warning getTapDetails btn-xs m-r-10" id="duzenle">Düzenle</button><button class="btn btn-danger btn-xs">Sil</button></div></td></tr>')
            })
            initTable();
            Pace.stop();
        }
    })
}
function updateTap(buttonsArray){
    var data = $("#updateTapData" ).serializeObject();
    data.buttons = buttonsArray;
    $(".updateModalError").html('Lütfen bekleyiniz...').removeClass("unvisible");
    $.ajax({
        type:"POST",
        url:base_url+"/admin/updateTap",
        data:data,
        success:function(data){
            $(".updateModalError").html(data.message).removeClass("unvisible");
            getTaps();
            setTimeout(function(){
                $(".updateModalError").addClass("unvisible");
                $("#modalSlideUp").modal("hide");
            },modalCloseTimeout)
        }
    })
}
function changePassword(){
        var password = $("#password").val();
        var password2 = $("#password2").val();
        var userId = $(".changePassword").attr("id");
        Pace.restart();
        $.ajax({
          type:"POST",
          url:"/admin/changePassword",
          dataType:"json",
          data:{password:password,password2:password2,userId:userId},
          success:function(data){
            Pace.stop();
            if(data.resultCode == 0){
              $(".changePasswordModalError").html(data.message).removeClass("unvisible");
                  setTimeout(function(){
                    $(".changePasswordModalError").addClass("unvisible");
                    $("#changeUserPassword").modal("hide");
                },modalCloseTimeout)
            }
          }
        })
      }