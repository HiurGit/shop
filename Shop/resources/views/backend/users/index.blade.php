@extends('backend.admin.dashboard')
@section('content')
<section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Bordered Table</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-bordered">
              <tr>
                <th style="width: 10px">STT</th>
                <th>Avatar</th>
                <th>Tên</th>
                <th>Email</th>

                <th>Vai trò</th>
                <th>Kích hoạt</th>
                <th>Hành động</th>
              </tr>
              @foreach ($data as $key => $item )

              <tr class="item-{{ $item->id }}">
                <td>{{ $key + 1 }} </td>
                <td>
                    @if ( file_exists($item->avatar))
                     <img src="  {{ asset($item->avatar )}}" width="200" height="150" alt="">
                    @else
                    <img src="  {{ asset('public/upload/404.jpg' )}}" width="200" height="150" alt="">
                    @endif



                </td>

                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>

                <td>

                        @if ($item->role_id==1)
                        <span class="badge bg-blue">    Member</span>

                        </span>

                        @elseif ($item->role_id==2)
                        <span class="badge bg-yellow">  Administrator</span>


                        @else

                        None
                        @endif


                </td>
                <td>
                    <span class="badge bg-red">
                        @if ($item->is_active==1)
                        Kích hoạt
                        @elseif ($item->is_active==0)
                        Banner
                        @else
                        None
                        @endif
                    </span>
                </td>
                <td>
                    <a href="{{ route('users.edit',['user' => $item->id])}}"  type="button" class="btn btn-info"><i class="fa fa-pencil-square-o" > Edit</i></a>
                    <span href=""  data-id="{{ $item->id }}" type="button" class="btn btn-danger deleteItem"><i class="fa fa-trash-o"> Delete</i></span>
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
                            url : 'users/'+id,
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
    </script>
@endsection
