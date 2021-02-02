<?php $key  = isset($key) ? $key : (int) round(microtime(true) * 1000); ?>
<tr>
	<td class="index">{{ $index }}</td>
	
	<td>
		<div class="form-group">
			<label for="">Câu hỏi</label>
			<input type="text" name="content[{{ $key }}][question]" class="form-control" value="{{ @$value->question }}">
		</div>

		<div class="form-group">
			<label for="">Câu trả lời</label>
			
			<textarea class="form-control" name="content[{{ $key }}][asw]">{{ @$value->asw }}</textarea>
		</div>
	</td>
	<td style="text-align: center;">
        <a href="javascript:void(0);" onclick="$(this).closest('tr').remove()" class="text-danger buttonremovetable" title="Xóa">
            <i class="fa fa-minus"></i>
        </a>
    </td>
</tr>
<script>
	CKEDITOR.replace( 'content{{ $key }}' );
</script>