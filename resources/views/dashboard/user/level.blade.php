@extends('dashboard.user.layouts.master')
@section('title', 'Level')

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
    <h1 class="text-center">{{ $level_details->title }} @if ($level_details->heading) - <span style="color: {{ $level_details->heading_color }};">{{ $level_details->heading }}</span> @endif</h1>
    <div id="accordion">
        @foreach ($level_contents as $content)
        <div class="card">
            <div class="card-header" id="heading{{ $loop->index }}">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse{{ $loop->index }}" aria-expanded="false" aria-controls="collapse{{ $loop->index }}">
                        {{ $content->title }}
                        <span class="d-block">{{ $content->subtitle }}</span>
                        <span class="vdo-img"><img src="{{ asset('user/images/video-icon.png') }}" /></span>
                    </button>
                </h5>
            </div>
            <div id="collapse{{ $loop->index }}" class="collapse" aria-labelledby="heading{{ $loop->index }}" data-parent="#accordion">
                <div class="card-body">
                    <div class="video-wrap mb-3">
                        @php
                            $video_link = $content->video_link;
                            $video_id = last(explode('.be/', $video_link));
                        @endphp
                        <iframe
                            width="100%"
                            height="300"
                            src="https://www.youtube.com/embed/{{ $video_id }}"
                            title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen
                        ></iframe>
                    </div>
                    {!! $content->content !!}
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>

<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Destroy Your Competitors</h4>
                <button type="button" class="close" data-dismiss="modal"><img src="{{ asset('user/images/cross-icon.png') }}" /></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="video-wrap mb-3">
                    <iframe
                        width="100%"
                        height="300"
                        src="https://www.youtube.com/embed/xcJtL7QggTI"
                        title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    ></iframe>
                </div>
                <p>Destroy Your Competitors</p>
                <p>Destroy Your Competitors</p>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
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
