<tr>
<td>{{ $name }}</td>
<td>{{ $category }}</td>
<td>{{ $supplier }}</td>
<td>{{ $price }}</td>
<td><input type="number" name="selling_price[]"  id="selling_price[]" style="height:20px;width: 80px;text-align:center;"  value="{{ $price }}" ></td>
<input id="hide" type="hidden" value="{{ $id }}" name="item_id[]"  >
<input id="item_price[]" value="{{ $price }}" type="hidden" name="item_price[]"  >


</tr>