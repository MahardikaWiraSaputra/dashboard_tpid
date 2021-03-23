<!DOCTYPE html>
<html lang="en">
   <!-- BEGIN: Head -->
   <head>
      <meta charset="utf-8">
      <link href="<?=base_url();?>assets/images/logo-small.png" rel="shortcut icon">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="keywords" content="">
      <meta name="author" content="">
      <title>Banyuwangi Connect</title>
      <!-- BEGIN: CSS Assets-->
      <link rel="stylesheet" href="<?=base_url()?>assets/css/app-1.css">
      <!-- END: CSS Assets-->
   </head>
   <!-- END: Head -->
   <body class="login">
      <div class="container sm:px-10">
      <div class="block xl:grid grid-cols-2 gap-4">
         <!-- BEGIN: Login Info -->
         <div class="hidden xl:flex flex-col min-h-screen">
            <a href="" class="-intro-x flex items-center pt-5">
            <img alt="Banyuwangi Connect" class="w-6" src="<?=base_url()?>assets/images/logo-small.png">
            <span class="text-white text-lg ml-3"> Banyuwangi<span class="font-medium"> Connect</span> </span>
            </a>
            <div class="my-auto">
               <img alt="Banyuwangi Connect" class="-intro-x w-1/2 -mt-16" src="<?=base_url()?>assets/images/un_dashboard.svg">
               <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                  Sinkronisasi & Terupdate
               </div>
               <div class="-intro-x mt-5 text-lg text-white">Dashboard data Dinas Pemerintah Kabupaten Banyuwangi</div>
            </div>
         </div>
         <!-- END: Login Info -->
         <!-- BEGIN: Login Form -->
         <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
            <div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
               <div class="intro-x mt-8">
                  <img src="<?=base_url()?>assets/images/logo_bwi.png" alt="">
                  <br>
                  <a href="<?=base_url('dashboard')?>"><button class="button button--lg w-full xl:w-50 text-white bg-theme-6 xl:mr-3">Masuk ke Dashboard</button>
                  </a>
                  <br>
               </div>
            </div>
            <!-- END: Login Form -->
         </div>
      </div>
      <!-- BEGIN: JS Assets-->
      <script src="<?=base_url()?>assets/js/app-1.js"></script>
      <!-- END: JS Assets-->
   </body>
</html>