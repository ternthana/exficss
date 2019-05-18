<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'ชื่อร้าน' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($post->name) ? $post->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Description' }}</label>
    <textarea class="form-control" rows="5" name="description" type="textarea" id="description" >{{ isset($post->description) ? $post->description : ''}}</textarea>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <label for="description" class="control-label">{{ 'อัพโหลดรูปภาพร้าน' }}</label>
    <input type="file" name="image" class="form-control" style="padding: 9px 9px 36px 9px;">
</div>

<div class="form-group">
    <input class="btn btn-primary btn-create" style="float: right;" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'ตั้งร้าน' }}">
</div>
