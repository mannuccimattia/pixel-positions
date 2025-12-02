@props(['employer', 'width' => 90])

@php
    $src = $employer->logo;
    if (!Str::contains($src, 'picsum')) {
        $src = asset('/storage' . '/' . $employer->logo);
    }
@endphp

<img src="{{ $src }}" alt="Job employer logo" class="rounded-xl" width="{{ $width }}">
