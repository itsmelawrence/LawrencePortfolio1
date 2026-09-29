@php
    $techStack = [
        ['name' => 'HTML5', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg'],
        ['name' => 'CSS3', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg'],
        ['name' => 'JavaScript', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg'],
        ['name' => 'jQuery', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/jquery/jquery-original.svg'],
        ['name' => 'Bootstrap', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg'],
        ['name' => 'PHP', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg'],
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
                    The technologies and creative tools I use across development, design, and production.
                </p>
            </div>

            <div class="tech-stack-visual" data-aos="fade-left">
                <div class="tech-stack-grid" role="list" aria-label="Technologies and creative tools">
                    @foreach ($techStack as $index => $technology)
                        <div class="tech-item" role="listitem" style="--tech-index: {{ $index }}">
                            <img src="{{ $technology['icon'] }}" alt="" loading="lazy" decoding="async">
                            <span>{{ $technology['name'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
