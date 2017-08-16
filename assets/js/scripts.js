(function($) {

    'use strict';

    $(document).ready(function() {
        // Initializes search overlay plugin.
        // Replace onSearchSubmit() and onKeyEnter() with 
        // your logic to perform a search and display results
        $(".list-view-wrapper").scrollbar();

        $('[data-pages="search"]').search({
            // Bind elements that are included inside search overlay
            searchField: '#overlay-search',
            closeButton: '.overlay-close',
            suggestions: '#overlay-suggestions',
            brand: '.brand',
             // Callback that will be run when you hit ENTER button on search box
            onSearchSubmit: function(searchString) {
                console.log("Search for: " + searchString);
            },
            // Callback that will be run whenever you enter a key into search box. 
            // Perform any live search here.  
            onKeyEnter: function(searchString) {
                console.log("Live search for: " + searchString);
                var searchField = $('#overlay-search');
                var searchResults = $('.search-results');

                /* 
                    Do AJAX call here to get search results
                    and update DOM and use the following block 
                    'searchResults.find('.result-name').each(function() {...}'
                    inside the AJAX callback to update the DOM
                */

                // Timeout is used for DEMO purpose only to simulate an AJAX call
                clearTimeout($.data(this, 'timer'));
                searchResults.fadeOut("fast"); // hide previously returned results until server returns new results
                var wait = setTimeout(function() {

                    searchResults.find('.result-name').each(function() {
                        if (searchField.val().length != 0) {
                            $(this).html(searchField.val());
                            searchResults.fadeIn("fast"); // reveal updated results
                        }
                    });
                }, 500);
                $(this).data('timer', wait);

            }
        })
        $(".countries").on("change",function(){
            var selectedCountry = $(this).val();
            $.ajax({
                type:"POST",
                url:base_url+"/general/getCitiesByCountryId",
                data:{countryId:selectedCountry},
                success:function(data){
                    if(selectedCountry!=0){
                    $(".cities").html('<option value="0">Lütfen seçin</option>').removeAttr("disabled").removeClass("disabled");
                    $.each(data,function(k,city){
                        $(".cities").append('<option value="'+city.CityID+'">'+city.CityName+'</option>');
                    })
                    }else{
                        $(".cities").html('<option value="0">Lütfen seçin</option>').attr("disabled","disabled").addClass("disabled");
                    }
                }
            })
        })
        $("body").on("change",".cities",function(){
            var selectedCity = $(this).val();
            $.ajax({
                type:"POST",
                url:base_url+"/general/getDistrictsByCityId",
                data:{cityId:selectedCity},
                success:function(data){
                    $(".districts").html('<option value="0">Lütfen seçin</option>').removeAttr("disabled").removeClass("disabled");
                    $.each(data,function(k,district){
                        $(".districts").append('<option value='+district.CountyID+'>'+district.CountyName+'</option>');
                    })
                }
            })
        })
        
        $("body").on("change",".districts",function(){
            var selectedDistrict = $(this).val();
            $.ajax({
                type:"POST",
                url:base_url+"/general/getAreasByDistrictId",
                data:{districtId:selectedDistrict},
                success:function(data){
                    $(".areas").html('<option value="0">Lütfen seçin</option>').removeAttr("disabled").removeClass("disabled");
                    $.each(data,function(k,area){
                        $(".areas").append('<option value='+area.AreaID+'>'+area.AreaName+'</option>');
                    })
                }
            })
        })
        $(".holdings").on("change",function(){
            var selectedHolding = $(this).val();
            $.ajax({
                type:"POST",
                url:base_url+"/general/getCompanyByHoldingId",
                data:{holdingId:selectedHolding},
                success:function(data){
                    $(".companies").html('<option value="0">Lütfen seçin</option>').removeAttr("disabled").removeClass("disabled");
                    $.each(data.message,function(k,company){
                        $(".companies").append('<option value="'+company.CompanyID+'">'+company.CompanyName+'</option>');
                    })
                }
            })
        })
        $(".companies").on("change",function(){
            var selectedHolding = $(this).val();
            $.ajax({
                type:"POST",
                url:base_url+"/general/getBarsByCompanyId",
                data:{companyId:selectedHolding},
                success:function(data){
                    if(data.message.length > 0){
                        $(".bars").html('<option value="0">Lütfen seçin</option>').removeAttr("disabled").removeClass("disabled");
                        $.each(data.message,function(k,bar){
                            $(".bars").append('<option value="'+bar.BarGroupID+'">'+bar.Name+'</option>');
                        })
                    }
                }
            })
        })
    });

    
    $('.panel-collapse label').on('click', function(e){
        e.stopPropagation();
    })
    
})(window.jQuery);