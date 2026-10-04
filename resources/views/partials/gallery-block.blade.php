<article class="project-card">
    <div class="project-card__details">
        <div class="project-card__index" aria-hidden="true">{{ $number }}</div>
        <p class="project-card__type">{{ $type }}</p>
        <h3 class="project-card__title">{{ $title }}</h3>

        <ul class="project-card__tags" aria-label="Tools and deliverables">
            @foreach ($description as $line)
                <li>{{ $line }}</li>
            @endforeach
        </ul>

        @if ($link)
            <a class="project-card__link" href="{{ $link }}" target="_blank" rel="noopener noreferrer">
                <span>Visit live site</span>
                <span aria-hidden="true">↗</span>
            </a>
        @endif
    </div>

    <div class="project-card__media">
        <video autoplay loop muted playsinline preload="metadata" aria-label="Preview of {{ $title }}">
            <source src="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/{{ $video }}" type="video/mp4">
        </video>
    </div>
</article>
