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
                    <h3 class="box-title">Update Contact</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{ route('contact.update',['contact' => $model->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên người liên hệ</label>
                            <input required id="name" name="name" type="text" class="form-control" placeholder="" value="{{$model->name}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone</label>
                            <input required id="name" name="phone" type="text" class="form-control" placeholder="" value="{{$model->phone}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input required id="name" name="email" type="text" class="form-control" placeholder="" value="{{$model->email}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nội dung</label>
                            <input required id="name" name="content" type="text" class="form-control" placeholder="" value="{{$model->content}}">
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
