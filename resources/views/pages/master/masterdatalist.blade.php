@extends('layouts.main')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Master Data List</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Master Data</a></div>
            <div class="breadcrumb-item"><a class="text-muted">Master Bank</a></div>
        </div>
    </div>
    {{-- @php
        $mbank_save = session('mbank_save');
        $mbank_updt = session('mbank_updt');
        $mbank_dlt = session('mbank_dlt');
    @endphp --}}
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="datatable">
                                <thead>
                                    <tr>
                                        <th scope="col" class="border border-5">No</th>
                                        <th scope="col" class="border border-5">Nama</th>
                                        <th scope="col" class="border border-5">NIK</th>
                                        <th scope="col" class="border border-5">Phone</th>
                                        <th scope="col" class="border border-5">Address</th>
                                        <th scope="col" class="border border-5">Sex</th>
                                        <th scope="col" class="border border-5">Edit</th>
                                        <th scope="col" class="border border-5">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $counter = 0 @endphp
                                    @foreach($results as $data => $item)
                                    @php $counter++ @endphp
                                    <tr>
                                        <th scope="row" class="border border-5">{{ $counter }}</th>
                                        <td class="border border-5">{{ $item->name }}</td>
                                        <td class="border border-5">{{ $item->nik }}</td>
                                        <td class="border border-5">{{ $item->phn }}</td>
                                        <td class="border border-5">{{ $item->addr }}</td>
                                        <td class="border border-5">{{ $item->sex }}</td>
                                        <td class="border border-5"><a href="/mdataedit/{{ $item->id }}/edit"
                                            class="btn btn-icon icon-left btn-primary"><i class="far fa-edit">
                                                Edit</i></a></td>
                                                <td class="border border-5">
                                                    <form action="/mdataedit/delete/{{ $item->id }}" id="del-{{ $item->id }}"
                                                        method="POST">
                                                        @csrf
                                                        <button class="btn btn-icon icon-left btn-danger"
                                                            id="del-{{ $item->id }}" type="submit"
                                                            data-confirm="WARNING!|Do you want to delete {{ $item->name }} data?"
                                                            data-confirm-yes="submitDel({{ $item->id }})"><i
                                                                class="fa fa-trash">
                                                                Delete</i></button>
                                                    </form>
                                                </td>
                                            </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
@section('botscripts')
<script type="text/javascript">
    $('#datatable').DataTable({
        // "ordering":false,
        "bInfo" : false
    });

    $(".alert button.close").click(function (e) {
        $(this).parent().fadeOut(2000);
    });

    function submitDel(id){
        $('#del-'+id).submit()
    }
    $(document).on("click","#confirm",function(e){
        // Validate ifnull
        kode = $("#kode").val();
        nama = $("#nama").val();
        if (kode == ""){
            swal('WARNING', 'Kode Tidak boleh kosong!', 'warning');
            return false;
        }else if (nama == 0){
            swal('WARNING', 'Nama Tidak boleh kosong!', 'warning');
            return false;
        }
    });
</script>
@endsection