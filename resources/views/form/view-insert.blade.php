@extends('layouts.app')
{{-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> --}}
<meta name="csrf-token" content="{{ csrf_token() }}" />
<style>
    .form-margin{
        margin-top: 10px;
        margin-bottom: 10px;
    }
</style>
@section('content')
<h1>UserSkilL</h1>
<div class="row">
    <div class="col-lg-12">
        <div class="form-group has-success">
            <label class="col-sm-4 control-label">Crad Code</label>
            <div class="col-sm-7 form-margin"><input type="text" class="form-control" name="cardCode" id="cardCode"></div>
        </div>
        <div class="form-group has-success">
            <label class="col-sm-4 control-label">Name</label>
            <div class="col-sm-7 form-margin"><input type="text" class="form-control" name="fullname" id="fullname"></div>
        </div>
        <div class="form-group has-success">
            <label class="col-sm-4 control-label">Address</label>
            <div class="col-sm-7 form-margin"><input type="text" class="form-control" name="address" id="address"></div>
        </div>
        <div class="form-group has-success">
            <label class="col-sm-4 control-label">Tel</label>
            <div class="col-sm-7 form-margin"><input type="number" class="form-control" name="tel" id="tel"></div>
        </div>
        <div class="form-group has-success">
            <label class="col-sm-4 control-label">Image</label>
            <div class="col-sm-7 form-margin"><input type="file" class="form-control" name="image" id="image"></div>
        </div>
        <div class="col-sm-12">
            <button class="btn btn-info btn_add_config" id="btnAddConfig">Add</button>
        </div>
    </div>
</div>
@endsection
@section('script')
{{-- <script src="/js/plugins/dataTables/datatables.min.js"></script> --}}
<script type="text/javascript">

    $(document).on('click','.btn_add_config', function(){
        // var fullname = $("input[name=fullname]").val();
        var cardCode = $('#cardCode').val();
        var fullname = $('#fullname').val();
        var tel = $('#tel').val();
        var address = $('#address').val();
        var image = $('#image').val();
        // alert(fullname);
        var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
        type: 'POST',
        url: "/form/insert-config",

        data: {
            _token: token,
            _method: 'POST',
            cardCode: cardCode,
            fullname: fullname,
            tel: tel,
            address: address,
            image: image,
        },
            success: function (response) {
                console.log("ASD");

            }
        });
        // window.location.reload();
        window.location = "/form/view-list";
    });

</script>
@endsection
