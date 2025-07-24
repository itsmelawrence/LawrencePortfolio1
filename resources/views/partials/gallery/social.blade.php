{{-- resources/views/partials/gallery/social.blade.php --}}

@php
$socialImages = [
    ['src' => 'social1.png', 'title' => 'Social 1', 'alt' => 'Social 1'],
    ['src' => 'social2.png', 'title' => 'Social 2', 'alt' => 'Social 2'],
    ['src' => 'social3.png', 'title' => 'Social 3', 'alt' => 'Social 3'],
    ['src' => 'social4.png', 'title' => 'Social 4', 'alt' => 'Social 4'],
    ['src' => 'social5.png', 'title' => 'Social 5', 'alt' => 'Social 5'],
    ['src' => 'social6.png', 'title' => 'Social 6', 'alt' => 'Social 6'],
    ['src' => 'social7.png', 'title' => 'Social 7', 'alt' => 'Social 7'],
    ['src' => 'social8.png', 'title' => 'Social 8', 'alt' => 'Social 8'],
    ['src' => 'social9.png', 'title' => 'Social 9', 'alt' => 'Social 9'],
];
@endphp

@foreach($socialImages as $index => $img)
    <div class="image-handler-block">
        <div class="image-handler">
            <a href="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/{{ $img['src'] }}" data-lightbox="portfolio" data-title="{{ $img['title'] }}">
                <img src="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/{{ $img['src'] }}" alt="{{ $img['alt'] }}">
            </a>
        </div>
        <div class="image-text">
            <h3>Template {{ $index + 1 }}</h3>
        </div>
    </div>
@endforeach
