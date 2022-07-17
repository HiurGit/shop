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
                <th>Hình ảnh</th>
                <th>Tên</th>
                <th>Loại</th>
                <th>Hiển thị</th>
                <th>Hành động</th>
              </tr>
              @foreach ($data as $key => $item )]

              <tr>
                <td>{{ $key + 1 }} </td>
                <td>
                    @if ( file_exists($item->image))
                     <img src="  {{ asset($item->image )}}" width="200" height="150" alt="">
                    @else
                    <img src="  {{ asset('public/upload/404.jpg' )}}" width="200" height="150" alt="">
                    @endif



                </td>

                <td>{{ $item->title }}</td>
                <td>
                        @if ($item->type==1)
                        Banner trang chủ
                        @elseif ($item->type==2)
                        Banner quảng cáo trái
                        @elseif ($item->type==3)
                        Banner quảng cáo phải
                        @elseif ($item->type==4)
                        Background
                        @else
                        None
                        @endif

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
                    <a href="{{ route('banner.edit',['banner' => $item->id])}}"  type="button" class="btn btn-info"><i class="fa fa-pencil-square-o" > Edit</i></a>
                    <a href="" type="button" class="btn btn-danger"><i class="fa fa-trash-o"> Delete</i></a>
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
