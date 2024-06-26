@extends('Auth/Index/app-auth')

@push('head-script')
    <link rel="stylesheet" href="{{ asset('portal_assets') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ asset('portal_assets') }}/assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="{{ asset('portal_assets') }}/assets/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="{{ asset('portal_assets') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ asset('portal_assets') }}/assets/vendor/libs/bs-stepper/bs-stepper.css" />
    <link rel="stylesheet" href="{{ asset('portal_assets') }}/assets/vendor/libs/bootstrap-select/bootstrap-select.css" />
    <link rel="stylesheet" href="{{ asset('portal_assets') }}/assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="{{ asset('portal_assets') }}/assets/vendor/libs/@form-validation/umd/styles/index.min.css" />
    {{-- <link rel="stylesheet" href="{{ asset('portal_assets') }}/assets/vendor/css/pages/page-auth.css" /> --}}
    <link rel="stylesheet" href="{{ asset('portal_assets') }}/assets/vendor/libs/animate-css/animate.css" />
      <link rel="stylesheet" href="{{ asset('portal_assets') }}/assets/vendor/libs/sweetalert2/sweetalert2.css" />
@endpush

@section('content')
<div class="authentication-wrapper authentication-cover">
    <div class="authentication-inner row m-0">
        <!-- Image on Top -->
        
            
        
        <!-- /Image on Top -->
        
        <div class="col-12 d-flex align-items-center justify-content-center authentication-bg p-sm-5 p-3">
            <div class="w-px-700">
                <div class="shadow-none">
                    <div class="align-center" style="display: flex; align-items: center; justify-content: center;">
                        <img src="{{ asset('portal_assets') }}/assets/img/illustrations/create-account-light.png" data-app-dark-img="illustrations/create-account-dark.png" data-app-light-img="illustrations/create-account-light.png" style="max-width: 100%; height: auto;" />            
                    </div>
                    
                    <form id="singleStepForm" method="POST" action="{{ route('submitFormDaftar') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Account Details -->
                        <div class="content">
                            <!-- Form fields for user details -->
                            <div class="row g-3">
                                <div class="divider">
                                    <div class="divider-text">Detil Pengguna</div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="multiStepsName">Nama Lengkap</label>
                                    <input type="text" required name="multiStepsName" id="multiStepsName" class="form-control" placeholder="Nama Saya, S.H., M.H." />
                                    <small class="error-message text-danger"></small>
                                </div>
                                <!-- Username -->
                                <div class="col-sm-6">
                                    <label class="form-label" for="multiStepsUsername">Username</label>
                                    <input type="text" required name="multiStepsUsername" id="multiStepsUsername" class="form-control" placeholder="namasaya" />
                                    <small class="error-message text-danger"></small>
                                </div>
                                <!-- Email -->
                                <div class="col-sm-6">
                                    <label class="form-label" for="multiStepsEmail">Email</label>
                                    <input type="email" required name="multiStepsEmail" id="multiStepsEmail" class="form-control" placeholder="john.doe@email.com" aria-label="john.doe" />
                                    <small class="error-message text-danger"></small>
                                </div>
                                <!-- Whatsapp -->
                                <div class="col-sm-6">
                                    <label class="form-label" for="multiStepsWhatsapp">Whatsapp</label>
                                    <input type="text" required name="multiStepsWhatsapp" id="multiStepsWhatsapp" class="form-control" placeholder="08xxxxxxxxxx" />
                                    <small class="error-message text-danger"></small>
                                </div>
                                <!-- Password -->
                                <div class="col-sm-6 form-password-toggle">
                                    <label class="form-label" for="multiStepsPass">Kata Sandi</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" required id="multiStepsPass" name="multiStepsPass" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="multiStepsPass2" />
                                        <span class="input-group-text cursor-pointer" id="multiStepsPass2"><i class="bx bx-hide"></i></span>
                                    </div>
                                    <small class="error-message text-danger"></small>
                                </div>
                                <!-- Confirm Password -->
                                <div class="col-sm-6 form-password-toggle">
                                    <label class="form-label" for="multiStepsConfirmPass">Konfirmasi Kata Sandi</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" required id="multiStepsConfirmPass" name="multiStepsConfirmPass" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="multiStepsConfirmPass2" />
                                        <span class="input-group-text cursor-pointer" id="multiStepsConfirmPass2"><i class="bx bx-hide"></i></span>
                                    </div>
                                    <small class="error-message text-danger"></small>
                                </div>
                                <!-- Provinsi -->
                                <div class="col-sm-6">
                                    <label class="form-label" for="multiStepsProvince">Provinsi</label>
                                    <select class="form-select" required id="multiStepsProvince" name="multiStepsProvince">
                                        <option value="" selected disabled>Pilih Provinsi</option>
                                    </select>
                                </div>
                                <!-- Kabupaten/Kota -->
                                <div class="col-sm-6">
                                    <label class="form-label" for="multiStepsRegency">Kabupaten/Kota</label>
                                    <select class="form-select" required id="multiStepsRegency" name="multiStepsRegency" disabled>
                                        <option value="" selected disabled>Pilih Kabupaten/Kota</option>
                                    </select>
                                </div>
                                <!-- Kecamatan -->
                                <div class="col-sm-6">
                                    <label class="form-label" for="multiStepsDistrict">Kecamatan</label>
                                    <select class="form-select" required id="multiStepsDistrict" name="multiStepsDistrict" disabled>
                                        <option value="" selected disabled>Pilih Kecamatan</option>
                                    </select>
                                </div>
                                <!-- Desa -->
                                <div class="col-sm-6">
                                    <label class="form-label" for="multiStepsVillage">Desa</label>
                                    <select class="form-select" required id="multiStepsVillage" name="multiStepsVillage" disabled>
                                        <option value="" selected disabled>Pilih Desa</option>
                                    </select>
                                </div>
                                <!-- Gambar Profil -->
                                <div class="col-sm-12">
                                    <label class="form-label" for="multiStepsProfileImage">Gambar Profil</label>
                                    <input type="file" required name="multiStepsProfileImage" id="multiStepsProfileImage" class="form-control" accept="image/*">
                                    <div id="imagePreview" class="mt-2"></div>
                                </div>
                            </div>
                        
                            <!-- Detil Kantor -->
                            <div class="divider">
                                <div class="divider-text">Detil Kantor</div>
                            </div>
                            <div class="content-header mb-3">
                                <h3 class="mb-1">Informasi Kantor</h3>
                                <span>Masukkan Detail Kantor Anda</span>
                            </div>
                            <div class="row g-3">
                                <!-- Nama Kantor -->
                                <div class="col-sm-6">
                                    <label class="form-label" for="officeName">Nama Kantor</label>
                                    <input type="text" required id="officeName" name="officeName" class="form-control" placeholder="Nama Kantor" />
                                    <small class="error-message text-danger"></small>
                                </div>
                                <!-- Email Kantor -->
                                <div class="col-sm-6">
                                    <label class="form-label" for="officeEmail">Email Kantor</label>
                                    <input type="email" required id="officeEmail" name="officeEmail" class="form-control" placeholder="email.kantor@contoh.com" />
                                    <small class="error-message text-danger"></small>
                                </div>
                                <!-- HP / Whatsapp -->
                                <div class="col-sm-6">
                                    <label class="form-label" for="officePhone">HP / Whatsapp</label>
                                    <input type="text" required id="officePhone" name="officePhone" class="form-control" placeholder="08xxxxxxxxxx" />
                                    <small class="error-message text-danger"></small>
                                </div>
                                <!-- Tanggal Pendirian -->
                                <div class="col-sm-6">
                                    <label for="flatpickr-date" class="form-label">Tanggal Pendirian</label>
                                    <input type="text" class="form-control" required placeholder="YYYY-MM-DD" id="flatpickr-date" name="flatpickr-date" />
                                    <small class="error-message text-danger"></small>
                                </div>
                                <!-- Nama Jalan -->
                                <div class="col-sm-6">
                                    <label class="form-label" for="officeAddress">Nama Jalan</label>
                                    <input type="text" id="officeAddress" required name="officeAddress" class="form-control" placeholder="Jln. xx No. 46" />
                                    <small class="error-message text-danger"></small>
                                </div>
                                <!-- Kode Pos -->
                                <div class="col-sm-6">
                                    <label class="form-label" for="postCode">Kode Pos</label>
                                    <input type="text" id="postCode" required name="postCode" class="form-control" placeholder="12345" />
                                    <small class="error-message text-danger"></small>
                                </div>
                                <!-- Provinsi Kantor -->
                                <div class="col-sm-6">
                                    <label class="form-label" for="officeProvince">Provinsi</label>
                                    <select class="form-select" required id="officeProvince" name="officeProvince">
                                        <option value="" selected disabled>Pilih Provinsi</option>
                                    </select>
                                </div>
                                <!-- Kabupaten/Kota Kantor -->
                                <div class="col-sm-6">
                                    <label class="form-label" for="officeRegency">Kabupaten/Kota</label>
                                    <select class="form-select" required  id="officeRegency" name="officeRegency" disabled>
                                        <option value="" selected disabled>Pilih Kabupaten/Kota</option>
                                    </select>
                                </div>
                                <!-- Kecamatan Kantor -->
                                <div class="col-sm-6">
                                    <label class="form-label" for="officeDistrict">Kecamatan</label>
                                    <select class="form-select" required id="officeDistrict" name="officeDistrict" disabled>
                                        <option value="" selected disabled>Pilih Kecamatan</option>
                                    </select>
                                </div>
                                <!-- Desa Kantor -->
                                <div class="col-sm-6">
                                    <label class="form-label" for="officeVillage">Desa</label>
                                    <select class="form-select" required id="officeVillage" name="officeVillage" disabled>
                                        <option value="" selected disabled>Pilih Desa</option>
                                    </select>
                                </div>
                                <!-- Website -->
                                <div class="col-sm-6">
                                    <label class="form-label" for="website">Website (opsional)</label>
                                    <input type="text" required id="website" name="website" class="form-control" placeholder="https://kantorsaya.com/" />
                                    <small class="error-message text-danger"></small>
                                </div>
                                <!-- Slogan Kantor -->
                                <div class="col-sm-6">
                                    <label class="form-label" for="slogan">Slogan Kantor</label>
                                    <textarea id="slogan" required name="slogan" class="form-control" placeholder="Konsisten Membela Klien"></textarea>
                                    <small class="error-message text-danger"></small>
                                </div>
                                <!-- Logo Kantor -->
                                <div class="col-sm-6">
                                    <label class="form-label" for="logo">Logo Kantor</label>
                                    <input type="file" id="logo" name="logo" class="form-control" accept="image/*" required/>
                                    <div id="logoPreview"></div>
                                </div>
                                <!-- Dokumen Pendirian Kantor -->
                                <div class="col-sm-6">
                                    <label class="form-label" for="legalDocument">Dokumen Pendirian Kantor</label>
                                    <input type="file" id="legalDocument" name="legalDocument" class="form-control" accept="application/pdf,image/*" required/>
                                    <div id="legalDocumentPreview"></div>
                                </div>
                            </div>
                        
                            <!-- Paket dan Perjanjian -->
                            <div class="divider">
                                <div class="divider-text">Paket dan Perjanjian</div>
                            </div>
                            <div class="content-header mb-3">
                                <h3 class="mb-1">Pilih Paket</h3>
                                <span>Pilih paket sesuai kebutuhan Anda</span>
                            </div>
                            <!-- Opsi paket kustom -->
                            <div class="row gap-md-0 gap-3 mb-4">
                                <div class="col-md">
                                    <div class="form-check custom-option custom-option-icon">
                                        <label class="form-check-label custom-option-content" for="basicOption">
                                            <span class="custom-option-body">
                                                <span class="mb-2 h4 d-block">Dasar</span>                                                
                                                <span class="d-flex justify-content-center">
                                                    <sup class="text-primary fs-big lh-1 mt-3">Rp</sup>
                                                    <span class="display-5 text-primary">0</span>
                                                    <sub class="lh-1 fs-big mt-auto mb-2 text-muted">/bulan</sub>
                                                </span>
                                            </span>
                                            <input name="paket" class="form-check-input" type="radio" value="0" id="basicOption" checked/>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-check custom-option custom-option-icon">
                                        <label class="form-check-label custom-option-content" for="standardOption">
                                            <span class="custom-option-body">
                                                <span class="mb-2 h4 d-block">Standar</span>
                                                <span class="d-flex justify-content-center">
                                                    <sup class="text-primary fs-big lh-1 mt-3">Rp</sup>
                                                    <span class="display-5 text-primary">50k</span>
                                                    <sub class="lh-1 fs-big mt-auto mb-2 text-muted">/bulan</sub>
                                                </span>
                                            </span>
                                            <input name="paket" class="form-check-input" type="radio" value="" id="standardOption" disabled />
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-check custom-option custom-option-icon">
                                        <label class="form-check-label custom-option-content" for="enterpriseOption">
                                            <span class="custom-option-body">
                                                <span class="mb-2 h4 d-block">Enterprise</span>                                                
                                                <span class="d-flex justify-content-center">
                                                    <sup class="text-primary fs-big lh-1 mt-3">Rp</sup>
                                                    <span class="display-5 text-primary">100k</span>
                                                    <sub class="lh-1 fs-big mt-auto mb-2 text-muted">/bulan</sub>
                                                </span>
                                            </span>
                                            <input name="paket" class="form-check-input" type="radio" value="" id="enterpriseOption" disabled />
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!--/ Opsi paket kustom -->
                            <div class="content-header mb-3">
                                <h3 class="mb-2 mt-2">Perjanjian Kerja Sama</h3>    
                                <span>Perjanjian Dapat dilihat dengan menekan tombol di bawah</span>   
                                <br>                 
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalScrollable">Baca Perjanjian Kerjasama</button>
                            </div>                                                        
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="checkbox" id="setuju" name="setuju" required>
                                <label class="form-check-label" for="setuju">
                                    Saya menyetujui perjanjian kerja sama
                                </label>
                            </div>
                            
                        
                            <div class="row g-3">
                                <div class="col-12 d-flex justify-content-between">
                                    <button type="submit" class="btn btn-success">Kirim</button>
                                </div>
                            </div>
                        </div>
                    </form>
                                      
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalScrollable" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalScrollableTitle">Perjanjian Kerja Sama</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">              
                <p>
                    Antara: Bilik Hukum (selanjutnya disebut "Pihak Pertama") dan Pengguna (selanjutnya disebut "Pihak Kedua")
                </p>
                <p>
                    1. Tujuan Kerja Sama: <br>
                    Pihak Pertama dan Pihak Kedua setuju untuk menjalin kerja sama untuk menjalankan sebuah layanan hukum yang bermamfaat dan dibutuhkan oleh Calon Klien
                </p>              
                <p>
                    2. Lingkup Kerja Sama: <br>                    
                    Pihak Pertama akan melakukan promosi untuk mengarahkan calon klien kepada Pihak Kedua, termasuk namun tidak terbatas pada menyediakan informasi tentang layanan hukum yang ditawarkan oleh Pihak Kedua. <br>
                    Pihak Kedua akan memberikan informasi yang diperlukan secara akurat dan tepat waktu kepada Pihak Pertama untuk menjalankan tugas-tugas promosi yang diminta.
                </p>
                <p>
                    3. Kewajiban Pihak Pertama: <br>
                    Pihak Pertama setuju untuk: <br>
                </p>
                <ul>
                    <li>Pihak Pertama Menyediakan layanan promosi untuk Pihak Kedua kepada calon Klien yang membutuhkan layanan hukum.</li>
                    <li>Bentuk promosi yang disediakan oleh Pihak Pertama berupa layanan pencarian jasa bantuan hukum kepada calon Klien.</li>
                    <li>Calon Klien bebas memilih penyedia jasa layanan hukum yang dia inginkan.</li>          
                </ul>
                <p>
                    4. Kewajiban Pihak Kedua: <br>
                    Pihak Kedua setuju untuk: <br>
                </p>
                <ul>
                    <li>Menyediakan layanan yang berkualitas kepada klien.</li>
                    <li>Mengoptimalkan layanan agar tujuan yang ingin dicapai Klien tecapai.</li>
                    <li>Bersedia untuk membagi hasil yang didapat dari Fee Pengacara kepada bilikhukum.</li>
                </ul>
                <p>
                    5. Biaya dan Pembayaran: <br>
                    Jumlah bagi hasil pada umumnya sebesar 10% dari Fee Pengacara yang didapat dari klien. dan jumlah lainnya akan ditentukan di perjanjiannya
                </p>
                <p>
                    6. Kepatuhan Hukum: <br>
                    Kedua belah pihak setuju untuk mematuhi semua hukum dan peraturan yang berlaku yang berkaitan dengan kerja sama ini.
                </p>
                <p>
                    7. Durasi Perjanjian: <br>
                    Perjanjian ini berlaku efektif sejak tanggal penyetujuan dan berlaku sampai ada hal-hal yang membatalkan perjanjian.
                </p>
                <p>
                    8. Pembatalan Perjanjian: <br>
                    <ul>
                        <li>Perjanjian akan batal jika Pihak Pertama menerima laporan dari klien yang menerangkan Pihak Kedua melakukan:</li>
                        <ul>
                            <li>Penipuan</li>
                            <li>Tidak memenuhi kewajibannya</li>
                            <li>Pelanggaran Asusila</li>
                        </ul>
                        <li>Perjanjian akan batal jika Pihak Kedua tidak memenuhi kewajiban yang telah disepakti dengan Pihak Pertama</li>
                    </ul>
                </p>                
                <p>
                    9. Hukum yang Berlaku: <br>
                    Perjanjian ini tunduk pada hukum yang berlaku di Negara Republik Indonesia.
                </p>
                <p>
                    Sebagai bukti kesepakatan, Pihak Kedua akan mencentang kotak centang di bawah ini.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                    Close
                </button>           
            </div>
        </div>
    </div>
