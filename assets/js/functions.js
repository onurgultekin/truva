var base_url = 'http://test.truva.co';
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
    $(".countriesinmodal").on("change",function(){
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
var initTable = function() {
    var table = $('#tableWithExportOptions');
    var extensions = {
        "sFilter": "dataTables_filter custom_filter_class",
        "sLength": "dataTables_length custom_length_class"
    };
    var settings = {
        "sDom": "<'row'<'col-md-12 pull-left m-t-10'l>><t><'row'<p i>>",
        "destroy": true,
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "scrollCollapse": false,
        "oLanguage": {
            "sLengthMenu": "_MENU_  <span style='vertical-align:bottom'>kayıt göster</span>",
            "sInfo": " _TOTAL_ kayıt arasından <b>_START_ ve _END_</b> arası gösteriliyor."
        },
        "dom": 'rt<"bottom"ilp><"clear">',
        "columnDefs": [ {
              "targets": 'no-sort',
              "width":"184px",
              "orderable": false
        } ],
        "iDisplayLength": 20,
        "aLengthMenu": [[10, 20, 50, -1], [10, 20, 50, "All"]],
        "pagingType": "simple_numbers",
        "scrollX": true
    };
    table.dataTable(settings);
    $('#search-table').keyup(function() {
        table.fnFilter($(this).val());
    });
    
}
function getDetails(button,endpoint,elementName,appendableDiv){
    $("body").on("click",button,function(){
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
                            HoldingID:{min:1},
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
                    });
                    $("#TotalGuest").autoNumeric('init', {
                      aSep: '',
                      aPad: false
                    });
                }
            }
        })
        Pace.stop();
    })
}
function addNewHolding(){
    var data = $("#appendNewHoldingData" ).serializeObject();
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
            },3000)
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
            },3000)
        }
    })
}
function getHoldings(){
    Pace.restart();
    $("#tableWithExportOptions").dataTable().fnDestroy();
    $.ajax({
        type:"GET",
        url:base_url+"/general/getHoldings",
        success:function(data){
            $("#tableWithExportOptions tbody").empty();
            $.each(data,function(key,holding){
                $("#tableWithExportOptions tbody").append('<tr id="'+holding.HoldingID+'">\
                    <td>'+holding.HoldingName+'</td>\
                    <td>'+holding.HoldingEmail+'</td>\
                    <td>'+holding.HoldingTelephone+'</td>\
                    <td>'+holding.CityName+'</td>\
                    <td>'+holding.CountyName+'</td>\
                    <td>'+holding.AreaName+'</td>\
                    <td><div class="pull-left"><button class="btn btn-primary getCompanyByHoldingId btn-xs" id= "'+holding.HoldingID+'">Detay</button><button class="btn btn-warning getHoldingDetails btn-xs m-l-10 m-r-10">Düzenle</button><button class="btn btn-danger deleteHoldingModal btn-xs">Sil</button></div></td></tr>')
            })
            initTable();
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
            },3000);
        }
    })
}
function getCompanies(){
    Pace.restart();
    $("#tableWithExportOptions").dataTable().fnDestroy();
    $.ajax({
        type:"GET",
        url:base_url+"/general/getCompanies",
        success:function(data){
            $("#tableWithExportOptions tbody").empty();
            $.each(data,function(key,company){
                $("#tableWithExportOptions tbody").append('<tr id="'+company.CompanyID+'"><td>'+company.CompanyName+'</td><td>'+company.CompanyType+'</td><td>'+company.TotalBar+'</td><td>'+company.TotalTap+'</td><td><div class="pull-left"><button class="btn btn-primary getBarGroupListForCompany btn-xs" id="'+company.CompanyID+'">Detay</button><button class="btn btn-warning getCompanyDetails btn-xs m-r-10 m-l-10">Düzenle</button><button class="btn btn-danger deleteCompanyModal btn-xs">Sil</button></div></td></tr>')
            })
            initTable();
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
                    $.each(data,function(key,company){
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
        if(selectedHolding != 0){
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
            },3000)
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
            },3000)
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
                $("#tableWithExportOptions tbody").append('<tr id="'+alcoholBrand.AlcoholBrandID+'"><td>'+alcoholBrand.Code+'</td><td>'+alcoholBrand.Name+'</td><td><div class="pull-left"><button class="btn btn-warning getAlcoholBrandDetails btn-xs m-r-10" id="duzenle">Düzenle</button><button class="btn btn-danger deleteAlcoholBrandModal btn-xs">Sil</button></div></td></tr>')
            })
            initTable();
            Pace.stop();
        }
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
            },3000)
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
            },3000)
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
            },3000);
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
            },3000);
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
                $("#tableWithExportOptions tbody").append('<tr id="'+alcoholType.AlcoholTypeID+'"><td>'+alcoholType.Code+'</td><td>'+alcoholType.Name+'</td><td><div class="pull-left"><button class="btn btn-warning getAlcoholTypeDetails m-r-10 btn-xs" id="duzenle">Düzenle</button><button class="btn btn-danger deleteAlcoholTypeModal btn-xs">Sil</button></div></td></tr>')
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
            },3000)
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
            },3000)
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
            },3000);
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
            },3000);
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
            },3000)
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
            },3000)
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
            },3000)
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
            },3000)
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
              $("#tableWithExportOptions tbody").append('<tr id="'+collector.collector_id+'"><td>'+collector.ip_address+'</td><td>'+collector.notification_email+'</td><td>'+collector.Barcode+'</td><td>'+collector.Latitude+'</td><td>'+collector.Longitude+'</td><td><div class="pull-left"><button class="btn btn-warning getCollectorDetails btn-xs m-r-10" id="duzenle">Düzenle</button><button class="btn btn-danger btn-xs deleteCollectorModal">Sil</button></div></td></tr>')
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
            },3000)
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
            },3000)
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
            },3000)
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
            },3000)
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
            },3000)
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
            getBarGroups();
            setTimeout(function(){
                $(".modalError").html('').addClass("unvisible");
            },3000);
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
            },3000)
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
            },3000)
        }
    })
}