$(function(){
        initTable();
        getCitiesInModal();
        getDistrictsInModal();
        getAreasInModal();
        getDetails(".getCompanyDetails","/general/getCompanyById","companyId",".appendCompanyDataHere");
        getCompanyByCountryId();
        getCompanyByCityId();
        getCompanyByCountyId();
        getCompanyByAreaId();
        getCompanyByHoldingId();
        getBarGroupListForCompany();
        $("#appendNewCompanyData").validate({
          rules: {
            CountryID:{min:1},
            CityID:{min:1},
            CountyID:{min:1},
            AreaID:{min:1},
            CompanyTypeID:{min:1}
        },
          submitHandler: function(form) {
            addNewCompany();
            }
        });
        $("#addNewCompanyModal").on("shown.bs.modal",function(){
          setTimeout(function () {$('select').select2();}, 300);
        })
        $("body").on("click",".deleteCompanyModal",function(){
          var companyId = $(this).parents("tr").attr("id");
          var companyName = $(this).parents("tr").find("td:eq(0)").html();
          $(".companyNameinModal").html(companyName);
          $(".deleteCompanyButton").attr("id",companyId);
          $("#modalSlideLeft").modal();
        })
        $("body").on("click",".deleteCompanyButton",function(){
          var CompanyID = $(this).attr("id");
          $(".deleteModalError").html('Lütfen bekleyiniz...').removeClass("unvisible");
          $.ajax({
            type:"POST",
            url:base_url+"/admin/deleteCompany",
            data:{CompanyID:CompanyID},
            success:function(data){
              $(".deleteModalError").html(data.message).removeClass("unvisible");
              $("table").find("tr#"+CompanyID).fadeOut(500,function(){
                getCompanies();
                setTimeout(function(){
                    $(".deleteModalError").addClass("unvisible");
                    $("#modalSlideLeft").modal("hide");
                },1000);
              })
            }
          })
        })
      })