</div>
@endsection

@push('footer-script')      
    <script src="{{ asset('portal_assets') }}/assets/vendor/libs/moment/moment.js"></script>
    <script src="{{ asset('portal_assets') }}/assets/vendor/libs/flatpickr/flatpickr.js"></script>
    <script src="{{ asset('portal_assets') }}/assets/vendor/libs/pickr/pickr.js"></script>
    <script src="{{ asset('portal_assets') }}/assets/vendor/libs/cleavejs/cleave.js"></script>
    <script src="{{ asset('portal_assets') }}/assets/vendor/libs/cleavejs/cleave-phone.js"></script>
    <script src="{{ asset('portal_assets') }}/assets/vendor/libs/bs-stepper/bs-stepper.js"></script>
    <script src="{{ asset('portal_assets') }}/assets/vendor/libs/select2/select2.js"></script>
    <script src="{{ asset('portal_assets') }}/assets/vendor/libs/@form-validation/umd/bundle/popular.min.js"></script>
    <script src="{{ asset('portal_assets') }}/assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js"></script>
    <script src="{{ asset('portal_assets') }}/assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js"></script>
    <script src="{{ asset('portal_assets/assets') }}/vendor/libs/sweetalert2/sweetalert2.js"></script>
@endpush

@push('footer-Sec-script')    
    <script src="{{ asset('portal_assets') }}/assets/js/forms-pickers.js"></script>    
    <script>
        $(document).ready(function() {
            var select2 = $('.select2');

            if (select2.length) {
                select2.each(function () {
                    var $this = $(this);
                    $this.wrap('<div class="position-relative"></div>');
                    $this.select2({
                        placeholder: 'Select an option',
                        dropdownParent: $this.parent()
                    });
                });
            }

            $('#multiStepsProvince').select2({
                placeholder: 'Pilih Provinsi',
                allowClear: true,
                ajax: {
                    url: '{{ route("getProvinces") }}',
                    type: 'GET',
                    dataType: 'json',
                    processResults: function(data) {
                        var formattedData = data.map(function(province) {
                            var words = province.name.toLowerCase().split(' ');
                            for (var i = 0; i < words.length; i++) {
                                words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1);
                            }
                            return {
                                id: province.code,
                                text: words.join(' ')
                            };
                        });
                        return {
                            results: formattedData
                        };
                    },
                    data: function (params) {
                        var query = {
                            search: params.term
                        }
                        return query;
                    }
                }
            });

            $('#multiStepsProvince').on('select2:select', function(e) {
                var provinceCode = e.params.data.id;
                $('#multiStepsRegency').val(null).trigger('change').prop('disabled', true);
                $('#multiStepsDistrict').val(null).trigger('change').prop('disabled', true);
                $('#multiStepsVillage').val(null).trigger('change').prop('disabled', true);
                if (provinceCode) {
                    $('#multiStepsRegency').select2({
                        placeholder: 'Pilih Kabupaten/Kota',
                        allowClear: true,
                        ajax: {
                            url: '{{ route("getRegencies") }}',
                            type: 'GET',
                            dataType: 'json',
                            data: function (params) {
                                var query = {
                                    province_code: provinceCode,
                                    search: params.term
                                }
                                return query;
                            },
                            processResults: function(data) {
                                var formattedData = data.map(function(regency) {
                                    var words = regency.name.toLowerCase().split(' ');
                                    for (var i = 0; i < words.length; i++) {
                                        words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1);
                                    }
                                    return {
                                        id: regency.code,
                                        text: words.join(' ')
                                    };
                                });
                                return {
                                    results: formattedData
                                };
                            }
                        }
                    }).prop('disabled', false);
                }
            });

            $('#multiStepsRegency').on('select2:select', function(e) {
                var regencyCode = e.params.data.id;
                $('#multiStepsDistrict').val(null).trigger('change').prop('disabled', true);
                $('#multiStepsVillage').val(null).trigger('change').prop('disabled', true);
                if (regencyCode) {
                    $('#multiStepsDistrict').select2({
                        placeholder: 'Pilih Kecamatan',
                        allowClear: true,
                        ajax: {
                            url: '{{ route("getDistricts") }}',
                            type: 'GET',
                            dataType: 'json',
                            data: function (params) {
                                var query = {
                                    regency_code: regencyCode,
                                    search: params.term
                                }
                                return query;
                            },
                            processResults: function(data) {
                                return {
                                    results: $.map(data, function(district) {
                                        return {
                                            id: district.code,
                                            text: district.name
                                        };
                                    })
                                };
                            }
                        }
                    }).prop('disabled', false);
                }
            });

            $('#multiStepsDistrict').on('select2:select', function(e) {
                var districtCode = e.params.data.id;
                $('#multiStepsVillage').val(null).trigger('change').prop('disabled', true);
                if (districtCode) {
                    $('#multiStepsVillage').select2({
                        placeholder: 'Pilih Desa',
                        allowClear: true,
                        ajax: {
                            url: '{{ route("getVillages") }}',
                            type: 'GET',
                            dataType: 'json',
                            data: function (params) {
                                var query = {
                                    district_code: districtCode,
                                    search: params.term
                                }
                                return query;
                            },
                            processResults: function(data) {
                                return {
                                    results: $.map(data, function(village) {
                                        return {
                                            id: village.code,
                                            text: village.name
                                        };
                                    })
                                };
                            }
                        }
                    }).prop('disabled', false);
                }
            });

            // Script for Office Select2 Dropdowns
            $('#officeProvince').select2({
                placeholder: 'Pilih Provinsi',
                allowClear: true,
                ajax: {
                    url: '{{ route("getProvinces") }}',
                    type: 'GET',
                    dataType: 'json',
                    processResults: function(data) {
                        var formattedData = data.map(function(province) {
                            var words = province.name.toLowerCase().split(' ');
                            for (var i = 0; i < words.length; i++) {
                                words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1);
                            }
                            return {
                                id: province.code,
                                text: words.join(' ')
                            };
                        });
                        return {
                            results: formattedData
                        };
                    },
                    data: function (params) {
                        var query = {
                            search: params.term
                        }
                        return query;
                    }
                }
            });

            $('#officeProvince').on('select2:select', function(e) {
                var provinceCode = e.params.data.id;
                $('#officeRegency').val(null).trigger('change').prop('disabled', true);
                $('#officeDistrict').val(null).trigger('change').prop('disabled', true);
                $('#officeVillage').val(null).trigger('change').prop('disabled', true);
                if (provinceCode) {
                    $('#officeRegency').select2({
                        placeholder: 'Pilih Kabupaten/Kota',
                        allowClear: true,
                        ajax: {
                            url: '{{ route("getRegencies") }}',
                            type: 'GET',
                            dataType: 'json',
                            data: function (params) {
                                var query = {
                                    province_code: provinceCode,
                                    search: params.term
                                }
                                return query;
                            },
                            processResults: function(data) {
                                var formattedData = data.map(function(regency) {
                                    var words = regency.name.toLowerCase().split(' ');
                                    for (var i = 0; i < words.length; i++) {
                                        words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1);
                                    }
                                    return {
                                        id: regency.code,
                                        text: words.join(' ')
                                    };
                                });
                                return {
                                    results: formattedData
                                };
                            }
                        }
                    }).prop('disabled', false);
                }
            });

            $('#officeRegency').on('select2:select', function(e) {
                var regencyCode = e.params.data.id;
                $('#officeDistrict').val(null).trigger('change').prop('disabled', true);
                $('#officeVillage').val(null).trigger('change').prop('disabled', true);
                if (regencyCode) {
                    $('#officeDistrict').select2({
                        placeholder: 'Pilih Kecamatan',
                        allowClear: true,
                        ajax: {
                            url: '{{ route("getDistricts") }}',
                            type: 'GET',
                            dataType: 'json',
                            data: function (params) {
                                var query = {
                                    regency_code: regencyCode,
                                    search: params.term
                                }
                                return query;
                            },
                            processResults: function(data) {
                                return {
                                    results: $.map(data, function(district) {
                                        return {
                                            id: district.code,
                                            text: district.name
                                        };
                                    })
                                };
                            }
                        }
                    }).prop('disabled', false);
                }
            });

            $('#officeDistrict').on('select2:select', function(e) {
                var districtCode = e.params.data.id;
                $('#officeVillage').val(null).trigger('change').prop('disabled', true);
                if (districtCode) {
                    $('#officeVillage').select2({
                        placeholder: 'Pilih Desa',
                        allowClear: true,
                        ajax: {
                            url: '{{ route("getVillages") }}',
                            type: 'GET',
                            dataType: 'json',
                            data: function (params) {
                                var query = {
                                    district_code: districtCode,
                                    search: params.term
                                }
                                return query;
                            },
                            processResults: function(data) {
                                return {
                                    results: $.map(data, function(village) {
                                        return {
                                            id: village.code,
                                            text: village.name
                                        };
                                    })
                                };
                            }
                        }
                    }).prop('disabled', false);
                }
            });
        });


        function previewImage(input, previewId) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#' + previewId).html('<img src="' + e.target.result + '" class="img-fluid" style="max-height: 200px;" />');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Mengaktifkan event onchange pada input file
        $('#multiStepsProfileImage').change(function () {
            previewImage(this, 'imagePreview');
        });


      document.getElementById('multiStepsProfileImage').addEventListener('change', function() {
        var file = this.files[0];
        var imageType = /image.*/;

        if (file.type.match(imageType)) {
          if (file.size <= 2 * 1024 * 1024) { // Ukuran maksimum 2MB (2 * 1024 * 1024 bytes)
            var reader = new FileReader();
            reader.onload = function(e) {
              document.getElementById('imagePreview').innerHTML = '<img src="' + e.target.result + '" style="max-width: 100%; max-height: 200px;">';
            };
            reader.readAsDataURL(file);
          } else {
            alert('Ukuran gambar melebihi batas 2MB.');
            this.value = '';
          }
        } else {
          alert('Hanya file gambar yang diizinkan.');
          this.value = '';
        }
      });
    </script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('singleStepForm');
            const inputs = form.querySelectorAll('input, select, textarea');

            inputs.forEach(input => {
                input.addEventListener('input', () => {
                    validateInput(input);
                });
            });

            function validateInput(input) {
                const errorMessage = input.nextElementSibling;
                let valid = true;

                if ((input.type === 'text' || input.type === 'email' || input.type === 'password') && input.value.trim() === '') {
                    errorMessage.textContent = 'Kolom ini tidak boleh kosong.';
                    valid = false;
                } else if (input.name === 'multiStepsName' || input.name === 'officeName') {
                    const nameRegex = /^[a-zA-Z.,' ]+$/; // Regex untuk nama
                    if (!nameRegex.test(input.value)) {
                        errorMessage.textContent = 'Nama hanya boleh terdiri dari huruf, titik, koma, dan spasi.';
                        valid = false;
                    } else if (input.value.length < 4 || input.value.length > 50) {
                        errorMessage.textContent = 'Nama harus terdiri dari 4 hingga 50 karakter.';
                        valid = false;
                    } else {
                        errorMessage.textContent = '';
                    }
                } else if (input.name === 'multiStepsUsername') {
                    const usernameRegex = /^[a-zA-Z0-9_]+$/; // Regex untuk username
                    if (!usernameRegex.test(input.value)) {
                        errorMessage.textContent = 'Username hanya boleh terdiri dari huruf (besar atau kecil), angka, dan garis bawah (_).';
                        valid = false;
                    } else if (input.value.length < 4 || input.value.length > 50) {
                        errorMessage.textContent = 'Panjang username harus antara 4 dan 50 karakter.';
                        valid = false;
                    } else {
                        errorMessage.textContent = '';
                    }
                } else if (input.name === 'multiStepsEmail' || input.name === 'officeEmail') {
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Regex untuk email
                    if (!emailRegex.test(input.value)) {
                        errorMessage.textContent = 'Email tidak valid.';
                        valid = false;
                    } else {
                        errorMessage.textContent = '';
                    }
                } else if (input.name === 'multiStepsWhatsapp' || input.name === 'officePhone') {
                    const whatsappRegex = /^08\d{8,}$/; // Regex untuk nomor WhatsApp
                    if (!whatsappRegex.test(input.value)) {
                        errorMessage.textContent = 'Nomor WhatsApp harus dimulai dengan "08" dan minimal 8 angka.';
                        valid = false;
                    } else {
                        errorMessage.textContent = '';
                    }
                } else if (input.id === 'flatpickr-date') {
                    const dateRegex = /^\d{4}-\d{2}-\d{2}$/;
                    if (!dateRegex.test(input.value)) {
                        errorMessage.textContent = 'Format tanggal harus YYYY-MM-DD.';
                        valid = false;
                    }
                } else if (input.id === 'postCode') {
                    const postCodeRegex = /^\d{5}$/;
                    if (!postCodeRegex.test(input.value)) {
                        errorMessage.textContent = 'Kode Pos harus terdiri dari 5 digit angka.';
                        valid = false;
                    }
                } else if (input.name === 'multiStepsPass' || input.name === 'multiStepsConfirmPass') {
                    const password = document.getElementById('multiStepsPass').value;
                    const confirmPassword = document.getElementById('multiStepsConfirmPass').value;

                    if (input.name === 'multiStepsPass') {
                        if (password.length < 6) {
                            errorMessage.textContent = 'Minimal 6 karakter.';
                            valid = false;
                        } else if (!/[A-Z]/.test(password)) {
                            errorMessage.textContent = 'Gunakan huruf kapital.';
                            valid = false;
                        } else if (!/\d/.test(password)) {
                            errorMessage.textContent = 'Gunakan angka.';
                            valid = false;
                        } else if (!/[!@#$%^&*()]/.test(password)) {
                            errorMessage.textContent = 'Gunakan simbol !@#$%^&*().';
                            valid = false;
                        } else {
                            errorMessage.textContent = '';
                            valid = true;
                        }
                    } else if (input.name === 'multiStepsConfirmPass') {
                        if (confirmPassword !== password) {
                            errorMessage.textContent = 'Konfirmasi kata sandi tidak cocok.';
                            valid = false;
                        } else {
                            errorMessage.textContent = '';
                            valid = true;
                        }
                    }
                } else if (input.name === 'multiStepsProvince') {
                    const selectedOption = input.options[input.selectedIndex];
                    if (selectedOption.value === '') {
                        errorMessage.textContent = 'Anda harus memilih sebuah provinsi.';
                        valid = true;
                    } else {
                        errorMessage.textContent = '';
                        valid = true;
                    }
                }  else if (input.id === 'website') {
                    if (input.value && !input.value.startsWith('https://')) {
                        errorMessage.textContent = 'URL harus dimulai dengan https://';
                        valid = false;
                    } else {
                        errorMessage.textContent = '';
                    }
                } else {
                    errorMessage.textContent = '';
                }

                input.classList.toggle('is-invalid', !valid);
                input.classList.toggle('is-valid', valid);

                return valid;
            }
        });
    </script>

<script>
    function showSweetAlert(response) {
        Swal.fire({
            icon: response.success ? 'success' : 'error',
            title: response.title,
            text: response.message,
        });
    }
    
    document.addEventListener('DOMContentLoaded', function() {
        @if(session('response'))
            var response = @json(session('response'));
            showSweetAlert(response);
        @endif
    });
    </script>
@endpush