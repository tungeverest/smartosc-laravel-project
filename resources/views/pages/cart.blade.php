@extends('master')
@section('title','Giỏ Hàng')
@section('content')
<div class="col-sm-push-0 col-md-push-0 col-md-12">
	<h3>Giỏ hàng</h3>

	<form method="post">
		<table class="table table-bordered .table-responsive text-center">
			<tr class="active">
				<td width="11.111%">Ảnh mô tả</td>
				<td width="22.222%">Tên sản phẩm</td>
				<td width="22.222%">Số lượng</td>
				<td width="16.6665%">Đơn giá</td>
				<td width="16.6665%">Thành tiền</td>
				<td width="11.112%">Xóa</td>
			</tr>
			@foreach($list as $item)
			<tr>
				<td><img class="img-responsive" src="{{asset('storage/app/'.$item->options->img)}}"></td>
				<td>{{$item->name}}</td>
				<td>
					<div class="form-group">
						<input class="updateCart form-control" rowId="{{$item->rowId}}" type="number" min="1" value="{{$item->qty}}">
					</div>
				</td>
				<td><span class="price">{{number_format($item->price,0,',','.')}} VND</span></td>
				<td><span class="{{$item->rowId}}">{{number_format($item->price*$item->qty,0,',','.')}} VND</span></td>
				<td><a onclick="return confirm('Bạn có muốn xóa sản phẩm này ?');" href="{{asset('cart/remove/'.$item->rowId)}}"><span class="glyphicon glyphicon-remove"></span></a></td>
			</tr>
			@endforeach
		</table>
		<div class="row" id="total-price">
			<div class="col-md-12 text-right">
				Tổng thanh toán: <span class="total-price">{{$totalAll}} VND</span>
			</form>

			@if(Cart::count() > 0)
			<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">Thanh toán</button>

			<!-- Modal -->
			<div id="myModal" class="modal fade" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content text-left">
						<div class="modal-header">
							{{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
							<h4 class="modal-title">Xác nhận mua hàng </h4>
						</div>
						<div class="modal-body">
							<form method="post" class="form-group">
								@include('errors.notes')
								{{csrf_field()}}
								<div class="form-group">
									<label for="name">Họ và tên:<span class="span-required">*</span></label>
									<input type="text" class="form-control" name="name">
								</div>
								<div class="form-group">
									<label for="email">Email:<span class="span-required">*</span></label>
									<input type="email" class="form-control" name="email">
								</div>
								<div class="form-group">
									<label for="phone">Số điện thoại:<span class="span-required">*</span></label>
									<input type="numberic" class="form-control" name="phone">
								</div>
								<div class="form-group">
									<label for="add">Địa chỉ:<span class="span-required">*</span></label>
									<input type="text" class="form-control" name="address">
								</div>
								<div class="form-group">
									<label for="comment">Ghi chú:</label>
									<textarea class="form-control" rows="5" id="comment" name='notes'></textarea>
								</div>
								<div class="form-group">
									<p><span class="span-required">*</span> Vui lòng điền đầy đủ thông tin</p>
								</div>
								<div class="form-group text-center">
									<button type="submit" name="submit" class="btn btn-default">Xác nhận đơn hàng</button>
									{{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
								</div>
							</form>
						</div>
					</div>

				</div>
			</div>
			@endif
			<a  class="btn btn-warning" href="{{asset('/')}}">Mua tiếp</a>
			<a onclick="return confirm('Bạn có muốn xóa toàn bộ giỏ hàng này ?');" class="btn btn-warning" href="{{asset('cart/remove/all')}}">Xóa giỏ hàng</a>
		</div>
	</div></div>
	@stop