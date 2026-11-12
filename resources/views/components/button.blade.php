@props(['value','class','type'])
<button type="{{$type ?? 'submit'}}" class="btn {{$class ?? 'btn-info'}}">{{$value ?? 'submit'}}</button>
