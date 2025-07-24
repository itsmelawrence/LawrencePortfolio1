
<div id="gallery" class="card-info-container">

    {{-- Video Block 1 --}}
    @include('partials.gallery-block', [
        'title' => 'VESARO',
        'description' => ['+ Catalog Template', '+ Made in Canva'],
        'video' => 'catalogtemplate.mp4',
        'style' => 'opacity: 0.8512;'
    ])

    {{-- Video Block 2 --}}
    @include('partials.gallery-block', [
        'title' => 'SOCIAL MEDIA TEMPLATE',
        'description' => ['+ Templates For Social Media', '+ Made in Canva'],
        'video' => 'socialmedia.mp4',
        'style' => 'opacity: 0;'
    ])

    {{-- Video Block 3 --}}
    @include('partials.gallery-block', [
        'title' => 'WEBSITE DESIGN INFOGRAPHICS',
        'description' => ['+ Infographics Template', '+ Made in Canva'],
        'video' => 'websiteinfographics.mp4',
        'style' => 'opacity: 0;'
    ])

    {{-- Visual Image Gallery --}}
    @include('partials.gallery-images')

</div>
