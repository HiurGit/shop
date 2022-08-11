@extends('backend.admin.dashboard')
@section('content')
<section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Danh Sách sản phẩm</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-bordered myTable" id="myTable">
            <thead>
              <tr>
                <th style="width: 10px">STT</th>
                <th>Hình ảnh</th>
                <th>Tên</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Giá sale</th>
                <th>Liên kết</th>
                <th>Color</th>
                <th>Tóm tắt</th>
                <th>Danh mục</th>
                <th>Cung cấp</th>
                <th>Nhãn hiệu</th>
                <th>Mô tả</th>
                <th>meta_title</th>
                <th>meta_description</th>
                <th>Vị trí</th>
                <th>Is Hot</th>
                <th>Trạng thái </th>
                <th>Hành động</th>
              </tr>
              </thead>
              <tbody>
              @foreach ($data as $key => $item )]

              <tr class="item-{{ $item->id }}">
                <td>{{ $key + 1 }} </td>
                <td>
                    @if ( file_exists($item->image))
                     <img src="  {{ asset($item->image )}}" width="100" height="70" alt="">
                    @else
                    <img src="  {{ asset('public/upload/404.jpg' )}}" width="200" height="150" alt="">
                    @endif
                </td>

                <td>{{ $item->name }}</td>
                <td>{{ $item->stock }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->sale }}</td>
                <td>{{ $item->url }}</td>
                <td>{{ $item->color }}</td>
                <td>{{ $item->summary }}</td>
                <td>{{ $item->category_id }}</td>
                <td>{{ $item->vendor_id }}</td>
                <td>{{ $item->brand_id }}</td>
                <td >{{ $item->description }}</td>
                <td>{{ $item->meta_title }}</td>
                <td>{{ $item->meta_description }}</td>
                <td>{{ $item->position }}</td>

                <td>
                    <span class="badge bg-red">
                        @if ($item->is_hot==1)
                        Hiện
                        @elseif ($item->is_hot==0)
                        Ẩn
                        @else
                        None
                        @endif
                    </span>
                </td>
                <td>
                    <span class="badge bg-red">
                        @if ($item->is_active==1)
                        Hiện
                        @elseif ($item->is_active==0)
                        Ẩn
                        @else
                        None
                        @endif
                    </span>
                </td>
                <td>
                    <a href="{{ route('product.edit',['product' => $item->id])}}"  type="button" class="btn btn-info"><i class="fa fa-pencil-square-o" > Edit</i></a>
                    <span href=""  data-id="{{ $item->id }}" type="button" class="btn btn-danger deleteItem"><i class="fa fa-trash-o"> Delete</i></span>
            </td>
              </tr>
              @endforeach

              </tbody>


            </table>
          </div>
          <!-- /.box-body -->

        </div>
      </div>
    </div>



</section>

@endsection


@section('js')
    <script>
        $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>

    <script type="text/javascript">
        $( document ).ready(function() {


            $('.deleteItem').click(function () {
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
                            url : 'brand/'+id,
                            type: 'DELETE',
                            data: {},
                            success: function (res) {
                                if(res.status) {
                                    $('.item-'+id).remove();
                                }
                            },
                            error: function (res) {
                            }
                        });
                    }
                });
            });
        });
    </>
@endsection
