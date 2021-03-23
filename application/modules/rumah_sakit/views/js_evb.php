        <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
        <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.candy.js"></script>
        <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>

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
                    url : "evb/json_index",
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
                        caption: "Ketersediaan jumlah kamar hari ini",
                        subcaption: "RSUD Blambangan",
                        yaxisname: "Total",
                        palettecolors: "#88D786, #c7c5c6",
                        plotgradientcolor: " ",
                        theme: "fusion",
                        yaxismaxvalue: "30",
                        numdivlines: "2",
                        showlegend: "1",
                        interactivelegend: "0",
                        showvalues: "0",
                        showsum: "0",
                        rotateLabels: "0",
                        labelDisplay: "wrap",
                        maxLabelWidthPercent: "50",
                    },
                    categories: [
                        {
                        rotateLabels: "0",
                        labelDisplay: "wrap",
                        maxLabelWidthPercent: "50",
                        category: [
                            {
                            label: "KELAS UTAMA"
                            },
                            {
                            label: "KELAS I"
                            },
                            {
                            label: "KELAS II"
                            },
                            {
                            label: "KELAS III"
                            },
                            {
                            label: "ICU"
                            },
                            {
                            label: "KELAS BAYI (RG)"
                            },
                            {
                            label: "BERSALIN"
                            },
                            {
                            label: "NICU"
                            },
                            {
                            label: "ICCU"
                            },
                            {
                            label: "PERINATOLOGI II"
                            },
                            {
                            label: "PERINATOLOGI III"
                            },
                        ]
                        }
                    ],
                    dataset: [
                        {
                        seriesname: "Tersedia",
                        data: [
                            {
                            value: "11"
                            },
                            {
                            value: "20"
                            },
                            {
                            value: "47"
                            },
                            {
                            value: "89"
                            },
                            {
                            value: "59"
                            },
                            {
                            value: "13"
                            },
                            {
                            value: "23"
                            },
                            {
                            value: "15"
                            },
                            {
                            value: "16"
                            },
                            {
                            value: "2"
                            },
                            {
                            value: "3"
                            }
                        ]
                        },
                        {
                        seriesname: "Terisi",
                        data: [
                            {
                            value: "2"
                            },
                            {
                            value: "2"
                            },
                            {
                            value: "6"
                            },
                            {
                            value: "48"
                            },
                            {
                            value: "10"
                            },
                            {
                            value: "5"
                            },
                            {
                            value: "8"
                            },
                            {
                            value: "6"
                            },
                            {
                            value: "4"
                            },
                            {
                            value: "0"
                            },
                            {
                            value: "1"
                            }
                        ]
                        }
                    ],
                    
                    };

                    FusionCharts.ready(function() {
                    var myChart = new FusionCharts({
                        type: "stackedbar2d",
                        renderAt: "chart_pendaftar_kec_praktek",
                        width: "100%",
                        height: "500",
                        dataFormat: "json",
                        dataSource
                    }).render();
                    });

                    },
                        error:(xhr, status, error)=>{

                            $("#info").html(errorMessage)
                        }
                });
                })
        </script>
        
    
