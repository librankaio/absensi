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
                    <form action="/postabsen" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal & Waktu</label>
                                        @php
                                            date_default_timezone_set('Asia/Jakarta');  
                                        @endphp
                                        <input type="datetime-local" class="form-control datetimepicker" name="tdtabsent" id="tdtabsent" value="{{ date("Y-m-d h:i", time()) }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama" value="{{ session('name') }}" readonly>
                                    </div>
                                </div>
                            </div>                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input type="text" class="form-control" name="nik" value="{{ session('nik') }}" readonly>
                                    </div>
                                </div>
                                {{-- <div class="col-md-6">
                                    <div class="form-group">
                                    </div>
                                </div> --}}
                            </div>                            
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit" formaction="postabsen" id="confirm">Absen</button>
                            <button class="btn btn-primary mr-1" type="submit" formaction="" id="confirm">History Absensi</button>
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
        // username = $("#username").val();
        // password = $("#password").val();
        // branch = $("#branch").prop('selectedIndex');
        // if (username == ""){
        //     swal('WARNING', 'Username Tidak boleh kosong!', 'warning');
        //     return false;
        // }else if (password == '' || password == null){
        //     swal('WARNING', 'password Tidak boleh kosong!', 'warning');
        //     return false;
        // }else if (branch == 0){
        //     swal('WARNING', 'Please select Branch!', 'warning');
        //     return false;
        // }
    });

    $(function(){
      $('.date').datepicker({
        clearBtn: true,
        format: 'dd/mm/yyyy'
      });
    });
</script>    
@endsection