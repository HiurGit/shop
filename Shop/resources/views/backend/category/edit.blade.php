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
                <form role="form" method="post" action="{{ route('category.update',['category' => $model->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên</label>
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
                            <label>Danh mục cha</label>
                            <select class="form-control" name="parent_id" id="parent_id">
                                <option value="	_blank">Chọn</option>
                                @foreach ($data as $item )
                                 <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach


                            </select>
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
