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
                <th>Hành động</th>
              </tr>
              @foreach ($data as $key => $item )]
@php

@endphp
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
                <td><span class="badge bg-red">100%</span></td>
                <td>Hành động</td>
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
