
<div id="gallery" class="card-info-container">

    @include('partials.gallery-block', [
        'title' => 'JAK PEST CONTROL WEBSITE',
        'description' => [
            '+ Client Website',
            '+ WordPress & Spectra One',
            '+ Spectra Blocks, Custom CSS & JavaScript',
            '+ Max Mega Menu & Splide Carousel'
        ],
        'link' => 'https://jakpestcontrolservices.com/',
        'video' => 'websitescrolls.mp4'
    ])

    @include('partials.gallery-block', [
        'title' => 'VESARO',
        'description' => ['+ Catalog Template', '+ Made in Canva'],
        'link' => '',
        'video' => 'catalogtemplate.mp4'
    ])

    @include('partials.gallery-block', [
        'title' => 'SOCIAL MEDIA TEMPLATE',
        'description' => ['+ Templates For Social Media', '+ Made in Canva'],
        'link' => '',
        'video' => 'socialmedia.mp4'
    ])

    @include('partials.gallery-block', [
        'title' => 'WEBSITE DESIGN INFOGRAPHICS',
        'description' => ['+ Infographics Template', '+ Made in Canva'],
        'link' => '',
        'video' => 'websiteinfographics.mp4'
    ])

    {{-- Visual Image Gallery --}}
    @include('partials.gallery-images')

</div>
