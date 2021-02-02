<?php $key  = isset($key) ? $key : (int) round(microtime(true) * 1000); ?>
<tr>
	<td class="index">{{ $index }}</td>
	
	<td>
		<div class="form-group col-sm-3">
			<label for="">Background khối</label>
			<div class="image">
	           	<div class="image__thumbnail">
	               <img src="{{ !empty($value->image) ? url('/').$value->image : __IMAGE_DEFAULT__ }}"  
	               data-init="{{ __IMAGE_DEFAULT__ }}">
	               <a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
	                <i class="fa fa-times"></i></a>
	               <input type="hidden" value="{{ @$value->image }}" name="content[our_value][value][{{ $key }}][image]"  />
	               <div class="image__button" onclick="fileSelect(this)"><i class="fa fa-upload"></i> Upload</div>
	           	</div>
	       	</div>
		</div>
		<div class="col-sm-9">
			<div class="form-group">
				<label for="">Tiêu đề</label>
				<input type="text" name="content[our_value][value][{{ $key }}][title]" class="form-control" value="{{ @$value->title }}">
			</div>

			<div class="form-group">
				<label for="">Nội dung</label>
				
				<textarea class="form-control" name="content[our_value][value][{{ $key }}][desc]">{{ @$value->desc }}</textarea>
			</div>
		</div>
	</td>
	<td style="text-align: center;">
        <a href="javascript:void(0);" onclick="$(this).closest('tr').remove()" class="text-danger buttonremovetable" title="Xóa">
            <i class="fa fa-minus"></i>
        </a>
    </td>
</tr>
<script>
	CKEDITOR.replace( 'content[our_value][value][{{ $key }}][desc]' );
</script>