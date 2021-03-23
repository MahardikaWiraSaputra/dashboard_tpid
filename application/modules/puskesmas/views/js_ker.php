        <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
        <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.candy.js"></script>
        <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

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

            var url_json = '<?=site_url('perizinan_nakes/map_nakes')?>';

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
                    $("#header-footer-modal-preview").modal('show')
                    $.get(url + 'puskesmas/modal_puskesmas_all/?kecamatan=' + kecamatan, {}, function(data) {
                        $("#modal_title").html('Detail Daftar Kunjungan Berdasarkan Puskesmas Kecamatan ' + kecamatan)
                        $('#ini_atab').html(data.tab_puskesmas[0]);
                        $('#ini_tab').html(data.tab_puskesmas[1]);
                        $('*[data-target="#pus0"]').click();
                    });
                });

                layer.on('click', function(e) {
                    layer.setStyle({
                        weight: 3,
                        fillOpacity: 0.7,
                    });
                    var url = "<?=site_url()?>"
                    $("#header-footer-modal-preview").modal('show')
                    $.get(url + 'puskesmas/modal_puskesmas_all/?kecamatan=' + kecamatan, {}, function(data) {
                        $("#modal_title").html('Detail Daftar Kunjungan Berdasarkan Puskesmas Kecamatan ' + kecamatan)
                        $('#ini_atab').html(data.tab_puskesmas[0]);
                        $('#ini_tab').html(data.tab_puskesmas[1]);
                        $('*[data-target="#pus0"]').click();
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
                url: "puskesmas/table_filter",
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
                    url : "puskesmas/json_index",
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
                            caption: "Sumber : Simpuswangi",
                            yaxisname: "Total",
                            palettecolors: "#91C714, #f1f5f8",
                            plotgradientcolor: " ",
                            rotateLabels: "0",
                            labelDisplay: "wrap",
                            theme: "fusion",
                            // yaxismaxvalue: "30",
                            numdivlines: "2",
                            showlegend: "1",
                            interactivelegend: "0",
                            showvalues: "0",
                            showsum: "0"
                        },
                        categories: [
                            {
                            category: data.all_diagnosa[0]
                            }
                        ],
                        dataset: [
                            {
                            seriesname: "Total Kunjungan",
                            data: data.all_diagnosa[1]
                            }
                        ],
                        };

                        FusionCharts.ready(function() {
                        var myChart = new FusionCharts({
                            type: "stackedbar2d",
                            type: "scrollbar2d",
                            renderAt: "chart_pendaftar_kec_praktek",
                            width: "100%",
                            height: "600",
                            dataFormat: "json",
                            dataSource
                        }).render();
                        });
                        
                        const dataSource_pus = {
                        chart: {
                            caption: "Sumber : Simpuswangi",
                            yaxisname: "Total",
                            palettecolors: "#91C714, #f1f5f8",
                            plotgradientcolor: " ",
                            rotateLabels: "0",
                            labelDisplay: "wrap",
                            theme: "fusion",
                            // yaxismaxvalue: "30",
                            numdivlines: "2",
                            showlegend: "1",
                            interactivelegend: "0",
                            showvalues: "0",
                            showsum: "0"
                        },
                        categories: [
                            {
                            category: data.all_puskesmas[0]
                            }
                        ],
                        dataset: [
                            {
                            seriesname: "Total Kunjungan",
                            data: data.all_puskesmas[1]
                            }
                        ],
                        };

                        FusionCharts.ready(function() {
                        var myChart = new FusionCharts({
                            type: "stackedbar2d",
                            type: "scrollbar2d",
                            renderAt: "chart_profesi",
                            width: "100%",
                            height: "600",
                            dataFormat: "json",
                            dataSource: dataSource_pus
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
            function modal_by_kec_filter(bulan,tahun,kecamatan) {
                var bulan,tahun,kecamatan;
                bulan = bulan;
                tahun = tahun;
                kecamatan = kecamatan;
                var url = '<?=site_url();?>'
                $.ajax({
                    url: "perizinan_nakes/modal_nakes",
                    type: "GET",
                    data: {bulan : bulan, tahun : tahun, kecamatan : kecamatan},
                    dataType: "JSON",
                    beforeSend: () => {
                        $("#info").html(`<span style='font-size:2rem; color:##0335fc;'><strong>Sedang memperbaharui data..</strong></span>`)
                    },
                    success: (data) => {
                        $("#info").html("")
                        $("#modal_title").html('Detail Perizinan Tenaga Kesehatan Kecamatan ' + kecamatan +' Bulan ' + data.waktu +' '+ tahun)
                        const dataSource = {
                        chart: {
                            caption: "Perizinan Tenaga Kesehatan",
                            subcaption: "Berdasarkan Kelurahan",
                            yaxisname: "Total",
                            palettecolors: "#91C714, #f1f5f8",
                            plotgradientcolor: " ",
                            theme: "candy",
                            yaxismaxvalue: "30",
                            numdivlines: "2",
                            showlegend: "1",
                            interactivelegend: "0",
                            showvalues: "0",
                            showsum: "0"
                        },
                        categories: [
                            {
                            category: data.kelurahan_by_kecamatan[0]
                            }
                        ],
                        dataset: [
                            {
                            seriesname: "Berlaku",
                            data: data.kelurahan_by_kecamatan[1]
                            },
                            {
                            seriesname: "Tidak Berlaku",
                            data: data.kelurahan_by_kecamatan[2]
                            }
                        ],
                        };

                        FusionCharts.ready(function() {
                        var myChart = new FusionCharts({
                            type: "stackedbar2d",
                            renderAt: "chart-container",
                            width: "100%",
                            height: "600",
                            dataFormat: "json",
                            dataSource
                        }).render();
                        });

                        const dataSources = {
                            chart: {
                                caption: "Perizinan Tenaga Kesehatan Berdasarkan Tempat Praktek",
                                plottooltext: "<b>$percentValue</b> Tenaga Kesehatan di $label",
                                showlegend: "1",
                                showpercentvalues: "1",
                                legendposition: "bottom",
                                usedataplotcolorforlabels: "1",
                                theme: "candy"
                            },
                            data: data.tempat_praktek_by_kecamatan
                            };

                            FusionCharts.ready(function() {
                            var myChart = new FusionCharts({
                                type: "pie2d",
                                renderAt: "chart-container1",
                                width: "100%",
                                height: "45%",
                                dataFormat: "json",
                                dataSource : dataSources
                            }).render();
                            });

                            const dataSource3 = {
                                chart: {
                                    caption: "Perizinan Tenaga Kesehatan ",
                                    subcaption: "Berdasarkan Jenis Surat",
                                    yaxisname: "Total",
                                    numvisibleplot: "8",
                                    labeldisplay: "auto",
                                    theme: "candy"
                                },
                                categories: [
                                    {
                                    category: data.by_surat[0]
                                    }
                                ],
                                dataset: [
                                    {
                                    seriesname: "Aktif",
                                    data: data.by_surat[1]
                                    },
                                    {
                                    seriesname: "Tidak Aktif",
                                    data: data.by_surat[2]
                                    }
                                ]
                                };

                                FusionCharts.ready(function() {
                                var myChart = new FusionCharts({
                                    type: "scrollcolumn2d",
                                    renderAt: "chart-container3",
                                    width: "100%",
                                    height: "250",
                                    dataFormat: "json",
                                    dataSource : dataSource3
                                }).render();
                                });
                    },
                    error: (xhr, status, error) => {

                        $("#info").html(errorMessage)
                    }
                });
            }
        </script>

        <script type="text/javascript">
            function modal_by_kec(kecamatan) {
                var kecamatan;
                kecamatan = kecamatan;
                var url = '<?=site_url();?>'
                $.ajax({
                    url: "puskesmas/modal_puskesmas_all",
                    type: "GET",
                    data: {kecamatan : kecamatan},
                    dataType: "JSON",
                    beforeSend: () => {
                        $("#info").html(`<span style='font-size:2rem; color:##0335fc;'><strong>Sedang memperbaharui data..</strong></span>`)
                    },
                    success: (data) => {
                        $("#info").html("")
                        $("#modal_title").html('Detail Daftar Kunjungan Berdasarkan Puskesmas Kecamatan ' + kecamatan)
                        $('#ini_atab').html(data.tab_puskesmas[0]);
                        $('#ini_tab').html(data.tab_puskesmas[1]);
                        $('*[data-target="#pus0"]').click();
                    

                    },
                    error: (xhr, status, error) => {

                        $("#info").html(errorMessage)
                    }
                });
                // console.log('tes');

            }
            
        </script>

        <script>
        
        function grafik_by_puskesmas(puskesmas,div)
        {
            $('#chart-container').empty();
            var puskesmas,div;
                puskesmas = puskesmas;
                div = div;
                var url = '<?=site_url();?>'
                $.ajax({
                    url: "puskesmas/diagnosa_by_puskesmas",
                    type: "GET",
                    data: {puskesmas : puskesmas},
                    dataType: "JSON",
                    beforeSend: () => {
                        
                    },
                    success: (data) => {
                    const dataSourcer = {
                        chart: {
                            caption: "Kunjungan Lama VS Kunjungan Baru",
                            yaxisname: "Total",
                            palettecolors: "#91C714, #f1f5f8",
                            plotgradientcolor: " ",
                            theme: "candy",
                            yaxismaxvalue: "30",
                            numdivlines: "2",
                            showlegend: "1",
                            interactivelegend: "0",
                            showvalues: "0",
                            showsum: "0"
                        },
                        categories: [
                            {
                            category: data.diagnosa_puskesmas[0]
                            }
                        ],
                        dataset: [
                            {
                            seriesname: "Kunjungan Lama",
                            data: data.diagnosa_puskesmas[1]
                            },
                            {
                            seriesname: "Kunjungan Baru",
                            data: data.diagnosa_puskesmas[2]
                            }
                        ],
                        };

                        FusionCharts.ready(function() {
                        var myChart = new FusionCharts({
                            type: "stackedbar2d",
                            type: "scrollbar2d",
                            renderAt: div,
                            width: "100%",
                            height: "400",
                            dataFormat: "json",
                            dataSource : dataSourcer
                        }).render();
                        });

                    },
                    error: (xhr, status, error) => {

                        $("#info").html(errorMessage)
                    }
                });
        }
        </script>