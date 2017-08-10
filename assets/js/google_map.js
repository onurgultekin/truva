/* ============================================================
 * Google Map
 * Render maps using Google Maps JS API
 * For DEMO purposes only. Extract what you need.
 * ============================================================ */
(function($) {

    'use strict';

    // When the window has finished loading create our google map below
    google.maps.event.addDomListener(window, 'load', init);

    var map;
    var zoomLevel = 5;

    function init() {
        // Basic options for a simple Google Map
        // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
        var mapOptions = {
            // How zoomed in you want the map to start at (always required)
            zoom: zoomLevel,
            disableDefaultUI: true,
            scrollwheel: false,
            // The latitude and longitude to center the map (always required)
            center: new google.maps.LatLng(41.015137, 28.979530), // İstanbul

            // Map styling
            styles: [{
                featureType: 'water',
                elementType: 'all',
                stylers: [{
                    hue: '#e9ebed'
                }, {
                    saturation: -78
                }, {
                    lightness: 67
                }, {
                    visibility: 'simplified'
                }]
            }, {
                featureType: 'landscape',
                elementType: 'all',
                stylers: [{
                    hue: '#ffffff'
                }, {
                    saturation: -100
                }, {
                    lightness: 100
                }, {
                    visibility: 'simplified'
                }]
            }, {
                featureType: 'road',
                elementType: 'geometry',
                stylers: [{
                    hue: '#bbc0c4'
                }, {
                    saturation: -93
                }, {
                    lightness: 31
                }, {
                    visibility: 'simplified'
                }]
            }, {
                featureType: 'poi',
                elementType: 'all',
                stylers: [{
                    hue: '#ffffff'
                }, {
                    saturation: -100
                }, {
                    lightness: 100
                }, {
                    visibility: 'off'
                }]
            }, {
                featureType: 'road.local',
                elementType: 'geometry',
                stylers: [{
                    hue: '#e9ebed'
                }, {
                    saturation: -90
                }, {
                    lightness: -8
                }, {
                    visibility: 'simplified'
                }]
            }, {
                featureType: 'transit',
                elementType: 'all',
                stylers: [{
                    hue: '#e9ebed'
                }, {
                    saturation: 10
                }, {
                    lightness: 69
                }, {
                    visibility: 'on'
                }]
            }, {
                featureType: 'administrative.locality',
                elementType: 'all',
                stylers: [{
                    hue: '#2c2e33'
                }, {
                    saturation: 7
                }, {
                    lightness: 19
                }, {
                    visibility: 'on'
                }]
            }, {
                featureType: 'road',
                elementType: 'labels',
                stylers: [{
                    hue: '#bbc0c4'
                }, {
                    saturation: -93
                }, {
                    lightness: 31
                }, {
                    visibility: 'on'
                }]
            }, {
                featureType: 'road.arterial',
                elementType: 'labels',
                stylers: [{
                    hue: '#bbc0c4'
                }, {
                    saturation: -93
                }, {
                    lightness: -2
                }, {
                    visibility: 'simplified'
                }]
            }]
        };

        // Get the HTML DOM element that will contain your map 
        // We are using a div with id="map" seen below in the <body>
        var mapElement = document.getElementById('google-map');

        // Create the Google Map using out element and options defined above
        map = new google.maps.Map(mapElement, mapOptions);
        $.getJSON(base_url+"/general/getCollectorList", function(json1) {
            $.each(json1, function(key, data) {
                var latLng = new google.maps.LatLng(data.Latitude, data.Longitude); 
                // Creating a marker and putting it on the map
                var marker = new google.maps.Marker({
                    position: latLng,
                    map: map,
                    title:"Buraya açıklama gelecek"
                });
                var contentString = data.notification_email;

                var infowindow = new google.maps.InfoWindow({
                  content: contentString
                });
                marker.setMap(map);
                marker.addListener('mouseover', function() {
                    infowindow.open(map, this);
                });

                // assuming you also want to hide the infowindow when user mouses-out
                marker.addListener('mouseout', function() {
                    infowindow.close();
                });
            });
        });
    }

    $(document).ready(function() {
        $('#map-zoom-in').click(function() {
            map.setZoom(++zoomLevel);
        });
        $('#map-zoom-out').click(function() {
            map.setZoom(--zoomLevel);
        });
    });

})(window.jQuery);