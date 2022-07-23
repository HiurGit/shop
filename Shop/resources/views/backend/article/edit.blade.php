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
                    <h3 class="box-title">Update Article</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{ route('article.update',['article' => $model->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên bài viết</label>
                            <input value="{{ $model->title }}"  id="title" name="title" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">URL</label>
                            <input value="{{ $model->url }}"  id="url" name="url" type="text" class="form-control" placeholder="">
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
                                @foreach ($dataCate as $item )
                                 <option {{ $item->id == $dataCateFail->parent_id ? 'selected': "" }} value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach


                            </select>
                        </div>
                        <div class="form-group">
                            <label id="label-desc">Summary</label>
                            <textarea id="summary"  name="summary" class="form-control" rows="2" placeholder="Enter ...">{{ $model -> summary }}</textarea>
                        </div>

                        <div class="form-group">
                            <label id="label-desc">Mô tả</label>
                            <textarea id="description"  name="description" class="form-control" rows="2" placeholder="Enter ...">{{ $model -> description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Vị trí</label>
                            <input min="0" value="{{ $model ->position }}" type="number" class="form-control" id="position" name="position" placeholder="">
                        </div>
                        <div class="form-group">
                            <label id="label-desc">Meta Title</label>
                            <textarea id="meta_title"   name="meta_title" class="form-control" rows="2" placeholder="Enter ...">{{ $model -> meta_title }}</textarea>
                        </div>
                        <div class="form-group">
                            <label id="label-desc">Meta Description</label>
                            <textarea id="meta_description"  name="meta_description" class="form-control" rows="2" placeholder="Enter ...">{{ $model -> meta_description }}</textarea>
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
            CKEDITOR.replace( 'summary' );
            CKEDITOR.replace( 'description' );
            CKEDITOR.replace( 'meta_title' );
            CKEDITOR.replace( 'meta_description' );

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
