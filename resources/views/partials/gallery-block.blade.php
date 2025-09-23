<div class="fade-in-viewc" style="{{ $style }}">
    <div class="main-info-container aos-init aos-animate" data-aos="fade-up">
        <div class="fade-left-info-holder">
            <div class="fade-left-info-holder-i">
                <h2>{{ $title }}</h2>
                <p class="gallery-link-web"><a href="{{ $link }}" target="_blank">{{ $link }}</a></p>
                @foreach ($description as $line)
                    <p>{{ $line }}</p>
                @endforeach
                
                
            </div>
        </div>
        <div class="fade-right-info-holder">
            <div class="content-holder">
                <div class="video-container">
                    <video autoplay loop muted playsinline>
                        <source src="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/{{ $video }}" type="video/mp4">
                    </video>
                </div>
            </div>
        </div>
    </div>
</div>
