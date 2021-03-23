<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags-->
    <!-- Title-->
    <title>Stok Komoditas - TPID Kabupaten Banyuwangi</title>
    <!-- Favicon-->
    <link rel="icon" href="<?=base_url('assets/')?>img/core-img/favicon.ico">
    <!-- Core Stylesheet-->
    <link rel="stylesheet" href="<?=base_url('assets/')?>style.css">
</head>
    <!-- END: Head -->
    <body>
    <!-- Preloader-->
    <div class="preloader" id="preloader">
        <div class="spinner-grow text-light" role="status"><span class="sr-only">Loading...</span></div>
    </div>
    <!-- Header Area-->
    <header class="header-area header2">
        <div class="container">
            <div class="classy-nav-container breakpoint-off">
                <nav class="classy-navbar navbar2 justify-content-between" id="saasboxNav">
                    <!-- Logo-->
                    <a class="nav-brand me-5" href="<?=site_url('dashboard')?>"><img style="height: 50px;" src="https://banyuwangikab.go.id/img/logo_bwi.png" alt=""></a>
                    <!-- Navbar Toggler-->
                    <div class="classy-navbar-toggler"><span class="navbarToggler"><span></span><span></span><span></span><span></span></span>
                    </div>
                    <!-- Menu-->
                    <div class="classy-menu">
                        <!-- close btn-->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>
                        <!-- Nav Start-->
                        <div class="classynav">
                            <ul id="corenav">
                                <li><a href="<?=site_url('dashboard')?>">Beranda</a></li>
                                <li><a href="#home">Ekonomi</a></li>
                            </ul>
                            <!-- Login Button-->
                            <!-- <div class="login-btn-area ms-4 mt-4 mt-lg-0"><a class="btn saasbox-btn btn-sm" href="#">Buy Now</a></div> -->
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- Welcome Area-->
    <?php $this->load->view($layout);?>
    <!-- Footer Area-->
    <footer class="footer-area footer2 section-padding-120">
        <div class="container">
            <div class="row justify-content-between">
                <!-- Footer Widget Area-->
                <div class="col-12 col-sm-10 col-lg-3">
                    <div class="footer-widget-area mb-70">
                        <a class="d-block mb-4" href="index.html"><img src="https://banyuwangikab.go.id/img/logo_bwi.png" alt=""></a>
                        <p>Portal TPID Kabupaten Banyuwangi</p>
                    </div>
                </div>
                <!-- Footer Widget Area-->
                <!-- <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                    <div class="footer-widget-area mb-70">
                        <h5 class="widget-title">Important Links</h5>
                        <ul>
                            <li><a href="#" target="_blank">Terms &amp; Conditions</a></li>
                            <li><a href="#" target="_blank">About Licences</a></li>
                            <li><a href="#" target="_blank">Help &amp; Support</a></li>
                            <li><a href="#" target="_blank">Careers</a></li>
                            <li><a href="#" target="_blank">Privacy Policy</a></li>
                            <li><a href="#" target="_blank">Community &amp; Forum</a></li>
                        </ul>
                    </div>
                </div> -->
                <!-- Footer Widget Area-->
                <!-- <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                    <div class="footer-widget-area mb-70">
                        <h5 class="widget-title">Our Products</h5>
                        <ul>
                            <li><a href="#" target="_blank">Apland Landing</a></li>
                            <li><a href="#" target="_blank">Ecaps Admin</a></li>
                            <li><a href="#" target="_blank">Bigshop Ecommerce</a></li>
                            <li><a href="#" target="_blank">Classy Multipurpose</a></li>
                            <li><a href="#" target="_blank">Educamp Education</a></li>
                            <li><a href="#" target="_blank">Champ Portfolio</a></li>
                        </ul>
                    </div>
                </div> -->
                <!-- Footer Widget Area-->
                <!-- <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                    <div class="footer-widget-area mb-70">
                        <h5 class="widget-title">My Account</h5>
                        <ul>
                            <li><a href="#" target="_blank">Community &amp; Forum</a></li>
                            <li><a href="#" target="_blank">About Licences</a></li>
                            <li><a href="#" target="_blank">Careers</a></li>
                            <li><a href="#" target="_blank">Terms &amp; Conditions</a></li>
                            <li><a href="#" target="_blank">Privacy Policy</a></li>
                            <li><a href="#" target="_blank">Help &amp; Support</a></li>
                        </ul>
                    </div>
                </div> -->
            </div>
        </div>

    </footer>
    <!-- All JavaScript Files-->
    <script src="<?=base_url('assets/')?>js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url('assets/')?>js/jquery.min.js"></script>
    <script src="<?=base_url('assets/')?>js/default/classy-nav.min.js"></script>
    <script src="<?=base_url('assets/')?>js/waypoints.min.js"></script>
    <script src="<?=base_url('assets/')?>js/jquery.easing.min.js"></script>
    <script src="<?=base_url('assets/')?>js/default/jquery.scrollup.min.js"></script>
    <script src="<?=base_url('assets/')?>js/owl.carousel.min.js"></script>
    <script src="<?=base_url('assets/')?>js/imagesloaded.pkgd.min.js"></script>
    <script src="<?=base_url('assets/')?>js/default/isotope.pkgd.min.js"></script>
    <script src="<?=base_url('assets/')?>js/jquery.magnific-popup.min.js"></script>
    <script src="<?=base_url('assets/')?>js/jquery.animatedheadline.min.js"></script>
    <script src="<?=base_url('assets/')?>js/jquery.counterup.min.js"></script>
    <script src="<?=base_url('assets/')?>js/wow.min.js"></script>
    <script src="<?=base_url('assets/')?>js/jarallax.min.js"></script>
    <script src="<?=base_url('assets/')?>js/jarallax-video.min.js"></script>
    <script src="<?=base_url('assets/')?>js/default/cookiealert.js"></script>
    <script src="<?=base_url('assets/')?>js/default/jquery.passwordstrength.js"></script>
    <script src="<?=base_url('assets/')?>js/default/mail.js"></script>
    <script src="<?=base_url('assets/')?>js/default/active.js"></script>
    <script>
          $(document).ready(function() {
                  var url = '<?=site_url();?>'
                  $.ajax({
                      url : "harga_pasar/data_pasar",
                      type: "GET",
                      dataType: "JSON",
                      beforeSend:()=>{
                      },
                      success:(data)=>
                      {
                      $('#drop').removeClass('loader');

                      $('.here_price').append(data.data);
                            $('.here_price').append(data.data2);
                            $('.here_price').append(data.data3);
                            $('.here_price').append(data.data4);
                            $('.here_price').append(data.data5);
                            $('.here_price').append(data.data6);
                            $('.here_price').append(data.data7);
                            $('.here_price').append(data.data8);
                            $('.here_price').append(data.data9);
                            $('.here_price').append(data.data10);
                            $('.here_price').append(data.data11);
                            $('.here_price').append(data.data12);
                            $('.here_price').append(data.data13);
                            $('.here_price').append(data.data14);
                            $('.here_price').append(data.data15);
                            $('.here_price').append(data.data16);
                            $('.here_price').append(data.data17);
                            $('.here_price').append(data.data18);
                            $('.here_price').append(data.data19);
                            $('.here_price').append(data.data20);
                            $('.here_price').append(data.data21);
                            $('.here_price').append(data.data22);
                            $('.here_price').append(data.data23);
                            $('.here_price').append(data.data24);
                            $('.here_price').append(data.data25);
                            $('.here_price').append(data.data26);
                            // $('#tanggal').append("*Harga dibandingkan pada tanggal "+data.kemarin);

                      },
                          error:(xhr, status, error)=>{

                              $("#info").html(errorMessage)
                          }
                  });

                  $.ajax({
                      url : "stok_pasar/stok",
                      type: "GET",
                      dataType: "JSON",
                      beforeSend:()=>{
                      },
                      success:(data)=>
                      {
                      $('#drop').removeClass('loader');

                      $('.here').append(data.data);
                            $('.here').append(data.data2);
                            $('.here').append(data.data3);
                            $('.here').append(data.data4);
                            $('.here').append(data.data5);
                            $('.here').append(data.data6);
                            $('.here').append(data.data7);
                            $('.here').append(data.data8);
                            $('.here').append(data.data9);
                            $('.here').append(data.data10);
                            $('.here').append(data.data11);
                            $('.here').append(data.data12);
                            $('.here').append(data.data13);
                            $('.here').append(data.data14);
                            $('.here').append(data.data15);
                            $('.here').append(data.data16);
                            $('.here').append(data.data17);
                            $('.here').append(data.data18);
                            $('.here').append(data.data19);
                            $('.here').append(data.data20);
                            $('.here').append(data.data21);
                            $('.here').append(data.data22);
                            $('.here').append(data.data23);
                            $('.here').append(data.data24);
                            $('.here').append(data.data25);
                            $('.here').append(data.data26);
                            // $('#tanggal').append("*Harga dibandingkan pada tanggal "+data.kemarin);

                      },
                          error:(xhr, status, error)=>{

                              $("#info").html(errorMessage)
                          }
                  });

                  $("#filter_pasar").on("change", function() {
                    $.ajax({
                        url: "harga_pasar/data_pasar",
                        type: "POST",
                        data: {pasar : this.value},
                        dataType: "JSON",
                        beforeSend: () => {
                            $("#info").html(`<span style='font-size:2rem; color:##0335fc;'><strong>Sedang memperbaharui data..</strong></span>`)
                        },
                        success: (data) => {
                            $('#header_pasar').html('Daftar Harga Terupdate '+this.value+' Hari ini '+data.sekarang);
                            $('#html1').html(data.data);
                            $('#html2').html(data.data2);
                            $('#html3').html(data.data3);
                            $('#html4').html(data.data4);
                            $('#html5').html(data.data5);
                            $('#html6').html(data.data6);
                            $('#html7').html(data.data7);
                            $('#html8').html(data.data8);
                            $('#html9').html(data.data9);
                            $('#html10').html(data.data10);
                            $('#html11').html(data.data11);
                            $('#html12').html(data.data12);
                            $('#html13').html(data.data13);
                            $('#html14').html(data.data14);
                            $('#html15').html(data.data15);
                            $('#html16').html(data.data16);
                            $('#html17').html(data.data17);
                            $('#html18').html(data.data18);
                            $('#html19').html(data.data19);
                            $('#html20').html(data.data20);
                            $('#html21').html(data.data21);
                            $('#html22').html(data.data22);
                            $('#html23').html(data.data23);
                            $('#html24').html(data.data24);
                            $('#html25').html(data.data25);
                            $('#html26').html(data.data26);
                            $('#tanggal').html("*Harga dibandingkan pada tanggal "+data.kemarin);
                        },
                        error: (xhr, status, error) => {
                            $("#info").html(errorMessage)
                        }
                    });
                  });
          })

          function get_price_pasar(){
            $('.here_price').empty();
            $('#title_price_pasar').html($('#price_pasar').find(":selected").text());
            $.ajax({
                url: "harga_pasar/data_pasar",
                type: "POST",
                data: {pasar:$('#price_pasar').find(":selected").text()},
                dataType: "JSON",
                beforeSend: () => {},
                success: (data) => {
                    $('#drop').removeClass('loader');

                    $('.here_price').append(data.data);
                    $('.here_price').append(data.data2);
                    $('.here_price').append(data.data3);
                    $('.here_price').append(data.data4);
                    $('.here_price').append(data.data5);
                    $('.here_price').append(data.data6);
                    $('.here_price').append(data.data7);
                    $('.here_price').append(data.data8);
                    $('.here_price').append(data.data9);
                    $('.here_price').append(data.data10);
                    $('.here_price').append(data.data11);
                    $('.here_price').append(data.data12);
                    $('.here_price').append(data.data13);
                    $('.here_price').append(data.data14);
                    $('.here_price').append(data.data15);
                    $('.here_price').append(data.data16);
                    $('.here_price').append(data.data17);
                    $('.here_price').append(data.data18);
                    $('.here_price').append(data.data19);
                    $('.here_price').append(data.data20);
                    $('.here_price').append(data.data21);
                    $('.here_price').append(data.data22);
                    $('.here_price').append(data.data23);
                    $('.here_price').append(data.data24);
                    $('.here_price').append(data.data25);
                    $('.here_price').append(data.data26);
                    // $('#tanggal').append("*Harga dibandingkan pada tanggal "+data.kemarin);

                },
                error: (xhr, status, error) => {

                    $("#info").html(errorMessage)
                }
            });
          }

          function get_stok_pasar(){
            $('.here').empty();
            $('#title_stok_pasar').html($('#stok_pasar').find(":selected").text());
            $.ajax({
                url : "stok_pasar/stok",
                type: "POST",
                data: {pasar:$('#stok_pasar').find(":selected").text()},
                dataType: "JSON",
                beforeSend:()=>{
                },
                success:(data)=>
                {
                    $('#drop').removeClass('loader');
                    $('.here').append(data.data);
                    $('.here').append(data.data2);
                    $('.here').append(data.data3);
                    $('.here').append(data.data4);
                    $('.here').append(data.data5);
                    $('.here').append(data.data6);
                    $('.here').append(data.data7);
                    $('.here').append(data.data8);
                    $('.here').append(data.data9);
                    $('.here').append(data.data10);
                    $('.here').append(data.data11);
                    $('.here').append(data.data12);
                    $('.here').append(data.data13);
                    $('.here').append(data.data14);
                    $('.here').append(data.data15);
                    $('.here').append(data.data16);
                    $('.here').append(data.data17);
                    $('.here').append(data.data18);
                    $('.here').append(data.data19);
                    $('.here').append(data.data20);
                    $('.here').append(data.data21);
                    $('.here').append(data.data22);
                    $('.here').append(data.data23);
                    $('.here').append(data.data24);
                    $('.here').append(data.data25);
                    $('.here').append(data.data26);
                // $('#tanggal').append("*Harga dibandingkan pada tanggal "+data.kemarin);
                },
                error:(xhr, status, error)=>{
                $("#info").html(errorMessage)
                }
                });
          }
        </script>
</body>

</html>