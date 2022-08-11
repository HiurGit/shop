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
                    <h3 class="box-title">Update nhà cung cấp</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{ route('vendor.update',['vendor' => $model->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên nhà cung cấp</label>
                            <input required id="name" name="name" type="text" class="form-control" placeholder="" value="{{$model->name}}">
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
                            <label for="exampleInputEmail1">Email</label>
                            <input  id="email" name="email" type="text" class="form-control" placeholder="" value="{{$model->email}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone</label>
                            <input  id="phone" name="phone" type="number" class="form-control" placeholder="" value="{{$model->phone}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Địa chỉ</label>
                            <input  id="address" name="address" type="text" class="form-control" placeholder="" value="{{$model->address}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Website</label>
                            <input  id="website" name="website" type="text" class="form-control" placeholder="" value="{{$model->website}}">
                        </div>


                        <div class="form-group">
                            <label for="exampleInputPassword1">Vị trí</label>
                            <input min="0" type="number" class="form-control" id="position" name="position" placeholder="" value="{{$model->position}}">
                        </div>

                        <div class="checkbox">
                            <label>
                                <input @if($model->is_active =='1') checked @endif value="1" type="checkbox" name="is_active" id="is_active"> Hiển thị
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
