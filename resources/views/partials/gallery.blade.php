
<div id="gallery" class="card-info-container">

    @include('partials.gallery-block', [
        'title' => 'VESARO',
        'description' => ['+ Catalog Template', '+ Made in Canva'],
        'link' => '',
        'video' => 'catalogtemplate.mp4',
        'style' => 'opacity: 0.8512;'
    ])

    @include('partials.gallery-block', [
        'title' => 'SOCIAL MEDIA TEMPLATE',
        'description' => ['+ Templates For Social Media', '+ Made in Canva'],
        'link' => '',
        'video' => 'socialmedia.mp4',
        'style' => 'opacity: 0;'
    ])

    @include('partials.gallery-block', [
        'title' => 'WEBSITE DESIGN INFOGRAPHICS',
        'description' => ['+ Infographics Template', '+ Made in Canva'],
        'link' => '',
        'video' => 'websiteinfographics.mp4',
        'style' => 'opacity: 0;'
    ])

    @include('partials.gallery-block', [
        'title' => 'JAK PEST CONTROL WEBSITE',
        'description' => ['+ Website Project', '+ Laravel & Vanilla CSS'],
        'link' => 'https://jakpestcontrolservices.com/',
        'video' => 'websitescrolls.mp4',
        'style' => 'opacity: 0;'
    ])

    {{-- Visual Image Gallery --}}
    @include('partials.gallery-images')

</div>
