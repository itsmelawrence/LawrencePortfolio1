@php
    $techStack = [
        ['name' => 'HTML5', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg'],
        ['name' => 'CSS3', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg'],
        ['name' => 'JavaScript', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg'],
        ['name' => 'jQuery', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/jquery/jquery-original.svg'],
        ['name' => 'Bootstrap', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg'],
        ['name' => 'PHP', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg'],
        ['name' => 'WordPress', 'icon' => 'https://cdn.simpleicons.org/wordpress/21759B'],
        ['name' => 'WooCommerce', 'icon' => 'https://cdn.simpleicons.org/woocommerce/96588A'],
        ['name' => 'Gutenberg', 'icon' => 'https://cdn.simpleicons.org/gutenberg/000000', 'monochrome' => true],
        ['name' => 'Spectra', 'mark' => 'S', 'tone' => '#7c3aed'],
        ['name' => 'Elementor', 'icon' => 'https://cdn.simpleicons.org/elementor/92003B'],
        ['name' => 'ACF', 'mark' => 'ACF', 'tone' => '#00b8d9'],
        ['name' => 'LocalWP', 'icon' => 'https://cdn.simpleicons.org/local/51BB7B'],
        ['name' => 'Laravel', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-original.svg'],
        ['name' => 'MySQL', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg'],
        ['name' => 'Photoshop', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/photoshop/photoshop-plain.svg'],
        ['name' => 'Illustrator', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/illustrator/illustrator-plain.svg'],
        ['name' => 'Premiere Pro', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/premierepro/premierepro-plain.svg'],
        ['name' => 'After Effects', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/aftereffects/aftereffects-plain.svg'],
        ['name' => 'Canva', 'icon' => 'https://img.icons8.com/color/96/canva.png'],
    ];
@endphp

<section id="tech-stack" class="main-container tech-stack-section" aria-labelledby="tech-stack-heading">
    <div class="tech-stack-inner fade-in-viewc">
        @include('partials.section-header', [
            'eyebrow' => 'Tools I use',
            'title' => 'Tech Stack',
            'count' => count($techStack),
            'label' => 'tools',
            'headingId' => 'tech-stack-heading'
        ])

        <div class="tech-stack-panel">
            <div class="tech-stack-copy" data-aos="fade-right">
                <h3 class="tech-stack-heading">Tools behind the work</h3>
                <p class="tech-stack-intro">
                    The WordPress ecosystem, development stack, and creative tools I use to build, refine, and ship digital work.
                </p>
            </div>

            <div class="tech-stack-visual" data-aos="fade-left">
                <div class="tech-stack-grid" role="list" aria-label="Technologies and creative tools">
                    @foreach ($techStack as $index => $technology)
                        <div class="tech-item{{ isset($technology['mark']) ? ' tech-item--lettermark' : '' }}{{ !empty($technology['monochrome']) ? ' tech-item--monochrome' : '' }}" role="listitem" style="--tech-index: {{ $index }}; --tech-tone: {{ $technology['tone'] ?? 'transparent' }}">
                            @if (isset($technology['icon']))
                                <img src="{{ $technology['icon'] }}" alt="" loading="lazy" decoding="async">
                            @else
                                <span class="tech-item__mark" aria-hidden="true">{{ $technology['mark'] }}</span>
                            @endif
                            <span>{{ $technology['name'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
