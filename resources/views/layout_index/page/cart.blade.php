@extends('layout_index.master')
@section('content')
<section class="static about-sec">
	<div class="container">
	<h2>Đơn hàng </h2> 
		@if($errors->any())
		<div id="error" style="color: red">{{$errors->first()}}</div>
		@endif
		<table id="cart" class="table table-hover table-condensed" style="margin-bottom: 2em;">
			<thead>
				<tr>
					<th style="width:50%">Tên sản phẩm</th>
					<th style="width:15%">Giá tiền</th>
					<th style="width:10%">Số lượng</th>
					<th style="width:20%; text-align:center">Thành tiền</th>
					<th style="width:10%"></th>
				</tr>
			</thead>
			<tbody>
				<form>
					<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}" />
					@if(Session::has('cart'))
					@foreach($product_cart as $pro)
					<tr>
						<td data-th="Product">
							<div class="row">
								<div class="col-sm-2 hidden-xs"><img style="width:150px; height:80px" src="{{asset('images/product/'.$pro['item']['image'])}}" alt="..." class="img-responsive" /></div>
								<div class="col-sm-10">
									<h4 class="nomargin">{{$pro['item']['name']}}</h4>
									<p></p>
								</div>
							</div>
						</td>
						<td data-th="Price"><span>@if($pro['item']['promotion_price']==0){{number_format($pro['item']['unit_price'])}} @else {{number_format($pro['item']['promotion_price'])}} @endif VNĐ </span></td>
						<td data-th="Quantity" class="product_quantity">
							<input type="number" class="form-control text-center" id="qty-{{$pro['item']['id']}}" onchange="changeQuantity(this)" min="1" value="{{$pro['qty']}}">
						</td>
						<td style="text-align:center" id="total-{{$pro['item']['id']}}">@if($pro['item']['promotion_price']==0){{number_format($pro['item']['unit_price']*$pro['qty'])}} @else {{number_format($pro['item']['promotion_price']*$pro['qty'])}} @endif VNĐ</td>
						<td class="actions">
							<a class="btn btn-danger btn-sm" data-url="{{route('delcart',$pro['item']['id'])}}"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
					@endforeach
					@endif
				</form>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="3" class="hidden-xs"></td>
					<td><strong id="totalPrice">Tổng tiền :@if(Session::has('cart')) {{number_format($cart->totalPrice)}} @else 0 @endif VNĐ</strong></td>
					<td></td>
				</tr>
				<tr>
					<td colspan="3" class="hidden-xs"></td>
					<td><a href="@if(Auth::check()) {{route('checkout')}} @else {{route('login')}} @endif" class="btn btn-success btn-block">Thanh Toán <i class="fa fa-angle-right"></i></a></td>
					<td></td>
				</tr>
			</tfoot>
		</table>

	</div>
</section>
@endsection

@section('script')
<script>
	$(document).on('click', '.btn-sm', DelCart);

	function DelCart(e) {
		e.preventDefault();
		let urlRequest = $(this).data('url');
		let that = $(this);
		Swal.fire({
			title: 'Xóa sản phẩm',
			text: "Bạn có muốn xóa không!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Có, muốn xóa!',
			cancelButtonText: 'Không xóa',
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: urlRequest,
					type: 'GET',
					success: function(data) {
						if (data.code == 200) {
							$('#totalPrice').html('Tổng tiền : ' + Number(data['cart']['totalPrice']).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') + ' VNĐ');
							$('.quntity').html(data['cart']['totalQty']);
							that.parent().parent().remove();
							Swal.fire(
								'Đã xóa!',
								'Xóa thành công.',
								'success'
							)
						}
						$('#error').html('');
					}
				});
			}
		});
	}

	function changeQuantity(inputQuantity) {
		let [x, id] = inputQuantity.id.split('-');
		let _token = document.getElementById('_token');
		let qty = inputQuantity.value;
		requestCart("{{route('cart')}}", JSON.stringify({
			'_token': _token.value,
			'id': id,
			'quantity': inputQuantity.value
		}), function(data) {
			data = JSON.parse(data);
			if (qty > 0) {
				$('#total-' + data['id']).html(Number(data['cart']['items'][data['id']]['price']).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') + ' VNĐ');
				$('#totalPrice').html('Tổng tiền : ' + Number(data['cart']['totalPrice']).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') + ' VNĐ');
				$('.quntity').html(data['cart']['totalQty']);
			} else {
				Swal.fire({
					icon: 'error',
					title: 'Số lượng phải lớn hơn 0',
					showConfirmButton: false,
					timer: 1500
				})
				inputQuantity.value = data['cart']['items'][data['id']]['qty'];
			}
		});
	}

	//
	function requestCart(url = "", para = "", callbackSuccess = function() {}, callbackError = function(err) {
		console.log(err)
	}) {
		let xmlHttp = new XMLHttpRequest();
		xmlHttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				callbackSuccess(this.responseText);
			} else if (this.readyState == 4 && this.status == 500) {
				callbackError(this.responseText);
			}
		}
		xmlHttp.open("POST", url, true);
		xmlHttp.setRequestHeader("Content-type", "application/json");
		xmlHttp.send(para);
	}
</script>
@stop