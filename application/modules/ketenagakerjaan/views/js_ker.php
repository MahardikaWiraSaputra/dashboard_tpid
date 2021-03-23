        <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
        <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.candy.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        
        <script type="text/javascript">
          
            function modal_by_kec(kecamatan) {
                var url = '<?=site_url();?>'
                // $.get('ketenagakerjaan/json_index', function(data, textStatus, jqXHR) {
                //     for (let index = 0; index < data.gender.length; index++) {
                //         const element = array[index];

                //     }
                //     console.log(element);
                // })
                $.ajax({
                    url: "ketenagakerjaan/modal_naker/" + kecamatan,
                    type: "GET",
                    dataType: "JSON",
                    beforeSend: () => {
                        $("#info").html(`<span style='font-size:2rem; color:##0335fc;'><strong>Sedang memperbaharui data..</strong></span>`)
                    },
                    success: (data) => {
                        $("#info").html("")
                        $("#modal_title").html('Grafik Pendaftar kartu kuning di kecamatan ' +kecamatan)
                        // console.log(data.by_pendidikan)
                        const dataSource = {
                        chart: {
                            caption: "Berdasarkan Jenjang Pendidikan",
                            "logoURL": "https://slide.banyuwangikab.go.id/media/efd85-logo.png",
                            "logoAlpha": "40",
                            "logoScale": "30",
                            "logoPosition": "TR",
                            subcaption: "Juni 2020",
                            xAxisPosition: "right",
                            xaxisname: "Jenjang Pendidikan",
                            yaxisname: "Jumlah",
                            numbersuffix: " Orang",
                            theme: "candy",
                            palettecolors: '42a5f5'
                        },
                        data: data.by_pendidikan
                    };

                    FusionCharts.ready(function() {
                        var myChart = new FusionCharts({
                            type: "column2d",
                            renderAt: "chart-container",
                            width: "560", //width of the chart
                            height: "400", //height of the chart
                            dataFormat: "json",
                            dataSource
                        }).render();
                    });

                    var newdata = {
                        chart: {
                            caption: "Berdasarkan Status Pernikahan",
                            subcaption: "Juni 2020",
                            showpercentvalues: "1",
                            defaultcenterlabel: "Android Distribution",
                            aligncaptionwithcanvas: "0",
                            captionpadding: "0",
                            decimals: "1",
                            enableMultiSlicing: "0",
                            animateClockwise: "1",
                            plottooltext: "<b>$percentValue</b> Pendaftar <b>$label</b>",
                            centerlabel: "# Users: $value",
                            theme: "candy",
                            palettecolors: 'ec407a, 42a5f5'
                        },
                        data: data.by_pernikahan
                    };

                    FusionCharts.ready(function() {
                        var myChart = new FusionCharts({
                            type: "pie2d",
                            renderAt: "chart-container2",
                            width: "410", //width of the chart
                            height: "400", //height of the chart
                            dataFormat: "json",
                            dataSource: newdata
                        }).render();
                    });

                    const primary = '#6993FF';
                    const success = '#1BC5BD';
                    const info = '#8950FC';
                    const warning = '#FFA800';
                    const danger = '#F64E60';
                    const dataSources = {
                        chart: {
                            caption: "Berdasarkan Gender",
                            subcaption: "Juni 2020",
                            showpercentvalues: "1",
                            defaultcenterlabel: "Android Distribution",
                            aligncaptionwithcanvas: "0",
                            captionpadding: "0",
                            decimals: "1",
                            enableMultiSlicing: "0",
                            animateClockwise: "1",
                            "smartLineColor": "#ff0000",
                            "smartLineThickness": "2",
                            "smartLineAlpha": "100",
                            "isSmartLineSlanted": "0",
                            plottooltext: "<b>$percentValue</b> Pendaftar <b>$label</b>",
                            centerlabel: "# Users: $value",
                            theme: "candy",
                            palettecolors: 'ec407a, 42a5f5'
                        },
                        data: data.by_gender
                    };

                    FusionCharts.ready(function() {
                        var myChart = new FusionCharts({
                            type: "pie2d",
                            renderAt: "chart-container1",
                            width: "330", //width of the chart
                            height: "400", //height of the chart
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