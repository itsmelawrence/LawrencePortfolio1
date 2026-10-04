@php
    $projects = [
        [
            'number' => '01',
            'type' => 'Client website',
            'title' => 'JAK Pest Control',
            'description' => [
                'WordPress & Spectra One',
                'Spectra Blocks',
                'Custom CSS & JavaScript',
                'Max Mega Menu',
                'Splide Carousel',
            ],
            'link' => 'https://jakpestcontrolservices.com/',
            'video' => 'websitescrolls.mp4',
        ],
        [
            'number' => '02',
            'type' => 'Catalog design',
            'title' => 'Vesaro',
            'description' => ['Catalog template', 'Canva'],
            'link' => '',
            'video' => 'catalogtemplate.mp4',
        ],
        [
            'number' => '03',
            'type' => 'Campaign design',
            'title' => 'Social Media Templates',
            'description' => ['Social media template system', 'Canva'],
            'link' => '',
            'video' => 'socialmedia.mp4',
        ],
        [
            'number' => '04',
            'type' => 'Visual education',
            'title' => 'Website Design Infographics',
            'description' => ['Infographic template system', 'Canva'],
            'link' => '',
            'video' => 'websiteinfographics.mp4',
        ],
    ];
@endphp

<section id="gallery" class="card-info-container" aria-labelledby="work-heading">
    @include('partials.section-header', [
        'eyebrow' => 'Selected projects',
        'title' => 'Selected Work',
        'count' => sprintf('%02d', count($projects)),
        'label' => 'projects',
        'headingId' => 'work-heading'
    ])

    <div class="projects-showcase">
        @foreach ($projects as $project)
            @include('partials.gallery-block', $project)
        @endforeach
    </div>

    @include('partials.gallery-images')
</section>
