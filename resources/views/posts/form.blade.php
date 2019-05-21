<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'ชื่อร้าน' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($post->name) ? $post->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('open_shop') ? 'has-error' : ''}}">
    <label for="open_shop" class="control-label">{{ 'รายละเอียดของร้าน (วันเวลาเปิดปิด)' }}</label>
    <input class="form-control" name="open_shop" type="text" id="open_shop" value="{{ isset($post->open_shop) ? $post->open_shop : ''}}" >
    {!! $errors->first('open_shop', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    <label for="address" class="control-label">{{ 'ที่อยู่ของร้าน' }}</label>
    <textarea class="form-control" rows="2" name="address" type="textarea" id="address" >{{ isset($post->address) ? $post->address : ''}}</textarea>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('mobile') ? 'has-error' : ''}}">
    <label for="mobile" class="control-label">{{ 'เบอร์โทรของร้าน' }}</label>
    <input class="form-control" name="mobile" type="text" id="mobile" value="{{ isset($post->mobile) ? $post->mobile : ''}}" >
    {!! $errors->first('mobile', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="control-label">{{ 'ช่วงราคา' }}</label>
    <input class="form-control" name="price" type="text" id="price" value="{{ isset($post->price) ? $post->price : ''}}" >
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('facebook') ? 'has-error' : ''}}">
    <label for="facebook" class="control-label">{{ 'Facebook ของร้าน' }}</label>
    <input class="form-control" name="facebook" type="text" id="facebook" value="{{ isset($post->facebook) ? $post->facebook : ''}}" >
    {!! $errors->first('facebook', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('instagram') ? 'has-error' : ''}}">
    <label for="instagram" class="control-label">{{ 'Instagram ของร้าน' }}</label>
    <input class="form-control" name="instagram" type="text" id="instagram" value="{{ isset($post->instagram) ? $post->instagram : ''}}" >
    {!! $errors->first('instagram', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <label for="img_url" class="control-label">{{ 'อัพโหลดรูปภาพร้าน' }}</label>
    <input type="file" name="image" class="form-control" style="padding: 9px 9px 36px 9px;">
</div>

<div class="form-group">
    <input class="btn btn-primary btn-create" style="float: right;" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'ตั้งร้าน' }}">
</div>
