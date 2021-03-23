        <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
        <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.candy.js"></script>
        <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>

        <script>
        $(document).ready(function() {
            var map = L.map('peta_naker', {
                center: [-8.313829, 114.236571],
                zoom: 10,
                scrollWheelZoom: false,
                zoomControl: true
            });
            var roadMutant = L.gridLayer.googleMutant({
                maxZoom: 24,
                type: 'roadmap'
            }).addTo(map);
            new L.tileLayer('https://tile.openstreetmap.bzh/br/{z}/{x}/{y}.png').addTo(map);
            var greenIcon = L.icon({
                iconUrl: 'https://data.banyuwangikab.go.id/v2/assets/uploads/icons/icons8-marker-80.png',

                iconSize: [20, 20], // size of the icon
            });

            map.attributionControl.setPrefix('');

            var url_json = '<?=site_url('ketenagakerjaan/map_naker')?>';

            var hasilpasien = $.getJSON(url_json, function(data) {
                geoJsonLayer = L.geoJson(data, {
                        style: style,
                        onEachFeature: onEachFeature
                    })
                    .addTo(map);
            });

            function style(feature) {
                return {
                    fillColor: '#' + feature.properties.color,
                    weight: 1,
                    opacity: 1,
                    color: 'black',
                    fillOpacity: 0.7
                };
            }
            function highlightFeature(e) {
                var layer = e.target;
                layer.setStyle({
                    weight: 4,
                    fillOpacity: 0.7,
                });

                if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
                    layer.bringToFront();
                }
            }

            function resetHighlight(e) {
                geoJsonLayer.setStyle(style);
            }

            function onEachFeature(feature, layer) {
                var nama = feature.properties.kecamatan;
                var lat = feature.properties.kec_lat;
                var lon = feature.properties.kec_long;
                var ket = feature.properties.marker;
                var kecamatan_id = feature.properties.kecamatan_id;
                var kecamatan = feature.properties.kecamatan;
                var obj;
                var customPopup;
                var isipopup;
                var desa, jumlah_rumah, jumlah_kamar, keterangan;
                var customOptions = {
                    'maxWidth': '500',
                    'className': 'custom',
                    'color': "#b43838"
                }
                var iconku = '<span class="dot">' + feature.properties.kecamatan + '</span>'
                var myIcon = L.divIcon({
                    className: 'my-div-icon',
                    html: nama,
                    iconAnchor: [10, -13],
                });
                L.marker([lat, lon], {
                    icon: myIcon
                }).addTo(map);
                var marker = L.marker([lat, lon], {
                    icon: greenIcon
                }).addTo(map).on('click', function() {
                    var url = "<?=site_url()?>"
                    $("#header-footer-modal-preview-new").modal('show')
                    $.get(url + 'sosial/modal_sosial_kecamatan/?kecamatan=' + kecamatan, {}, function(data) {
                        $("#modal_title_detail").html('Detail Penerima PKH & BPNT Berdasarkan Kecamatan ' + kecamatan)
                        const dataSource = {
                        chart: {
                            height: "100px",
                            baseFontSize: "13",
                            caption: "Penerima BPNT berdasarkan Kelurahan ",
                            numberScaleValue: "1000,1000,1000",
                            numberScaleUnit: " Ribu, Juta, Milyar",
                            yaxisname: "Total",
                            aligncaptionwithcanvas: "0",
                            // plottooltext: "<b>$dataValue</b> Perizinan",
                            theme: "candy"
                        },
                        data: data.bpnt_filter
                        };

                        FusionCharts.ready(function() {
                        var myChart = new FusionCharts({
                            type: "bar2d",
                            color: "#269ffb",
                            renderAt: "chart-container_desa",
                            width: "100%",
                            height: "550",
                            dataFormat: "json",
                            dataSource
                        }).render();
                        });

                        const dataSources = {
                        chart: {
                            height: "100px",
                            baseFontSize: "13",
                            caption: "Penerima PKH berdasarkan Kelurahan",
                            numberScaleValue: "1000,1000,1000",
                            numberScaleUnit: " Ribu, Juta, Milyar",
                            yaxisname: "Total",
                            aligncaptionwithcanvas: "0",
                            // plottooltext: "<b>$dataValue</b> Perizinan",
                            theme: "candy"
                        },
                        data: data.pkh_filter
                        };

                        FusionCharts.ready(function() {
                        var myChart = new FusionCharts({
                            type: "bar2d",
                            color: "#269ffb",
                            renderAt: "chart-container_desa1",
                            width: "100%",
                            height: "550",
                            dataFormat: "json",
                            dataSource: dataSources
                        }).render();
                        });
                    });
                });

                layer.on('click', function(e) {
                    layer.setStyle({
                        weight: 3,
                        fillOpacity: 0.7,
                    });
                    var url = "<?=site_url()?>"
                    $.get(url + 'sosial/modal_sosial_kecamatan/?kecamatan=' + kecamatan, {}, function(data) {
                      $("#header-footer-modal-preview-new").modal('show')
                      $("#modal_title_detail").html('Detail Penerima PKH & BPNT Berdasarkan Kecamatan ' + kecamatan)

                      const dataSource = {
                        chart: {
                            height: "100px",
                            baseFontSize: "13",
                            caption: "Alokasi Dana Desa Terbesar-Terkecil Kecamatan "+kecamatan,
                            numberScaleValue: "1000,1000,1000",
                            numberScaleUnit: " Ribu, Juta, Milyar",
                            yaxisname: "Total",
                            aligncaptionwithcanvas: "0",
                            // plottooltext: "<b>$dataValue</b> Perizinan",
                            theme: "candy"
                        },
                        data: data.by_filter_kecamatan
                        };

                        FusionCharts.ready(function() {
                        var myChart = new FusionCharts({
                            type: "bar2d",
                            color: "#269ffb",
                            renderAt: "chart-container_desa",
                            width: "100%",
                            height: "550",
                            dataFormat: "json",
                            dataSource
                        }).render();
                        });

                        const dataSources = {
                            chart: {
                                caption: "Penyerapan Alokasi dana berdasarkan Bidang ",
                                plottooltext: "<b>$percentValue</b> Tenaga Kesehatan di $label",
                                showlegend: "1",
                                showpercentvalues: "1",
                                legendposition: "bottom",
                                usedataplotcolorforlabels: "1",
                                // labelDisplay: "wrap",
                                manageLabelOverflow : "1",
                                useEllipsesWhenOverflow : "1",
                                minimiseWrappingInLegend: "1",
                                theme: "candy"
                            },
                            data: data.by_kecamatan_filter_bidang
                            };

                            FusionCharts.ready(function() {
                            var myChart = new FusionCharts({
                                type: "pie2d",
                                renderAt: "chart-container_desa1",
                                width: "100%",
                                height: "60%",
                                dataFormat: "json",
                                dataSource : dataSources
                            }).render();
                            });

                    });
                });
            }
            });
        </script>


        <script type="text/javascript">
        $('#filter_bulan').change(function(){
            var bulan = $(this).find(':selected').attr('data-bulan')
            var tahun = $(this).find(':selected').attr('data-tahun')
            
            var url = '<?=site_url();?>'
            $.ajax({
                url: "perizinan_nakes/table_filter",
                type: "GET",
                data: {bulan : bulan, tahun : tahun},
                dataType: "JSON",
                beforeSend: () => {
                    $("#info").html(`<span style='font-size:2rem; color:##0335fc;'><strong>Sedang memperbaharui data..</strong></span>`)
                },
                success: (data) => {
                    $('#tabel_data tbody').html(data.table);
                },
                error: (xhr, status, error) => {
                    $("#info").html(errorMessage)
                }
             });

        });
        </script>

        <script>
        $(document).ready(function() {
                var url = '<?=site_url();?>'
                $.ajax({
                    url : "sosial/json_index",
                    type: "GET",
                    dataType: "JSON",
                    beforeSend:()=>{
                    },
                    success:(data)=>
                    {
                    $('#drop').removeClass('loader');
                    $("#info").html("")
                    const dataSource = {
                        chart: {
                            height: "100px",
                            baseFontSize: "13",
                            // baseFontColor: "#1C3FAA",
                            // caption: "Sumber : Sistem Perizinan Online",
                            numberScaleValue: "1000,1000,1000",
                            numberScaleUnit: " Ribu, Juta, Milyar",
                            yaxisname: "Total",
                            palettecolors: "269ffb",
                            aligncaptionwithcanvas: "0",
                            plottooltext: "<b>$dataValue</b> Penerima BPNT",
                            theme: "fusion"
                        },
                        data: data.bpnt
                        };

                        FusionCharts.ready(function() {
                        var myChart = new FusionCharts({
                            type: "bar2d",
                            color: "#269ffb",
                            renderAt: "chart_pendaftar_kec_praktek",
                            width: "560", //width of the chart
                            height: "550", //height of the chart
                            dataFormat: "json",
                            dataSource
                        }).render();
                        });
                        const dataSources = {
                        chart: {
                            height: "100px",
                            baseFontSize: "13",
                            // baseFontColor: "#1C3FAA",
                            // caption: "Sumber : Sistem Perizinan Online",
                            yaxisname: "Total",
                            numberScaleValue: "1000,1000,1000",
                            numberScaleUnit: " Ribu, Juta, Milyar",
                            palettecolors: "269ffb",
                            aligncaptionwithcanvas: "0",
                            plottooltext: "<b>$dataValue</b> Penerima PKH",
                            theme: "fusion"
                        },
                        data: data.pkh
                        };

                        FusionCharts.ready(function() {
                        var myChart = new FusionCharts({
                            type: "bar2d",
                            color: "#269ffb",
                            renderAt: "chart_profesi",
                            width: "560", //width of the chart
                            height: "550", //height of the chart
                            dataFormat: "json",
                            dataSource : dataSources
                        }).render();
                        });
                    },
                        error:(xhr, status, error)=>{

                            $("#info").html(errorMessage)
                        }
                });
                })
        </script>
        
        <script type="text/javascript">
            function modal_by_kec(kecamatan) {
                var kecamatan;
                kecamatan = kecamatan;
                var url = '<?=site_url();?>'
                $.ajax({
                    url: "sosial/modal_sosial_kecamatan",
                    type: "GET",
                    data: {kecamatan : kecamatan},
                    dataType: "JSON",
                    beforeSend: () => {
                        $("#info").html(`<span style='font-size:2rem; color:##0335fc;'><strong>Sedang memperbaharui data..</strong></span>`)
                    },
                    success: (data) => {
                        $("#info").html("")
                        $("#modal_title_detail").html('Detail Penerima PKH & BPNT Berdasarkan Kecamatan ' + kecamatan)
                        const dataSource = {
                        chart: {
                            height: "100px",
                            baseFontSize: "13",
                            caption: "Penerima BPNT berdasarkan Kelurahan ",
                            numberScaleValue: "1000,1000,1000",
                            numberScaleUnit: " Ribu, Juta, Milyar",
                            yaxisname: "Total",
                            aligncaptionwithcanvas: "0",
                            // plottooltext: "<b>$dataValue</b> Perizinan",
                            theme: "candy"
                        },
                        data: data.bpnt_filter
                        };

                        FusionCharts.ready(function() {
                        var myChart = new FusionCharts({
                            type: "bar2d",
                            color: "#269ffb",
                            renderAt: "chart-container_desa",
                            width: "100%",
                            height: "550",
                            dataFormat: "json",
                            dataSource
                        }).render();
                        });

                        const dataSources = {
                        chart: {
                            height: "100px",
                            baseFontSize: "13",
                            caption: "Penerima PKH berdasarkan Kelurahan",
                            numberScaleValue: "1000,1000,1000",
                            numberScaleUnit: " Ribu, Juta, Milyar",
                            yaxisname: "Total",
                            aligncaptionwithcanvas: "0",
                            // plottooltext: "<b>$dataValue</b> Perizinan",
                            theme: "candy"
                        },
                        data: data.pkh_filter
                        };

                        FusionCharts.ready(function() {
                        var myChart = new FusionCharts({
                            type: "bar2d",
                            color: "#269ffb",
                            renderAt: "chart-container_desa1",
                            width: "100%",
                            height: "550",
                            dataFormat: "json",
                            dataSource: dataSources
                        }).render();
                        });
                    },
                    error: (xhr, status, error) => {

                        $("#info").html(errorMessage)
                    }
                });
            }
        </script>

        