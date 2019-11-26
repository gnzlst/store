@if(isset($detail['product']))
    <tr>
        <td>
            <img src="/{{ $detail['product']['image_path'] }}"
                 alt="{{ $detail['product']['name'] }}" title="{{ $detail['product']['name'] }}" class="image-order">
        </td>
        <td>{{ $detail['product']['name'] }}</td>
        <td>{{ $detail['quantity'] }}</td>
        <td>$ {{ number_format($detail['unit_price'], 2) }}</td>
        <td>$ {{ number_format($detail['total'], 2) }}</td>
        <td>
            <span class="label @if ($detail['status'] === 'Pending') warning  @endif @if ($detail['status'] === 'Ok') success @endif">{{ $detail['status'] }}</span>
        </td>
    </tr>
@endif