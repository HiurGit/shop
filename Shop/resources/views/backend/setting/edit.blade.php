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
                    <h3 class="box-title">Update Category</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{ route('setting.update',['setting' => $model->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên</label>
                            <input required id="company" name="company" type="text" class="form-control" placeholder="" value="{{$model->company}}">
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
                            <label for="exampleInputEmail1">Địa chỉ 1</label>
                            <input required id="address" name="address" type="text" class="form-control" placeholder="" value="{{$model->address}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Địa chỉ 2</label>
                            <input required id="address2" name="address2" type="text" class="form-control" placeholder="" value="{{$model->address2}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone</label>
                            <input required id="phone" name="phone" type="text" class="form-control" placeholder="" value="{{$model->phone}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hotline</label>
                            <input required id="hotline" name="hotline" type="text" class="form-control" placeholder="" value="{{$model->hotline}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tax</label>
                            <input required id="tax " name="tax" type="text" class="form-control" placeholder="" value="{{$model->tax}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Facebook</label>
                            <input required id="facebook" name="facebook" type="text" class="form-control" placeholder="" value="{{$model->facebook}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input required id="email" name="email" type="text" class="form-control" placeholder="" value="{{$model->email}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giới thiệu</label>
                            <input required id="introduce" name="introduce" type="text" class="form-control" placeholder="" value="{{$model->introduce}}">
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

        $( document ).ready(function() {

            $('.btnUpdate').click(function () {
                if ($('#name').val() === '') {
                    $('#name').notify('Bạn nhập chưa nhập tiêu đề','error');
                    document.getElementById('name').scrollIntoView();
                    return false;
                }

            });
        });
    </script>
@endsection
