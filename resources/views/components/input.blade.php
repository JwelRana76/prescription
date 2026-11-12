@props(['id', 'label','type'])
<div class="form-group {{$type=='hidden'?'m-0':'mb-3'}}">
    @if ($type != 'hidden')
    <label for="{{$id}}">
        {{$label ?? ucwords(implode(' ', explode('_', $id))) }} <strong class="text-danger"> {{$attributes['required'] ? '*' : ''}}
        </strong>
    </label>
    @endif
    <input {{ $attributes }} name="{{$id}}" type="{{$type ?? 'text'}}" class=" {{$class}} form-control" id="{{$id}}" placeholder="Input {{$label ?? ucwords(implode(' ', explode('_', $id))) }}">
</div>