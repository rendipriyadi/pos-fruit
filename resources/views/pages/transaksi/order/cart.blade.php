@forelse($cart_data as $index => $cart)
    <tr>
        <td>
            <form action="{{ route('backsite.order.delete_cart', $cart->id) }}" method="POST">
                @csrf
                {{ $loop->iteration }} <br><a onclick="this.closest('form').submit();return false;"><i class="bx bx-trash"
                        style="color: rgb(134, 134, 134)"></i></a>
            </form>
        </td>
        <td>{{ Str::words($cart->item_buah->nama, 3) }} <br>Rp.
            {{ number_format($cart->item_buah->harga, 0, ',', '.') }}
        </td>
        <td class="font-weight-bold">
            <form action="{{ route('backsite.order.min_qty', $cart->id) }}" method="POST" style='display:inline;'>
                @csrf
                <button class="btn btn-sm btn-info" style="display: inline;padding:0.4rem 0.6rem!important"><i
                        class="bx bx-minus"></i></button>
            </form>
            <a style="display: inline">{{ $cart->qty }}</a>
            <form action="{{ route('backsite.order.plus_qty', $cart->id) }}" method="POST" style='display:inline;'>
                @csrf
                <button class="btn btn-sm btn-primary" style="display: inline;padding:0.4rem 0.6rem!important"><i
                        class="bx bx-plus"></i></button>
            </form>
        </td>
        <td class="text-right">Rp. {{ number_format($cart->total, 0, ',', '.') }}</td>
    </tr>
@empty
    <tr>
        <td colspan="4" class="text-center">Empty Cart</td>
    </tr>
@endforelse
<tr>
    <th colspan="3">Total</th>
    <th class="text-right font-weight-bold"><input type="text" name="total_harga" id="total_harga"
            class="form_control text-danger text-center font-weight-bold"
            value="Rp. {{ number_format($total, 0, ',', '.') }}" readonly style="width: 132%; border:none"></th>
</tr>
