@extends('master')
@section('title','Hoàn thành')
@section('content')
<div class="col-md-12 text-center hoanthanh">
	<div class="clearfix"></div>
	<p class="info">Quý khách đã đặt hàng thành công!</p>
	<p>• Hóa đơn mua hàng của Quý khách đã được chuyển đến Địa chỉ Email có trong phần Thông tin Khách hàng của chúng Tôi</p>
	<p>• Sản phẩm của Quý khách sẽ được chuyển đến Địa có trong phần Thông tin Khách hàng của chúng Tôi sau thời gian 2 đến 3 ngày, tính từ thời điểm này.</p>
	<p>• Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước khi giao hàng 24 tiếng</p>
	<p>• Trụ sở chính: SmartOsc-</p>
	<p>Cám ơn Quý khách đã sử dụng Sản phẩm của Công ty chúng Tôi!</p>
	<a class="btn btn-success pull-right" href="{{asset('/')}}">Quay lại trang chủ</a>
</div>	
@stop