<div id="about" class="main-container about">
    <div class="center-content">
        <div class="info-holder">
            <div class="left-info-holder">
                <div class="left-info-holder-i">
                    <img src="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/headimg.png" alt="">
                </div>
            </div>
            <div class="right-info-holder">
                <p class="desc-group">
                    @php
                        $aboutWords = [
                            'With',
                            'experience',
                            'in',
                            'corporate',
                            'training,',
                            'I’ve',
                            'honed',
                            'my',
                            'ability',
                            'to',
                            'create',
                            'visually',
                            'captivating',
                            'and',
                            'effective',
                            'learning',
                            'materials,',
                            'including',
                            'presentations,',
                            'infographics,',
                            'and',
                            'quick-reference',
                            'guides.',
                            'I',
                            'also',
                            'took',
                            'on',
                            'the',
                            'responsibility',
                            'of',
                            'editing',
                            'educational',
                            'videos,',
                            'ensuring',
                            'that',
                            'each',
                            'one',
                            'was',
                            'clear,',
                            'concise,',
                            'and',
                            'impactful',
                            'for',
                            'the',
                            'intended',
                            'audience.',
                            'In',
                            'my',
                            'role',
                            'as',
                            'a',
                            'Freelancer,',
                            'I',
                            'have',
                            'worked',
                            'extensively',
                            'with',
                            'tools',
                            'like',
                            'Canva,',
                            'Photoshop,',
                            'Adobe',
                            'Premiere,',
                            'and',
                            'Adobe',
                            'Illustrator',
                            'to',
                            'develop',
                            'creative',
                            'and',
                            'customized',
                            'content.',
                            'My',
                            'expertise',
                            'lies',
                            'in',
                            'graphic',
                            'design,',
                            'video',
                            'editing,',
                            'and',
                            'delivering',
                            'tailored',
                            'visual',
                            'solutions',
                            'that',
                            'meet',
                            'the',
                            'unique',
                            'needs',
                            'of',
                            'my',
                            'clients,',
                            'ensuring',
                            'their',
                            'message',
                            'resonates',
                            'through',
                            'engaging',
                            'and',
                            'professional',
                            'designs.',
                        ];
                    @endphp
                    @foreach ($aboutWords as $word)
                        <span class="desc-text">{{ $word }}</span>
                    @endforeach
                </p>
                {{-- TECH STACK SECTION --}}

            </div>

        </div>
        {{-- TECH STACK ICONS --}}
        <div class="tech-stack-section" data-aos="fade-up">
            <h2 class="tech-stack-header">Tech Stack</h2>
            <div class="tech-icons">
                {{-- Frontend --}}
                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg" alt="HTML5"
                    title="HTML5" data-aos="fade-up">
                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg" alt="CSS3"
                    title="CSS3" data-aos="fade-up">
                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg"
                    alt="JavaScript" title="JavaScript" data-aos="fade-up">
                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/jquery/jquery-original.svg" alt="jQuery"
                    title="jQuery" data-aos="fade-up">
                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg"
                    alt="Bootstrap" title="Bootstrap" data-aos="fade-up">

                {{-- Backend --}}
                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" alt="PHP"
                    title="PHP" data-aos="fade-up">
                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-original.svg"
                    alt="Laravel" title="Laravel" data-aos="fade-up">


                {{-- Database --}}
                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg" alt="MySQL"
                    title="MySQL" data-aos="fade-up">

                {{-- Tools --}}
                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/photoshop/photoshop-plain.svg"
                    alt="Photoshop" title="Photoshop" data-aos="fade-up">
                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/illustrator/illustrator-plain.svg"
                    alt="Illustrator" title="Illustrator" data-aos="fade-up">
                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/premierepro/premierepro-plain.svg"
                    alt="Premiere Pro" title="Premiere Pro" data-aos="fade-up">
                <img src="https://img.icons8.com/color/48/canva.png" alt="Canva" title="Canva" data-aos="fade-up">
            </div>
        </div>
    </div>

</div>
