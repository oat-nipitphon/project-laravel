@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="col-sm-3">
            <a href="/form/view-insert" class="btn btn-danger">เพิ่มข้อมูล</a>
        </div>
    </div>
</div>
<div class="card-body">
    <div id="wrapper">
        <div class="col-6">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive" style="margin-top: 25px;">
                        <table class="table table-md" id="viewListDataTable" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>card code</th>
                                    <th>full name</th>
                                    <th>address</th>
                                    <th>tel</th>
                                    <th>image</th>
                                    <th>created_at</th>
                                    <th>updated_at</th>
                                    <th>tool</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

<script>

    var viewListDataTable = $('#viewListDataTable').DataTable({
        "ordering": true,
        "bPaginate": true,
        "searching": true,
        "info": false,
        "responsive": true,
        "bFilter": false,
        "bLengthChange": true,
        "destroy": true,
        "pageLength": 25,
        "order":[
            [0, "asc"]
        ],
        "ajax": {
            "url": "/form/view-list-table",
            "method": "POST",
            "data": {
                "_token": "{{ csrf_token()}}",
            },
        },
        'columnDefs': [{
            "targets": 0,
            "className": "text-center",
        }, ],
        "columns": [
            {
                "data": "id",
            },
            {
                "data": "card_code",
            },
            {
                "data": "fullname",
            },
            {
                "data": "address",
            },
            {
                "data": "tel",
            },
            {
                "data": "image",
            },
            {
                "data": "created_at",
            },
            {
                "data": "updated_at",
            },
            {
                "data": "id",
                "render":function(data){
                    return '<button class="btn btn-sm btn-danger delete_user" data-id="'+ data +'">Edit</button>';
                    // return '<button class="btn btn-sm btn-danger" onclick="delete('+ data +')">Edit</button>';
                }
            },
        ],
    });


    $(document).on('click','.delete_user',function(){
        var id = $(this).attr('data-id');
        var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
        type: 'POST',
        url: "/form/delete-config/"+id,
        data: {
            _token: token,
            _method: 'POST',
            id: id,
        },
            success: function (response) {
                console.log("ASD");

            }
        });
        window.location.reload();
    });

</script>

@endsection
