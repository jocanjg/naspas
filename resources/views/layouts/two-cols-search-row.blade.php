<div class="row">
  @php
    $index = 0;
  @endphp
  @foreach ($items as $item)
    <div class="col-md-12">
      <div class="form-group">
          @php
            $stringFormat =  strtolower(str_replace(' ', '', $item));
          @endphp
          <label for="input<?=$stringFormat?>" class="col-md-12 control-label"></label>
          <div class="col-sm-12">
            <input value="{{isset($oldVals) ? $oldVals[$index] : ''}}" type="text" class="form-control" name="<?=$stringFormat?>" id="input<?=$stringFormat?>" placeholder="{{$item}}">
          </div>
      </div>
    </div>
  @php
    $index++;
  @endphp
  @endforeach
</div>
