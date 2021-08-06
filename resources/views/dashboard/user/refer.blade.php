@extends('dashboard.user.layouts.master')
@section('title', 'Refer')

@section('content')
<div class="current-ref sec_pad text-center">
    <h2>Refer-O-Meter - Current Referrals</h2>
    <ul class="d-flex">
        @foreach ($levels as $level)
            <li>
                <span class="img-bg"><img src="{{ asset('uploads/').'/'.$level->icon }}" /></span>
                <strong class="d-block">{{ $level->title }} <b>{{ $level->referrals }}</b></strong>
            </li>
        @endforeach
    </ul>
</div>
<div class="awesome-vidz">
    <div class="top_text">{!! $content->top_text !!}</div>
    <div class="center_text">{!! str_replace('[refer_code]', $reffer_code, $content->center_text) !!}</div>
    <div class="bottom_text">{!! $content->bottom_text !!}</div>
</div>

@endsection

@push('scripts')
<script>
    function myFunction() {
        var element = document.getElementById("menu_target");
        element.classList.toggle("menu-toggle");
    }
</script>
@endpush
