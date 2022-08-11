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
                            <h3 class="box-title">Thêm sản phẩm</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" method="post" action="{{ route('product.store') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">Tên sản phẩm</label>
                                    <input id="name" name="name" type="text" class="form-control" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Chọn ảnh</label>
                                    <input type="file" name="image" id="image">
                                </div>

                                <div class="form-group">
                                    <label for="stock">Số lượng</label>
                                    <input id="stock" name="stock" type="number" min="1" class="form-control"
                                        placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="price">Giá</label>
                                    <input id="price" name="price" type="text" class="form-control" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="sale">Giá sale</label>
                                    <input id="sale" name="sale" type="text" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="url">Liên kết</label>
                                    <input type="text" class="form-control" id="url" name="url" placeholder="">
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
                                    <select class="form-control" name="vendor_id" id="vendor_id">
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
                                    <label for="exampleInputPassword1">Vị trí</label>
                                    <input min="0" type="number" class="form-control" id="position" name="position"
                                        placeholder="">
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
            $(document).ready(function() {


                $('.btnCreate').click(function() {
                    if ($('#name').val() === '') {
                        $('#name').notify('Bạn nhập chưa nhập tiêu đề', 'error');
                        document.getElementById('name').scrollIntoView();
                        return false;
                    }

                });
            });
        </script>
    @endsection
