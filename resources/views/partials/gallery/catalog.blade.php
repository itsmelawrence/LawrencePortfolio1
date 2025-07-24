@php
$catalogImages = [
    ['src' => 'vesaro1.png', 'title' => 'Template 1', 'alt' => 'Vesaro 1', 'label' => 'Front & Back'],
    ['src' => 'vesaro2.png', 'title' => 'Template 2', 'alt' => 'Vesaro 2', 'label' => 'Inner Page 1'],
    ['src' => 'vesaro3.png', 'title' => 'Template 3', 'alt' => 'Vesaro 3', 'label' => 'Inner Page 2'],
    ['src' => 'vesaro4.png', 'title' => 'Template 4', 'alt' => 'Vesaro 4', 'label' => 'Inner Page 3'],
];
@endphp

@foreach($catalogImages as $img)
    <div class="image-handler-block">
        <div class="image-handler">
            <a href="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/{{ $img['src'] }}" data-lightbox="portfolio" data-title="{{ $img['title'] }}">
                <img src="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/{{ $img['src'] }}" alt="{{ $img['alt'] }}">
            </a>
        </div>
        <div class="image-text">
            <h3>{{ $img['label'] }}</h3>
        </div>
    </div>
@endforeach