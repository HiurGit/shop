@extends('backend.admin.dashboard')
@section('content')
<section class="content-header">

    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
    </ol>
</section>
<section class="content">
        <div class="row">
            <div class="col-md-6">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-warning"></i> Lỗi !</h4>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Thêm mới Banner</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{ route('banner.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tiêu đề</label>
                            <input  id="title" name="title" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Chọn ảnh</label>
                            <input type="file" name="image" id="image">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Liên kết</label>
                            <input type="text" class="form-control" id="url" name="url" placeholder="">
                        </div>
                        <div class="form-group">
                            <label>Chọn Target</label>
                            <select class="form-control" name="target" id="target">
                                <option value="	_blank">_blank</option>
                                <option value="_self">_self</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label id="label-desc">Mô tả</label>
                            <textarea id="editor1 description" name="editor1" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                        </div>
                        <div class="form-group">
                            <label>Loại</label>
                            <select class="form-control" name="type" id="type">
                                <option value="1">Banner trang chủ</option>
                                <option value="2">Banner quảng cáo trái</option>
                                <option value="3">Banner quảng cáo phải</option>
                                <option value="4">Background</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Vị trí</label>
                            <input min="0" type="number" class="form-control" id="position" name="position" placeholder="">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input value="1" type="checkbox" name="is_active" id="is_active"> Hiển thị
                            </label>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btnCreate">Thêm</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (left) -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
@endsection



@section('js')

    <script type="text/javascript">

        $( document ).ready(function() {
            CKEDITOR.replace( 'editor1' );
            

            $('.btnCreate').click(function () {
                if ($('#title').val() === '') {
                    $('#title').notify('Bạn nhập chưa nhập tiêu đề','error');
                    document.getElementById('title').scrollIntoView();
                    return false;
                }
                if ($('#description').val() === '') {
                    $('#label-desc').notify('Bạn nhập chưa nhập mô tả','error');
                    document.getElementById('label-desc').scrollIntoView();
                    return false;
                }
            });
        });
    </script>
@endsection
