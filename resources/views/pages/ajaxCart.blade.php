<div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Sản Phẩm</th>
                                    <th>Đơn giá</th>
                                    <th>Số Lượng</th>
                                    <th>Thành Tiền</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach(Cart::content() as $row)
                                <form method="post" action="{{asset('cart/update')}}">
                                    {{csrf_field()}}
                                <tr>
                                    <td>{{$row->id}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>{{number_format($row->price)}}</td>
                                    <td><input class="updateCart form-control" rowId="{{$row->rowId}}" type="number" min="1" value="{{$row->qty}}"></td>
                                    <td><span class="{{$row->rowId}}">{{number_format($row->total,0,',','.')}} VND</span></td>
                                </tr>
                                </form>
                                @endforeach
                                <tr>
                                    <td colspan="4">Tổng số tiền: <span class="total-price">{{Cart::total()}}</span></td>
                                    <td colspan="2"><a class="btn btn-info pull-right" href="{{ asset('cart') }}" title="">Thanh Toán</a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>