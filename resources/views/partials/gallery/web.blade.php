{{-- resources/views/partials/gallery/web.blade.php --}}

@php
$webImages = [
    ['src' => 'webdesign1.png', 'title' => 'WebDesign 1', 'alt' => 'WebDesign 1'],
    ['src' => 'webdesign2.png', 'title' => 'WebDesign 2', 'alt' => 'WebDesign 2'],
    ['src' => 'webdesign3.png', 'title' => 'WebDesign 3', 'alt' => 'WebDesign 3'],
    ['src' => 'webdesign4.png', 'title' => 'WebDesign 4', 'alt' => 'WebDesign 4'],
];
@endphp

@foreach($webImages as $index => $img)
    <figure class="image-handler-block">
        <div class="image-handler">
            <a href="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/{{ $img['src'] }}" data-lightbox="portfolio" data-title="{{ $img['title'] }}">
                <img src="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/{{ $img['src'] }}" alt="{{ $img['alt'] }}" loading="lazy" decoding="async">
            </a>
        </div>
        <figcaption class="image-text">Template {{ $index + 1 }}</figcaption>
    </figure>
@endforeach
