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
                    <h3 class="box-title">Update User</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{ route('users.update',['user' => $model->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên</label>
                            <input required id="name" name="name" type="text" class="form-control" placeholder="" value="{{$model->name}}">
                        </div>
                        <div class="form-group">


                            <label for="exampleInputFile">Chọn Avatar</label>
                            <input type="file" name="avatar" id="avatar">
                            <br>
                            @if ( file_exists($model->avatar))
                            <img src="  {{ asset($model->avatar)}}" width="200" height="150" alt="">
                           @else
                           <img src="  {{ asset('public/upload/404.jpg' )}}" width="200" height="150" alt="">
                           @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="" value="{{$model->email}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mật khẩu mới</label>
                            <input type="text" class="form-control" id="password" name="password" placeholder="" value="{{$model->password}}">
                        </div>

                        <div class="form-group">
                            <label>Quyền</label>
                            <select class="form-control" name="role_id" id="role_id">
                                <option value="">Chọn </option>
                                <option @if($model->role_id =='1') selected @endif value="1">Member</option>
                                <option @if($model->role_id =='2') selected @endif value="2">Administrator</option>

                            </select>
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



