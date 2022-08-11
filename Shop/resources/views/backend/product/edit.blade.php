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
                        <h3 class="box-title">Update sản phẩm</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{ route('product.update', ['product' => $model->id]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Tên sản phẩm</label>
                                <input id="name" name="name" type="text" class="form-control" placeholder="" value="{{$model->name}}">
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
                                <label for="stock">Số lượng</label>
                                <input id="stock" name="stock" type="number" min="1" class="form-control " value="{{$model->stock}}"
                                    placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="price">Giá</label>
                                <input id="price" name="price" type="text" class="form-control" placeholder="" value="{{$model->price}}">
                            </div>

                            <div class="form-group">
                                <label for="sale">Giá sale</label>
                                <input id="sale" name="sale" type="text" class="form-control" placeholder="" value="{{$model->sale}}">
                            </div>
                            <div class="form-group">
                                <label for="url">Liên kết</label>
                                <input type="text" class="form-control" id="url" name="url" placeholder="" value="{{$model->url}}">
                            </div>
                            <div class="form-group">
                                <label for="url">Color</label>
                                <input type="text" class="form-control" id="color" name="color" placeholder="" value="{{$model->color}}">
                            </div>
                            <div class="form-group">
                                <label for="url">Tóm tắt</label>
                                <input type="text" class="form-control" id="summary" name="summary" placeholder="" value="{{$model->summary}}">
                            </div>
                            <div class="form-group">
                                <label for="category_id">Danh mục sản phẩm (*): </label>
                                <select id="category_id" name="category_id" class="form-control">
                                    <option value="0">-- Chọn Danh Mục --</option>
                                    @foreach ($category as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="vendor_id">Nhà cung cấp</label>
                                <select class="form-control" name="vendor_id" id="vendor_id" >
                                    <option value="0">---Chọn Nhà cung cấp---</option>
                                    @foreach ($vendor as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="brand_id">nhãn hiệu</label>
                                <select class="form-control" name="brand_id" id="brand_id">
                                    <option value="0">---Chọn nhãn hiệu---</option>
                                    @foreach ($brand as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label id="label-desc">Mô tả</label>
                                <textarea id="description" name="description" class="form-control" rows="3" placeholder="Enter ...">{{$model->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="url">meta_title </label>
                                <textarea type="text" class="form-control" id="meta_title" name="meta_title" placeholder="">{{$model->meta_title}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="url">meta_description</label>
                                <textarea type="text" class="form-control" id="meta_description" name="meta_description" placeholder="">{{$model->meta_description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Vị trí</label>
                                <input min="0" type="number" class="form-control" id="position" value="{{$model->summary}}"
                                    name="position" placeholder="">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input @if($model->is_hot =='1') checked @endif value="1" type="checkbox" name="is_hot" id="is_hot"> Is Hot

                                </label>
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
        $(document).ready(function() {
            CKEDITOR.replace('description');

            $('#price').on('keyup', function(e) {
                var price = $(this).val();
                price = parseInt(price.replaceAll(',', ''));
                price = new Intl.NumberFormat('ja-JP').format(price);
                $(this).val(price);
            });
            $('#sale').on('keyup', function(e) {
                var sale = $(this).val();
                sale = parseInt(sale.replaceAll(',', ''));
                sale = new Intl.NumberFormat('ja-JP').format(sale);
                $(this).val(sale);
            });
            $('.btnUpdate').click(function() {
                if ($('#name').val() === '') {
                    $('#name').notify('Bạn nhập chưa nhập tiêu đề', 'error');
                    document.getElementById('name').scrollIntoView();
                    return false;
                }

            });
        });
    </script>
@endsection
