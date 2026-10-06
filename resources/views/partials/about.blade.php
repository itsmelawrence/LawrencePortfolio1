<div id="about" class="main-container about">
    <div class="center-content">
        @include('partials.section-header', [
            'eyebrow' => 'Introduction',
            'title' => 'About Me',
            'count' => '01',
            'label' => 'profile',
            'headingId' => 'about-heading'
        ])

        <div class="info-holder">
            <div class="left-info-holder">
                <img src="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/headimg.png" alt="">
            </div>
            <div class="right-info-holder">
                <p class="desc-group">
                    @php
                        $aboutWords = [
                            'My',
                            'journey',
                            'into',
                            'web',
                            'development',
                            'began',
                            'in',
                            'corporate',
                            'training',
                            'and',
                            'visual',
                            'design,',
                            'where',
                            'I',
                            'learned',
                            'to',
                            'turn',
                            'complex',
                            'ideas',
                            'into',
                            'clear,',
                            'engaging',
                            'digital',
                            'experiences.',
                            'That',
                            'creative',
                            'foundation',
                            'led',
                            'me',
                            'into',
                            'freelance',
                            'work',
                            'and,',
                            'ultimately,',
                            'professional',
                            'web',
                            'development.',
                            'Today,',
                            'I',
                            'build',
                            'responsive,',
                            'user-focused',
                            'websites',
                            'and',
                            'web',
                            'applications',
                            'using',
                            'WordPress,',
                            'Laravel,',
                            'PHP,',
                            'JavaScript,',
                            'and',
                            'modern',
                            'frontend',
                            'technologies.',
                            'I',
                            'enjoy',
                            'translating',
                            'ideas',
                            'and',
                            'designs',
                            'into',
                            'polished,',
                            'functional',
                            'interfaces,',
                            'combining',
                            'clean',
                            'code,',
                            'thoughtful',
                            'usability,',
                            'and',
                            'a',
                            'sharp',
                            'eye',
                            'for',
                            'detail',
                            'to',
                            'create',
                            'digital',
                            'solutions',
                            'that',
                            'serve',
                            'both',
                            'users',
                            'and',
                            'business',
                            'goals.',
                        ];
                    @endphp
                    @foreach ($aboutWords as $word)
                        <span class="desc-text">{{ $word }}</span>
                    @endforeach
                </p>
            </div>

        </div>

    </div>

</div>
