$(function(){
        $("#TaxNo").mask("?9999999999");
        $("#InvoiceTelephone, #InvoiceMobile, #HoldingTelephone,#HoldingMobile,#HoldingFax").mask("?(999) 999 99 99");
        initTable();
        getCitiesInModal();
        getDistrictsInModal();
        getAreasInModal();
        getDetails(".getHoldingDetails","/general/getHoldingById","holdingId",".appendHoldingDataHere");
        getHoldingByCountryId();
        getHoldingByCityId();
        getHoldingByCountyId();
        getHoldingByAreaId();
        getCompanyByHoldingIdForHoldingPage();
        $("#appendNewHoldingData").validate({
            rules: {
              CountryID:{min:1},
              CityID:{min:1},
              CountyID:{min:1},
              AreaID:{min:1}
          },
          submitHandler: function(form) {
            addNewHolding();
            }
        });
        $("body").on("click",".deleteHoldingModal",function(){
          var companyId = $(this).parents("tr").attr("id");
          var companyName = $(this).parents("tr").find("td:eq(0)").html();
          $(".holdingNameinModal").html(companyName);
          $(".deleteHoldingButton").attr("id",companyId);
          $("#modalSlideLeft").modal();
        })
        $("body").on("click",".deleteHoldingButton",function(){
          var HoldingID = $(this).attr("id");
          $(".deleteModalError").html('Lütfen bekleyiniz...').removeClass("unvisible");
          $.ajax({
            type:"POST",
            url:base_url+"/admin/deleteHolding",
            data:{HoldingID:HoldingID},
            success:function(data){
              $(".deleteModalError").html(data.message).removeClass("unvisible");
              $("table").find("tr#"+HoldingID).fadeOut(500,function(){
                getHoldings();
                setTimeout(function(){
                    $(".deleteModalError").addClass("unvisible");
                    $("#modalSlideLeft").modal("hide");
                },1000);
              })
            }
          })
        })
      })