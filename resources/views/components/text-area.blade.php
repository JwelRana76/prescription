@props(['id', 'label','class','row'])
<div class="form-group">
    <label for="name">
        {{$label ?? ucwords(implode(' ', explode('_', $id))) }}
    </label>
    <textarea class="{{$class}} form-control" id="{{$id}}" rows="{{$row ?? 3}}"></textarea>
</div>