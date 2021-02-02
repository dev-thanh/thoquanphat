<?php $key  = isset($key) ? $key : (int) round(microtime(true) * 1000); ?>
<tr>
	<td class="index">{{ $index }}</td>
	<td>
		<input type="text" name="content[video][{{ $key }}][title]" class="form-control" value="{{ @$value->title }}">
	</td>
	<td>
		<input type="text" name="content[video][{{ $key }}][link]" class="form-control" value="{{ @$value->link }}">
	</td>
	<td style="text-align: center;">
        <a href="javascript:void(0);" onclick="$(this).closest('tr').remove()" class="text-danger buttonremovetable" title="Xóa">
            <i class="fa fa-minus"></i>
        </a>
    </td>
</tr>