<!-- BEGIN: Content -->
<div class="content">
                <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                        Data Puskesmas
                    </h2>
                </div>

                <div class="grid grid-cols-12 gap-6 mt-5">
                  <div class="col-span-12 sm:col-span-6 xl:col-span-6 intro-y">
                    <div class="report-box zoom-in">
                      <div class="box p-5">
                        <div class="flex">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card report-box__icon text-theme-11"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                          <div class="ml-auto">
                            <div class="<?=$class?>"> <?=(int)$persentase?> % dari bulan sebelumnya <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up w-4 h-4"><polyline points="18 15 12 9 6 15"></polyline></svg> </div>
                          </div>
                        </div>
                        <div class="text-3xl font-bold leading-8 mt-6"><?=format($total_perizinan->total)?> Kunjungan Bulan ini</div>
                        <div class="text-base text-gray-600 mt-1">Seluruh Banyuwangi</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                    <div class="report-box zoom-in">
                      <div class="box p-5">
                        <div class="flex">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check report-box__icon text-theme-9"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>
                          <div class="ml-auto">
                            <div class="<?=$class_w?>"> <?=(int)$persentase_wanita?>% <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up w-4 h-4"><polyline points="18 15 12 9 6 15"></polyline></svg> </div>
                          </div>
                        </div>
                        <div class="text-2xl font-bold leading-8 mt-6"><?=format($total_perizinan->pria)?> Laki-laki</div>
                        <div class="text-base text-gray-600 mt-1">Seluruh Banyuwangi</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                    <div class="report-box zoom-in">
                      <div class="box p-5">
                        <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-minus report-box__icon text-theme-11"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                          <div class="ml-auto">
                            <div class="<?=$class_w?>"> <?=(int)$persentase_wanita?>% <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up w-4 h-4"><polyline points="18 15 12 9 6 15"></polyline></svg> </div>
                          </div>
                        </div>
                        <div class="text-2xl font-bold leading-8 mt-6"><?=format($total_perizinan->wanita)?> Perempuan</div>
                        <div class="text-base text-gray-600 mt-1">Seluruh Banyuwangi</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="intro-y chat grid grid-cols-12 gap-5 mt-5">
                    <!-- BEGIN: Chat Side Menu -->
                    <div class="col-span-12 lg:col-span-12 xxl:col-span-12">
                        <div class="intro-y pr-1">
                            <div class="box p-2">
                                <div class="chat__tabs nav-tabs justify-center flex">
                                  <a data-toggle="tab" data-target="#chats" href="javascript:;" class="flex-1 py-2 rounded-md text-center active">View Grafik</a>
                                  <a data-toggle="tab" data-target="#friends" href="javascript:;" class="flex-1 py-2 rounded-md text-center">View Tabel</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-content__pane active" id="chats">
                              <div class="intro-y grid grid-cols-12 gap-6 mt-5">
                                <div class="col-span-12 lg:col-span-6">
                                    <!-- BEGIN: Vertical Bar Chart -->
                                    <div class="intro-y box">
                                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                                            <h2 class="font-medium text-base mr-auto">
                                                Total Kunjungan Berdasarkan Penyakit
                                            </h2>
                                        </div>
                                        <div class="p-5" id="vertical-bar-chart">
                                            <div class="preview">
                                              <div class="chartjs-size-monitor">
                                                <div class="chartjs-size-monitor-expand">
                                                  <div class=""></div>
                                                </div>
                                                <div class="chartjs-size-monitor-shrink">
                                                  <div class=""></div>
                                                </div>
                                              </div>
                                              <div id="info"></div>
                                                <div id="chart_pendaftar_kec_praktek">
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <!-- END: Vertical Bar Chart -->
                                </div>
                                <div class="col-span-12 lg:col-span-6">
                                    <!-- BEGIN: Stacked Bar Chart -->
                                    <div class="intro-y box">
                                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                                            <h2 class="font-medium text-base mr-auto">
                                                <!-- Jenis Surat yang Diterbitkan -->
                                                Total Kunjungan Berdasarkan Puskesmas
                                            </h2>
                                        </div>
                                        <div class="p-5" id="stacked-bar-chart">
                                            <div class="preview"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                                <!-- <div id="chart_jenjang_pendftar"></div> -->
                                                <div id="chart_profesi"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END: Stacked Bar Chart -->
                                </div>
                                <div class="col-span-12 lg:col-span-12">
                                    <!-- BEGIN: Stacked Bar Chart -->
                                    <div class="intro-y box mt-5">
                                      <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                                          <h2 class="font-medium text-base mr-auto">
                                              Puskesmas Berdasarkan Kecamatan
                                          </h2>
                                      </div>
                                      <div class="p-5" id="stacked-bar-chartt">
                                          <div class="preview"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                          <div id="peta_naker" style="width: 100%; height: 700px;"></div>
                                          </div>

                                      </div>
                                    </div>
                                    <!-- END: Stacked Bar Chart -->
                                </div>
                              </div>
                            </div>
                            <div class="tab-content__pane" id="friends">
                              <div class="intro-y grid grid-cols-12 gap-6 mt-5">
                                <div class="col-span-12 lg:col-span-12">
                                    <!-- BEGIN: Vertical Bar Chart -->
                                    <div class="intro-y box">
                                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                                            <h2 class="font-medium text-base mr-auto">
                                                Tabel Kunjungan Berdasarkan Puskesmas Bulan Ini
                                            </h2>
                                            <div class="w-full sm:w-auto flex items-center sm:ml-auto mt-3 sm:mt-0">
                                              <div class="mr-3 laki-bold">Pilih Filter</div>
                                               <div class="relative w-56 mx-auto"> 
                                                <select id="filter_bulan" class="select2 w-full">
                                                    <option value="">Pilih Bulan dan Tahun</option>
                                                    <option data-bulan="semua" data-tahun="semua">Semua Data</option>
                                                    <?php foreach($list_tahun as $data):?>
                                                        <option data-bulan="<?=$data->bulan?>" data-tahun="<?=$data->tahun?>" "><?=getBulan($data->bulan).' '.$data->tahun?></option>
                                                    <?php endforeach;?>
                                                 </select>
                                             </div>
                                            </div>
                                        </div>
                                        <!-- BEGIN: Datatable -->
                                        <div class="intro-y datatable-wrapper box p-5 mt-5 table-responsive">
                                            <table id="tabel_data" class="table table-report table-report--bordered display datatable w-full">
                                                <thead>
                                                    <tr>
                                                        <th class="border-b-2 whitespace-no-wrap">Kecamatan</th>
                                                        <th class="border-b-2 text-center whitespace-no-wrap">Total</th>
                                                        <th class="border-b-2 text-center whitespace-no-wrap">Kunjungan Lama</th>
                                                        <th class="border-b-2 text-center whitespace-no-wrap">Kunjungan Baru</th>
                                                        <th class="border-b-2 text-center whitespace-no-wrap">Detail</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach($by_kecamatan_all as $data):?>
                                                    <tr>
                                                        <td class="border-b">
                                                            <div class="font-medium whitespace-no-wrap"><?=$data->kecamatan?></div>
                                                        </td>
                                                        <td class="text-center border-b"><?=format($data->total)?></td>
                                                        <td class="text-center border-b"><?=format($data->kunjungan_lama)?></td>
                                                        <td class="text-center border-b"><?=format($data->kunjungan_baru)?></td>
                                                        <td class="border-b w-5">
                                                            <div class="flex sm:justify-center items-center">
                                                                <a onclick="modal_by_kec('<?=$data->kecamatan?>')" href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview" class="button w-32 mr-2 mb-2 flex items-center justify-center bg-theme-1 text-white"><i data-feather="activity" class="w-4 h-4 mr-2"></i> Detail </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach;?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- END: Datatable -->
                                    </div>
                                    
                                    <!-- END: Vertical Bar Chart -->
                                </div>

                              </div>

                            </div>
                        </div>
                    </div>
                    <!-- END: Chat Side Menu -->
                </div>
            </div>
            <!-- BEGIN::MODAL-->
            <div class="modal" id="header-footer-modal-preview">
              <div class="modal__content modal__content--xl backdrop_modal">
                  <h2 id="modal_title" class="font-medium text-base mt-5 mr-5 text-center" style="text-transform:uppercase;font-weight:bold">Grafik Pendaftar kartu kuning di kecamatan Banyuwangi</h2>
                  <div class="p-5 grid grid-cols-12 gap-1 row-gap-1">
                    <div class="col-span-12 sm:col-span-12 lg:col-span-12 col-xs-12">
                        <!-- <div id="tab_puskesmas"></div> -->
                        <div class="intro-y chat grid grid-cols-12 gap-5 mt-5" style="color:black">
                          <div class="col-span-12 lg:col-span-12 xxl:col-span-12">
                              <div class="intro-y pr-1">
                                <div class="box p-2">
                                    <div id="ini_atab" class="chat__tabs nav-tabs justify-center flex">
                                      <!-- <a data-toggle="tab" data-target="#pusa" href="javascript:;" class="flex-1 py-2 rounded-md text-center active">Puskesmas A</a>
                                      <a data-toggle="tab" data-target="#pusb" href="javascript:;" class="flex-1 py-2 rounded-md text-center">Puskesmas B</a>
                                      <a data-toggle="tab" data-target="#pusc" href="javascript:;" class="flex-1 py-2 rounded-md text-center">Puskesmas C</a>
                                      <a data-toggle="tab" data-target="#pusd" href="javascript:;" class="flex-1 py-2 rounded-md text-center">Puskesmas D</a> -->
                                    </div>
                                </div>
                              </div>
                              <div id="ini_tab" class="tab-content">
                                
                              </div>
                          </div>
                        </div>
                    </div>
                  </div>
              </div>
            </div>
        <?php $this->load->view('js');?>
        <?php $this->load->view('js_ker');?>