@extends('dashboard.user.layouts.master')
@section('title', 'Dashboard')

@section('content')

<div class="current-ref sec_pad text-center">
    <h2>{{ $content->page_title }}</h2>
    <ul class="d-flex">
        @foreach ($levels as $level)
        <li>
            <span class="img-bg"><img src="images/cup-icon.png" /></span>
            <strong class="d-block">{{ $level->title }} <b>{{ $level->referrals }}</b></strong>
        </li>
        @endforeach
    </ul>
</div>
<div class="awesome-vidz">
    <div class="figcaption">
        <h3 class="text-uppercase">{{ $content->info_heading }}</h3>
        <p>
            {{ $content->info_tex }}
        </p>

        <span class="alert-part">{{ $content->info_alert }}</span>
    </div>
</div>

@endsection