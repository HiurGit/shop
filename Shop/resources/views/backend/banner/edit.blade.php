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
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Update Banner</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{ route('banner.update',['banner' => $model->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tiêu đề</label>
                            <input required id="title" name="title" type="text" class="form-control" placeholder="" value="{{$model->title}}">
                        </div>
                        <div class="form-group">


                            <label for="exampleInputFile">Chọn ảnh</label>
                            <input type="file" name="image" id="image">
                            <br>
                            @if ( file_exists($model->image))
                            <img src="  {{ asset($model->image )}}" width="200" height="150" alt="">
                           @else
                           <img src="  {{ asset('public/upload/404.jpg' )}}" width="200" height="150" alt="">
                           @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Liên kết</label>
                            <input type="text" class="form-control" id="url" name="url" placeholder="" value="{{$model->url}}">
                        </div>
                        <div class="form-group">
                            <label>Chọn Target</label>
                            <select class="form-control" name="target" id="target">
                                <option @if($model->target =='_blank') selected @endif value="_blank">_blank</option>
                                <option @if($model->target =='_self') selected @endif value="_self">_self</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label  id="label-desc">Mô tả</label>
                            <textarea id="editor1 description" name="editor1" class="form-control" rows="3" placeholder="Enter ..." >{{$model->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Loại</label>
                            <select class="form-control" name="type" id="type">
                                <option value="">Chọn</option>
                                <option @if($model->type =='1') selected @endif value="1">Banner trang chủ</option>
                                <option @if($model->type =='2') selected @endif value="2">Banner quảng cáo trái</option>
                                <option @if($model->type =='3') selected @endif value="3">Banner quảng cáo phải</option>
                                <option @if($model->type =='4') selected @endif value="4">Background</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Vị trí</label>
                            <input min="0" type="number" class="form-control" id="position" name="position" placeholder="" value="{{$model->position}}">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input @if($model->type =='1') checked @endif value="1" type="checkbox" name="is_active" id="is_active"> Hiển thị
                            </label>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btnUpdate">Update</button>
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
        CKEDITOR.replace( 'editor1' );
        $( document ).ready(function() {
            CKEDITOR.replace( 'description' );
            $('.btnUpdate').click(function () {
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
