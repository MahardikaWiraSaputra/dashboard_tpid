<div class="content">
            <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    Kategori : <?php echo ucwords($kategori);?>
                </h2>
            </div>
            <div class="intro-y grid grid-cols-12 gap-6 mt-5">
                <!-- BEGIN: Blog Layout -->
                <?php foreach($query as $data):?>
                    <div class="intro-y blog col-span-12 md:col-span-4 box">
                    <a href="javascript:;" onclick="load_modal(<?=$data['ID']?>)">
                    <div class="blog__preview image-fit">
                        <img alt="" class="rounded-t-md" src="<?=$data['GAMBAR'];?>">
                        <div class="absolute bottom-0 text-white px-5 pb-6 z-10"> <span class="blog__category px-2 py-1 rounded"><?=$data['KATEGORI'];?></span> <p class="block font-medium text-xl mt-3"><?=$data['INDIKATOR'];?></p> </div>
                    </div>
                    <div class="px-5 pt-3 pb-5 border-t border-gray-200">
                        <div class="w-full flex text-gray-600 text-xs sm:text-sm">
                            <div class="ml-auto"> Sumber Data: <span class="font-medium"><?=$data['NAMA_SKPD']?></span> </div>
                        </div>
                    </div>
                    <div class="p-5"></div>
                    </a>
                </div>
                <?php endforeach;?>
                <!-- END: Blog Layout -->
            </div>             
</div>

<div class="modal" id="load_modal">
   <div class="modal__content modal__content--xl">
      <div class="p-5 grid grid-cols-12 gap-1 row-gap-1">
         <div class="col-span-12 sm:col-span-12 lg:col-span-12 col-xs-12">
            <div id="load_chart">
            </div>
         </div>
      </div>
   </div>
</div>

<?php $this->load->view('js');?>
<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.candy.js"></script>
<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>

<script>
    
    function load_modal(param){
        $('#load_modal').modal('show');
        $.ajax({
                url : "dashboard/load_data/"+param,
                type: "GET",
                dataType: "JSON",
                beforeSend:()=>{
                },
                success:(data)=>
                {
                   const dataSource = {
                        chart: {
                            height: "100px",
                            baseFontSize: "13",
                            // baseFontColor: "#1C3FAA",
                            caption: data.caption,
                            subcaption: "Sumber : "+data.subcaption,
                            yaxisname: "Total",
                            aligncaptionwithcanvas: "0",
                            plottooltext: "<b>$dataValue</b> Perizinan",
                            theme: "fusion"
                        },
                        data: data.tabel
                        };

                   FusionCharts.ready(function() {
                        var myChart = new FusionCharts({
                            type: "bar2d",
                            color: data.color,
                            renderAt: "load_chart",
                            width: "100%", //width of the chart
                            height: "550", //height of the chart
                            dataFormat: "json",
                            dataSource
                        }).render();
                   });
                },
                    error:(xhr, status, error)=>{
                        $("#info").html(errorMessage)
                }
        });
    }

</script>