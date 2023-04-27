@extends('layouts.main')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Absensi</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Absensi</a></div>
            <div class="breadcrumb-item"><a class="text-muted">Approve Absensi</a></div>
        </div>
    </div>
    @php
        $role = session('privilage') ;
        $muser_save = session('muser_save');
        $muser_updt = session('muser_updt');
        $muser_dlt = session('muser_dlt');
    @endphp
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Approve Absensi</h4>
                    </div>
                    <form action="" method="GET">
                        @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal Dari</label>
                                    <input type="date" class="form-control" name="dtfrom" value="@php if(request('dtfrom')==NULL){ echo date('Y-m-d');} else{ echo $_GET['dtfrom']; } @endphp">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal Sampai</label>
                                    <input type="date" class="form-control" name="dtto" value="@php if(request('dtto')==NULL){ echo date('Y-m-d');} else{ echo $_GET['dtto']; } @endphp">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="datatable">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="border border-5">No</th>
                                                        <th scope="col" class="border border-5">Nama Lengkap</th>
                                                        <th scope="col" class="border border-5">Tanggal / Waktu Absen</th>
                                                        <th colspan="2" scope="col" class="border border-5">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $no = 0;
                                                    @endphp
                                                    @isset($results)
                                                        @foreach($results as $key => $item)
                                                        @php
                                                            $no++;
                                                        @endphp
                                                        <tr>
                                                            <td class="border border-5">{{ $no }}</td>
                                                            <td class="border border-5">{{ $item->name_memp }}</td>
                                                            <td class="border border-5">{{ $item->tdtabsent }}</td>
                                                            @if($item->approval == 'Y')
                                                                
                                                            <td colspan="2" class="border border-5">
                                                                <div class="text-success">
                                                                    APPROVED
                                                                </div>
                                                            </td>
                                                            @elseif($item->approval == 'N')
                                                            <td colspan="2" class="border border-5">
                                                                <div class="text-danger">
                                                                    DECLINED
                                                                </div>
                                                                Want to change ? Approve. <a href="accabsen/{{ $item->id }}/acc">Click Here</a>
                                                            </td>
                                                            @else
                                                            <td class="border border-5">
                                                                <a href="/accabsen/{{ $item->id }}/decline" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></a>
                                                            </td>
                                                            <td class="border border-5">
                                                                <a href="accabsen/{{ $item->id }}/acc" class="btn btn-icon btn-success"><i class="fas fa-check"></i></a>
                                                            </td>
                                                            @endif
                                                        </tr>
                                                        @endforeach
                                                    @endisset
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit" formaction="accabsen" id="confirm">Find</button>
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
</script>    
@endsection