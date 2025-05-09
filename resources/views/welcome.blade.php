<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lawrence's Portfolio</title>

    <link rel="icon" href="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/Lawrence%20Logo.ico" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="preconnect">
    <link href="https://fonts.cdnfonts.com/css/namdhinggo" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/manjari-2" rel="preconnect">
    <link href="https://fonts.cdnfonts.com/css/google-sans" rel="stylesheet">

    <!-- Styles / Scripts -->
    <link href="https://fonts.cdnfonts.com/css/timesnow" rel="stylpreconnectesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <!-- Add AOS styles -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/css/lightbox.min.css" rel="stylesheet">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZJMBH392TG"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-ZJMBH392TG');
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <div id="loader">
        <video autoplay loop muted playsinline>
            <source src="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/LoadingSpinning.mp4" type="video/mp4" />
        </video>
    </div>
    <div id="top" class="main-container">
        <div class="center-text">
            <div class="typedjs fade-out-container">
                <span id="intro"></span>


            </div>
            <div class="navigation-row fade-out-container">
                <li class="nav-text"><a href="#about"><span>About Me</span></a></li>
                <li class="nav-text"><a href="#gallery"><span>Gallery</span></a></li>
                <li class="nav-text"><a href="#contact"><span>Contact</span></a></li>
            </div>
            <div class="scroll-down fade-out-container">
                <a href="#contact" class="scroll-down-t scroll-down-a">Scroll to bottom</a>
                <span class="scroll-down-t scroll-down-arrow">&#8595</span>
            </div>
        </div>
    </div>

    <div id="about" class="about">
        <div class="info-holder">
            <div class="left-info-holder">
                <div class="left-info-holder-i">
                    <img src="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/headimg.png" alt="">
                </div>
            </div>
            <div class="right-info-holder">
                <p class="desc-group">
                    <span class="desc-text">With</span>
                    <span class="desc-text">experience</span>
                    <span class="desc-text">in</span>
                    <span class="desc-text">corporate</span>
                    <span class="desc-text">training</span>,
                    <span class="desc-text">I’ve</span>
                    <span class="desc-text">honed</span>
                    <span class="desc-text">my</span>
                    <span class="desc-text">ability</span>
                    <span class="desc-text">to</span>
                    <span class="desc-text">create</span>
                    <span class="desc-text">visually</span>
                    <span class="desc-text">captivating</span>
                    <span class="desc-text">and</span>
                    <span class="desc-text">effective</span>
                    <span class="desc-text">learning</span>
                    <span class="desc-text">materials</span>,
                    <span class="desc-text">including</span>
                    <span class="desc-text">presentations</span>,
                    <span class="desc-text">infographics</span>,
                    <span class="desc-text">and</span>
                    <span class="desc-text">quick-reference</span>
                    <span class="desc-text">guides</span>
                    <span class="desc-text">I</span>
                    <span class="desc-text">also</span>
                    <span class="desc-text">took</span>
                    <span class="desc-text">on</span>
                    <span class="desc-text">the</span>
                    <span class="desc-text">responsibility</span>
                    <span class="desc-text">of</span>
                    <span class="desc-text">editing</span>
                    <span class="desc-text">educational</span>
                    <span class="desc-text">videos,</span>
                    <span class="desc-text">ensuring</span>
                    <span class="desc-text">that</span>
                    <span class="desc-text">each</span>
                    <span class="desc-text">one</span>
                    <span class="desc-text">was</span>
                    <span class="desc-text">clear,</span>
                    <span class="desc-text">concise,</span>
                    <span class="desc-text">and</span>
                    <span class="desc-text">impactful</span>
                    <span class="desc-text">for</span>
                    <span class="desc-text">the</span>
                    <span class="desc-text">intended</span>
                    <span class="desc-text">audience.</span>
                    <span class="desc-text">In</span>
                    <span class="desc-text">my</span>
                    <span class="desc-text">role</span>
                    <span class="desc-text">as</span>
                    <span class="desc-text">a</span>
                    <span class="desc-text">Freelancer,</span>
                    <span class="desc-text">I</span>
                    <span class="desc-text">have</span>
                    <span class="desc-text">worked</span>
                    <span class="desc-text">extensively</span>
                    <span class="desc-text">with</span>
                    <span class="desc-text">tools</span>
                    <span class="desc-text">like</span>
                    <span class="desc-text">Canva,</span>
                    <span class="desc-text">Photoshop,</span>
                    <span class="desc-text">Adobe</span>
                    <span class="desc-text">Premiere,</span>
                    <span class="desc-text">and</span>
                    <span class="desc-text">Adobe</span>
                    <span class="desc-text">Illustrator</span>
                    <span class="desc-text">to</span>
                    <span class="desc-text">develop</span>
                    <span class="desc-text">creative</span>
                    <span class="desc-text">and</span>
                    <span class="desc-text">customized</span>
                    <span class="desc-text">content.</span>
                    <span class="desc-text">My</span>
                    <span class="desc-text">expertise</span>
                    <span class="desc-text">lies</span>
                    <span class="desc-text">in</span>
                    <span class="desc-text">graphic</span>
                    <span class="desc-text">design,</span>
                    <span class="desc-text">video</span>
                    <span class="desc-text">editing,</span>
                    <span class="desc-text">and</span>
                    <span class="desc-text">delivering</span>
                    <span class="desc-text">tailored</span>
                    <span class="desc-text">visual</span>
                    <span class="desc-text">solutions</span>
                    <span class="desc-text">that</span>
                    <span class="desc-text">meet</span>
                    <span class="desc-text">the</span>
                    <span class="desc-text">unique</span>
                    <span class="desc-text">needs</span>
                    <span class="desc-text">of</span>
                    <span class="desc-text">my</span>
                    <span class="desc-text">clients,</span>
                    <span class="desc-text">ensuring</span>
                    <span class="desc-text">their</span>
                    <span class="desc-text">message</span>
                    <span class="desc-text">resonates</span>
                    <span class="desc-text">through</span>
                    <span class="desc-text">engaging</span>
                    <span class="desc-text">and</span>
                    <span class="desc-text">professional</span>
                    <span class="desc-text">designs.</span>
                </p>

            </div>
        </div>
    </div>

    <div id="gallery" class="card-info-container">
        <div class="fade-in-viewc">
        <h1>GALLERY</h1>
        <div class="main-info-container" data-aos="fade-up">
            <!-- First Video -->
            <div class="fade-left-info-holder">
                <div class="fade-left-info-holder-i">
                    <h2>VESARO</h2>
                    <p>+ Catalog Template</p>
                    <p>+ Made in Canva</p>
                </div>
            </div>
            <div class="fade-right-info-holder">
                <div class="content-holder">
                    <div class="video-container">
                        <video autoplay loop muted playsinline>
                            <source src="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/catalogtemplate.mp4" type="video/mp4">
                        
                            </video>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Second Video -->
    <div class="fade-in-viewc">
        <div class="main-info-container" data-aos="fade-up">
            <div class="fade-left-info-holder">
                <div class="fade-left-info-holder-i">
                    <h2>SOCIAL MEDIA TEMPLATE</h2>
                    <p>+ Templates For Social Media</p>
                    <p>+ Made in Canva</p>
                </div>
            </div>
            <div class="fade-right-info-holder">
                <div class="content-holder">
                    <div class="video-container">
                        <video autoplay loop muted playsinline>
                            <source src="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/socialmedia.mp4" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Third Video -->
    <div class="fade-in-viewc">
        <div class="main-info-container" data-aos="fade-up">
            <div class="fade-left-info-holder">
                <div class="fade-left-info-holder-i">
                    <h2>WEBSITE DESIGN INFOGRAPHICS</h2>
                    <p>+ Infographics Template</p>
                    <p>+ Made in Canva</p>
                </div>
            </div>
            <div class="fade-right-info-holder">
                <div class="content-holder">
                    <div class="video-container">
                        <video autoplay loop muted playsinline>
                            <source src="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/websiteinfographics.mp4" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="fade-in-viewc" data-aos="fade-up">
            <div class="images-container">
                <div class="image-container-header">
                    <h1>GALLERY - VISUALS</h1>
                </div>

                <div class="main-image-container">
                    <h2 class="image-header1">Catalog Visuals</h2>
                    <div class="image-block" data-aos="fade-up">
                        <!-- 4-IMAGE BLOCK -->
                        <div class="image-block-container">
                            <!-- 1 IMAGE BLOCK -->
                            <div class="image-handler-block">
                                <!-- 1 IMAGE & TEXT WRAP BLOCK -->
                                <div class="image-handler" id="imageContainer">
                                    <a href="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/vesaro1.png" data-lightbox="portfolio"
                                        data-title="Template 1">
                                        <img src="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/vesaro1.png" alt="Vesaro 1">
                                    </a>
                                </div>
                                <div class="image-text">
                                    <h3>Front & Back</h3>
                                </div>
                            </div>

                            <div class="image-handler-block">
                                <!-- 1 IMAGE & TEXT WRAP BLOCK -->
                                <div class="image-handler" id="imageContainer">
                                    <a href="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/vesaro2.png" data-lightbox="portfolio"
                                        data-title="Template 2">
                                        <img src="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/vesaro2.png" alt="Vesaro 2">
                                    </a>
                                </div>
                                <div class="image-text">
                                    <h3>Inner Page 1</h3>
                                </div>
                            </div>

                            <div class="image-handler-block">
                                <!-- 1 IMAGE & TEXT WRAP BLOCK -->
                                <div class="image-handler" id="imageContainer">
                                    <a href="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/vesaro3.png" data-lightbox="portfolio"
                                        data-title="Template 3">
                                        <img src="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/vesaro3.png" alt="Vesaro 3">
                                    </a>
                                </div>
                                <div class="image-text">
                                    <h3>Inner Page 2</h3>
                                </div>
                            </div>

                            <div class="image-handler-block">
                                <!-- 1 IMAGE & TEXT WRAP BLOCK -->
                                <div class="image-handler" id="imageContainer">
                                    <a href="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/vesaro4.png" data-lightbox="portfolio"
                                        data-title="Template 4">
                                        <img src="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/vesaro4.png" alt="Vesaro 4">
                                    </a>
                                </div>
                                <div class="image-text">
                                    <h3>Inner Page 3</h3>
                                </div>
                            </div>
                        </div>

                    </div>
                    <h2 class="image-header2">Social Media Visuals</h2>
                    <div class="image-block" data-aos="fade-up">
                        <!-- 4-IMAGE BLOCK -->
                        <div class="image-block-container">
                            <!-- 1 IMAGE BLOCK -->
                            <div class="image-handler-block">
                                <!-- 1 IMAGE & TEXT WRAP BLOCK -->
                                <div class="image-handler" id="imageContainer">
                                    <a href="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/social1.png" data-lightbox="portfolio"
                                        data-title="Social 1">
                                        <img src="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/social1.png" alt="Social 1">
                                    </a>
                                </div>
                                <div class="image-text">
                                    <h3>Template 1</h3>
                                </div>
                            </div>

                            <div class="image-handler-block">
                                <!-- 1 IMAGE & TEXT WRAP BLOCK -->
                                <div class="image-handler" id="imageContainer">
                                    <a href="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/social2.png" data-lightbox="portfolio"
                                        data-title="Social 2">
                                        <img src="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/social2.png" alt="Social 2">
                                    </a>
                                </div>
                                <div class="image-text">
                                    <h3>Template 2</h3>
                                </div>
                            </div>

                            <div class="image-handler-block">
                                <!-- 1 IMAGE & TEXT WRAP BLOCK -->
                                <div class="image-handler" id="imageContainer">
                                    <a href="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/social3.png" data-lightbox="portfolio"
                                        data-title="Social 3">
                                        <img src="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/social3.png" alt="Social 3">
                                    </a>
                                </div>
                                <div class="image-text">
                                    <h3>Template 3</h3>
                                </div>
                            </div>

                            <div class="image-handler-block">
                                <!-- 1 IMAGE & TEXT WRAP BLOCK -->
                                <div class="image-handler" id="imageContainer">
                                    <a href="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/social4.png" data-lightbox="portfolio"
                                        data-title="Social 4">
                                        <img src="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/social4.png" alt="Social 4">
                                    </a>
                                </div>
                                <div class="image-text">
                                    <h3>Template 4</h3>
                                </div>
                            </div>

                            <div class="image-handler-block">
                                <!-- 1 IMAGE & TEXT WRAP BLOCK -->
                                <div class="image-handler" id="imageContainer">
                                    <a href="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/social5.png" data-lightbox="portfolio"
                                        data-title="Social 5">
                                        <img src="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/social5.png" alt="Social 5">
                                    </a>
                                </div>
                                <div class="image-text">
                                    <h3>Template 5</h3>
                                </div>
                            </div>

                            <div class="image-handler-block">
                                <!-- 1 IMAGE & TEXT WRAP BLOCK -->
                                <div class="image-handler" id="imageContainer">
                                    <a href="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/social6.png" data-lightbox="portfolio"
                                        data-title="Social 6">
                                        <img src="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/social6.png" alt="Social 6">
                                    </a>
                                </div>
                                <div class="image-text">
                                    <h3>Template 6</h3>
                                </div>
                            </div>

                            <div class="image-handler-block">
                                <!-- 1 IMAGE & TEXT WRAP BLOCK -->
                                <div class="image-handler" id="imageContainer">
                                    <a href="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/social7.png" data-lightbox="portfolio"
                                        data-title="Social 7">
                                        <img src="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/social7.png" alt="Social 7">
                                    </a>
                                </div>
                                <div class="image-text">
                                    <h3>Template 7</h3>
                                </div>
                            </div>

                            <div class="image-handler-block">
                                <!-- 1 IMAGE & TEXT WRAP BLOCK -->
                                <div class="image-handler" id="imageContainer">
                                    <a href="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/social8.png" data-lightbox="portfolio"
                                        data-title="Social 8">
                                        <img src="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/social8.png" alt="Social 8">
                                    </a>
                                </div>
                                <div class="image-text">
                                    <h3>Template 8</h3>
                                </div>
                            </div>

                            <div class="image-handler-block">
                                <!-- 1 IMAGE & TEXT WRAP BLOCK -->
                                <div class="image-handler" id="imageContainer">
                                    <a href="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/social9.png" data-lightbox="portfolio"
                                        data-title="Social 9">
                                        <img src="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/social9.png" alt="Social 9">
                                    </a>
                                </div>
                                <div class="image-text">
                                    <h3>Template 9</h3>
                                </div>
                            </div>
                        </div>

                    </div>
                    <h2 class="image-header3">Web Design Visuals</h2>
                    <div class="image-block" data-aos="fade-up">
                        <!-- 4-IMAGE BLOCK -->
                        <div class="image-block-container">
                            <!-- 1 IMAGE BLOCK -->
                            <div class="image-handler-block">
                                <!-- 1 IMAGE & TEXT WRAP BLOCK -->
                                <div class="image-handler" id="imageContainer">
                                    <a href="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/webdesign1.png" data-lightbox="portfolio"
                                        data-title="WebDesign 1">
                                        <img src="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/webdesign1.png" alt="WebDesign 1">
                                    </a>
                                </div>
                                <div class="image-text">
                                    <h3>Template 1</h3>
                                </div>
                            </div>

                            <div class="image-handler-block">
                                <!-- 1 IMAGE & TEXT WRAP BLOCK -->
                                <div class="image-handler" id="imageContainer">
                                    <a href="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/webdesign2.png" data-lightbox="portfolio"
                                        data-title="WebDesign 2">
                                        <img src="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/webdesign2.png" alt="Web Design 2">
                                    </a>
                                </div>
                                <div class="image-text">
                                    <h3>Template 2</h3>
                                </div>
                            </div>

                            <div class="image-handler-block">
                                <!-- 1 IMAGE & TEXT WRAP BLOCK -->
                                <div class="image-handler" id="imageContainer">
                                    <a href="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/webdesign3.png" data-lightbox="portfolio"
                                        data-title="WebDesign 3">
                                        <img src="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/webdesign3.png" alt="Web Design 3">
                                    </a>
                                </div>
                                <div class="image-text">
                                    <h3>Template 3</h3>
                                </div>
                            </div>

                            <div class="image-handler-block">
                                <!-- 1 IMAGE & TEXT WRAP BLOCK -->
                                <div class="image-handler" id="imageContainer">
                                    <a href="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/webdesign4.png" data-lightbox="portfolio"
                                        data-title="WebDesign 4">
                                        <img src="https://lawrencebucket01.s3.ap-southeast-2.amazonaws.com/webdesign4.png" alt="Web Design 4">
                                    </a>
                                </div>
                                <div class="image-text">
                                    <h3>Template 4</h3>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Add Lightbox2 JS -->


            </div>
        </div>
    </div>

    <div id="contact" class="card-info-container contact-card">
        <div class="fade-in-viewc">
            <h1 class="contact-tag">Let's Work Together</h1>
            <div class="main-info-container">
                <p class="contact-links-header">Have an idea, a vision, or a blank canvas? I’d love to hear from you.
                    Whether it's a brand redesign or your next big startup, let's make it happen.</p>
            </div>
            <div class="main-info-container">

                <div class="fade-left-info-holder">

                    <div class="list-item">
                        <li class="list-item-link">
                            <h3>Email: </h3>
                            <a href="mailto:lawrencetendenilla@outlook.com"
                                target="_blank">lawrencetendenilla83@gmail.com</a>
                        </li>
                        <li class="list-item-link">
                            <h3>LinkedIn: </h3>
                            <a href="https://linkedin.com/in/lawrence-t-b73006261"
                                target="_blank">@LawrenceTendenilla</a>
                        </li>
                        <li class="list-item-link">
                            <h3>WhatsApp: </h3>
                            <a href="https://wa.me/+639623424669" target="_blank">@lawrencetendenilla</a>
                        </li>
                    </div>
                </div>

                <div class="fade-right-info-holder">
                    <div class="contact-us-form">
                        <div class="form-container">
                            <form id="contactForm" method="POST" action="{{ route('contact.us.store') }}"
                                class="main-form">
                                @csrf
                                <div class="group-input">
                                    <div class="group-input">
                                        <div class="name-input">
                                            <label for="name">Full Name</label>
                                            <input type="text" name="name" class="form-control full-name"
                                                placeholder="Name" value="{{ old('name') }}">
                                            <span id="nameError" class="text-danger"></span>

                                            @if ($errors->has('name'))

                                            <span class="text-danger">{{ $errors->first('name') }}</span>

                                            @endif
                                        </div>
                                    </div>
                                    <div class="group-input">
                                        <div class="name-input">
                                            <label for="email">Email address</label>

                                            <input type="text" name="email"
                                                class="form-control email-address  placeholder=" Email"
                                                value="{{ old('email') }}">
                                            <span id="emailError" class="text-danger"></span>

                                            @if ($errors->has('email'))

                                            <span class="text-danger">{{ $errors->first('email') }}</span>

                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="message-input">
                                    <label for="message">Your Message</label>

                                    <textarea name="message" rows="3"
                                        class="form-control">{{ old('message') }}</textarea>
                                    <span id="messageError" class="text-danger"></span>

                                    @if ($errors->has('message'))

                                    <span class="text-danger">{{ $errors->first('message') }}</span>

                                    @endif
                                </div>

                                <div class="button-container">
                                    <input type="submit" name="submit" value="Send Message" id="submitButton">
                                </div>
                                <div id="responseMessage" class="success-message"></div>
                        </div>

                        </form>



                    </div>
                </div>
            </div>
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
        </div>
    </div>
    </div>
    <div class="footer-card">
        <p>Crafted by Lawrence with pixels, passion and a midnight soundtrack</p>
    </div>

    <button id="backToTopBtn" title="Go to top">
        <i class="fa-solid fa-arrow-up"></i>
    </button>

    <!-- External libraries you must keep in HTML -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.0/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/ScrollTrigger.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/ScrollToPlugin.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/js/lightbox.min.js"></script>
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>