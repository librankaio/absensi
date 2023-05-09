@extends('layouts.main')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Master Data</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Master Data</a></div>
            <div class="breadcrumb-item"><a class="text-muted">Master User</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Master User</h4>
                    </div>
                    <form action="/postmasterdata" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nik</label>
                                        <input type="text" class="form-control" name="nik" id="nik" value="{{$memp->nik}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama" value="{{$memp->name}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="tanggallahir" id="tanggallahir" value="{{ date("Y-m-d", strtotime($memp->dob)) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Domisili</label>
                                        <input type="v" class="form-control" name="domisili" value="{{$memp->addr}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    {{-- <div class="form-group">
                                        <label>NPWP</label>
                                        <input type="text" class="form-control" name="nik" id="nik">
                                    </div> --}}
                                    <section class="uploadimg">
                                        <div class="row py-2">
                                            <div class="col">
                                                {{-- <label for="formFile" class="form-label pb-3">Upload Gambar</label> --}}
                                                <div class="description py-2">
                                                    <label for="descnpwp" class="form-label">NPWP</label>
                                                    <input type="text" class="form-control" id="descnpwp" name="descnpwp">
                                                </div>
                                                <div class="input-group mb-3 px-2 py-1 bg-white shadow-sm"
                                                    style="border:1px solid #ced4da; border-radius:5px;">
                                                    <input id="uploadnpwp" name="uploadnpwp" type="file" onchange="readURLnpwp(this);"
                                                        class="form-control border-0 upload">
                                                    <label id="upload-labelnpwp" for="uploadnpwp" class="font-weight-light text-muted upload-label">Choose
                                                        file</label>
                            
                                                    <div class="input-group-append">
                                                        <label for="uploadnpwp" class="btn btn-light m-0 px-4"> <i
                                                                class="fa fa-cloud-upload mr-2 text-muted"></i><small
                                                                class="text-uppercase font-weight-bold text-muted"> Choose file</small></label>
                                                    </div>
                                                </div>
                                                <div class="image-area mt-4"><img id="imageResultnpwp" src="#" alt=""
                                                        class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                                                <hr>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <div class="col-md-6">
                                    <section class="uploadimg">
                                        <div class="row py-2">
                                            <div class="col">
                                                {{-- <label for="formFile" class="form-label pb-3">Upload Gambar</label> --}}
                                                <div class="description py-2">
                                                    <label for="descktp" class="form-label">KTP</label>
                                                    <input type="text" class="form-control" id="descktp" name="descktp">
                                                </div>
                                                <div class="input-group mb-3 px-2 py-1 bg-white shadow-sm"
                                                    style="border:1px solid #ced4da; border-radius:5px;">
                                                    <input id="uploadktp" name="uploadktp" type="file" onchange="readURLktp(this);"
                                                        class="form-control border-0 upload">
                                                    <label id="upload-labelktp" for="uploadktp" class="font-weight-light text-muted upload-label">Choose
                                                        file</label>
                            
                                                    <div class="input-group-append">
                                                        <label for="uploadktp" class="btn btn-light m-0 px-4"> <i
                                                                class="fa fa-cloud-upload mr-2 text-muted"></i><small
                                                                class="text-uppercase font-weight-bold text-muted"> Choose file</small></label>
                                                    </div>
                                                </div>
                                                <div class="image-area mt-4"><img id="imageResultktp" src="#" alt=""
                                                        class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                                                <hr>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    {{-- <div class="form-group">
                                        <label>BPJS</label>
                                        <input type="text" class="form-control" name="nik" id="nik">
                                    </div> --}}
                                    <section class="uploadimg">
                                        <div class="row py-2">
                                            <div class="col">
                                                {{-- <label for="formFile" class="form-label pb-3">Upload Gambar</label> --}}
                                                <div class="description py-2">
                                                    <label for="descbpjs" class="form-label">BPJS</label>
                                                    <input type="text" class="form-control" id="descbpjs" name="descbpjs">
                                                </div>
                                                <div class="input-group mb-3 px-2 py-1 bg-white shadow-sm"
                                                    style="border:1px solid #ced4da; border-radius:5px;">
                                                    <input id="uploadbpjs" name="uploadbpjs" type="file" onchange="readURLbpjs(this);"
                                                        class="form-control border-0 upload">
                                                    <label id="upload-labelbpjs" for="uploadbpjs" class="font-weight-light text-muted upload-label">Choose
                                                        file</label>
                            
                                                    <div class="input-group-append">
                                                        <label for="uploadbpjs" class="btn btn-light m-0 px-4"> <i
                                                                class="fa fa-cloud-upload mr-2 text-muted"></i><small
                                                                class="text-uppercase font-weight-bold text-muted"> Choose file</small></label>
                                                    </div>
                                                </div>
                                                <div class="image-area mt-4"><img id="imageResultbpjs" src="#" alt=""
                                                        class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                                                <hr>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jenis Kelamin (Harap Digambar)</label>
                                        <select class="form-control" name="jeniskelamin" id="jeniskelamin">
                                            <option selected>{{$memp->sex}}</option>
                                            <option>Pria</option>
                                            <option>Wanita</option>
                                            {{-- @foreach($branhcs as $data => $branch)
                                            <option>{{ $branch->name }}</option>                                            
                                            @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" name="phone" id="phone" value="{{$memp->phn}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">      
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username" id="username" value="{{$memp->username}}">                            
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Privilage</label>
                                        <select class="form-control" name="privilage" id="privilage">
                                            @if($privilage->privilage == 'SU')
                                            <option selected value="SU">Super User</option>
                                            @elseif($privilage->privilage == 'USER')
                                            <option selected value="USER">User</option>
                                            @endif
                                            <option value="SU">Super User</option>
                                            <option value="USER">User</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">                                    
                                        <label>Password Login</label>
                                        <input type="password" class="form-control" name="password" id="password">
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="d-block">Admin Privilage</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="create_acs" id="checkall" checked>
                                            <label class="form-check-label" for="flexCheckDefault">
                                            Check All
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="read_acs" value="R" checked>
                                            <label class="form-check-label" for="flexCheckChecked">
                                            Read
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="update_acs" value="U" checked>
                                            <label class="form-check-label" for="flexCheckChecked">
                                            Update
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="delete_acs" value="D" checked>
                                            <label class="form-check-label" for="flexCheckChecked">
                                            Delete
                                            </label>
                                        </div>
                                    </div>                                
                                </div>
                            </div> --}}
                            
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit" formaction="postmasterdata" id="confirm">Update</button>
                            {{-- <button class="btn btn-primary mr-1" type="submit" formaction="" id="confirm">History Absensi</button> --}}
                            <button class="btn btn-secondary" type="reset">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
@section('botscripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#checkall').click(function(){
            if($(".checkbox").is(":checked")){
                console.log("Checkbox is checked.");
                $('.checkbox').prop('checked', false)
            }
            else if($(".checkbox").is(":not(:checked)")){
                console.log("Checkbox is unchecked.");
                $('.checkbox').prop('checked', true)
            }
        });
    });

    $(document).on("click","#confirm",function(e){
        // Validate ifnull        
        username = $("#username").val();
        password = $("#password").val();
        branch = $("#branch").prop('selectedIndex');
        if (username == ""){
            swal('WARNING', 'Username Tidak boleh kosong!', 'warning');
            return false;
        }else if (password == '' || password == null){
            swal('WARNING', 'password Tidak boleh kosong!', 'warning');
            return false;
        }else if (branch == 0){
            swal('WARNING', 'Please select Branch!', 'warning');
            return false;
        }
    });

    function readURLnpwp(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imageResultnpwp').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
                // console.log(input.files[0]);
            }
        }

    $(function () {
        $('#uploadnpwp').on('change', function () {
            readURLnpwp(input);
        });
    });
    /*  ==========================================
        SHOW UPLOADED IMAGE NAME
    * ========================================== */
    
    var inputnpwp = document.getElementById('uploadnpwp');
    var infoAreanpwp = document.getElementById('upload-labelnpwp');

    inputnpwp.addEventListener('change', showFileNamenpwp);

    function showFileNamenpwp(event) {
        var inputnpwp = event.srcElement;
        var fileNamenpwp = inputnpwp.files[0].name;
        infoAreanpwp.textContent = 'File name: ' + fileNamenpwp;

    }

    function readURLktp(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imageResultktp').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
                // console.log(input.files[0]);
            }
        }

    $(function () {
        $('#upload').on('change', function () {
            readURLktp(input);
        });
    });
    /*  ==========================================
            SHOW UPLOADED IMAGE NAME
        * ========================================== */
    var inputktp = document.getElementById('uploadktp');
    var infoAreaktp = document.getElementById('upload-labelktp');

    inputktp.addEventListener('change', showFileNamektp);

    function showFileNamektp(event) {
        var inputktp = event.srcElement;
        var fileNamektp = inputktp.files[0].name;
        infoAreaktp.textContent = 'File name: ' + fileNamektp;

    }

    function readURLbpjs(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imageResultbpjs').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
                // console.log(input.files[0]);
            }
        }

    $(function () {
        $('#uploadbpjs').on('change', function () {
            readURLbpjs(input);
        });
    });

    /*  ==========================================
            SHOW UPLOADED IMAGE NAME
        * ========================================== */
    var inputbpjs = document.getElementById('uploadbpjs');
    var infoAreabpjs = document.getElementById('upload-labelbpjs');

    inputbpjs.addEventListener('change', showFileNamebpjs);

    function showFileNamebpjs(event) {
        var inputbpjs = event.srcElement;
        var fileNamebpjs = inputbpjs.files[0].name;
        infoAreabpjs.textContent = 'File name: ' + fileNamebpjs;

    }
</script>    
@endsection