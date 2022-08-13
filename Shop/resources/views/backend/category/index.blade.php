@extends('backend.admin.dashboard')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Danh Sách Category</h3>
                        <br>
                        @if (Auth::user()->role_id == 2)
                            <select class="form-control col-3" id="filter_type" name="filter_type">

                                <option {{ $filter_type == 1 ? 'selected' : '' }} value="1">Tất cả</option>
                                <option {{ $filter_type == 2 ? 'selected' : '' }} value="2">Đang sử dụng</option>
                                <option {{ $filter_type == 3 ? 'selected' : '' }} value="3">Đã bị xóa</option>

                            </select>
                        @endif
                    </div>



                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 10px">STT</th>
                                <th>Hình ảnh</th>
                                <th>Tên</th>
                                <th>Danh mục cha</th>
                                <th>Sắp xếp </th>
                                <th>Trạng thái </th>

                                <th>Hành động</th>
                            </tr>
                            @foreach ($data as $key => $item)
                                <tr class="item-{{ $item->id }}">
                                    <td>{{ $key + 1 }} </td>
                                    <td>
                                        @if (file_exists($item->image))
                                            <img src="  {{ asset($item->image) }}" width="100" height="70"
                                                alt="">
                                        @else
                                            <img src="  {{ asset('public/upload/404.jpg') }}" width="200" height="150"
                                                alt="">
                                        @endif



                                    </td>

                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->parent_id > 0 ? @$item->parent->name : 'Null' }}</td>
                                    <td>{{ $item->position }}</td>
                                    <td>
                                        <span class="badge bg-red">
                                            @if ($item->is_active == 1)
                                                Hiện
                                            @elseif ($item->is_active == 0)
                                                Ẩn
                                            @else
                                                None
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('category.edit', ['category' => $item->id]) }}" type="button"
                                            class="btn btn-info"><i class="fa fa-pencil-square-o"> Edit</i></a>

                                        @if ($item->deleted_at == null)
                                            <span href="" data-id="{{ $item->id }}" type="button"
                                                class="btn btn-danger deleteItem"><i class="fa fa-trash-o">
                                                    Delete</i></span>
                                        @else
                                            <span href="" data-id="{{ $item->id }}" type="button"
                                                class="btn btn-warning restoreItem"><i class="fa fa-refresh">
                                                    Restore</i></span>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach




                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">
                            <li><a href="#">&laquo;</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('js')
    <script type="text/javascript">
        $(document).ready(function() {


            $('.restoreItem').click(function() {
                var id = $(this).attr('data-id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Khôi phục dữ liệu!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, restore it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: 'category/restore/' + id,
                            type: 'POST',
                            data: {},
                            success: function(res) {
                                if (res.status) {
                                    $('.item-' + id).remove();
                                    Swal.fire(
                                        'Delete!',
                                        'Khôi Phục thành công',
                                        'success'
                                    )
                                } else {
                                    Swal.fire(
                                        'Delete!',
                                        'Có lỗi xảy ra',
                                        'error'
                                    )
                                }
                            },
                            error: function(res) {}
                        });
                    }
                });
            });

            $('#filter_type').change(function() {
                var filter_type = $('#filter_type').val();

                window.location.href = "{{ route('category.index') }}?filter_type=" + filter_type;
            });
            $('.deleteItem').click(function() {
                var id = $(this).attr('data-id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: 'category/' + id,
                            type: 'DELETE',
                            data: {},
                            success: function(res) {
                                if (res.status) {
                                    $('.item-' + id).remove();
                                }
                            },
                            error: function(res) {}
                        });
                    }
                });
            });
        });
    </script>
@endsection
