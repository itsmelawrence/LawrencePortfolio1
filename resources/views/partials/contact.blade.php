<div id="contact" class="main-container contact-card">
    <div class="fade-in-viewc">
        @include('partials.section-header', [
            'eyebrow' => 'Start a conversation',
            'title' => 'Connect',
            'count' => '03',
            'label' => 'channels',
            'headingId' => 'contact-heading'
        ])

        <div class="contact-layout">
            <div class="contact-aside" data-aos="fade-right">
                <p class="contact-intro">
                    Have an idea, a vision, or a blank canvas? I’d love to hear from you. Whether it's a brand redesign or your next big startup, let's make it happen.
                </p>

                <ul class="contact-channels" aria-label="Contact channels">
                    <li class="contact-channel">
                        <a href="mailto:lawrencetendenilla83@gmail.com">
                            <span class="contact-channel__icon"><i class="fa-regular fa-envelope" aria-hidden="true"></i></span>
                            <span class="contact-channel__content">
                                <span class="contact-channel__label">Email</span>
                                <span class="contact-channel__value">lawrencetendenilla83@gmail.com</span>
                            </span>
                            <span class="contact-channel__arrow" aria-hidden="true">&#8599;</span>
                        </a>
                    </li>
                    <li class="contact-channel">
                        <a href="https://linkedin.com/in/lawrence-t-b73006261" target="_blank" rel="noopener noreferrer">
                            <span class="contact-channel__icon"><i class="fa-brands fa-linkedin-in" aria-hidden="true"></i></span>
                            <span class="contact-channel__content">
                                <span class="contact-channel__label">LinkedIn</span>
                                <span class="contact-channel__value">@LawrenceTendenilla</span>
                            </span>
                            <span class="contact-channel__arrow" aria-hidden="true">&#8599;</span>
                        </a>
                    </li>
                    <li class="contact-channel">
                        <a href="https://wa.me/639623424669" target="_blank" rel="noopener noreferrer">
                            <span class="contact-channel__icon"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i></span>
                            <span class="contact-channel__content">
                                <span class="contact-channel__label">WhatsApp</span>
                                <span class="contact-channel__value">@lawrencetendenilla</span>
                            </span>
                            <span class="contact-channel__arrow" aria-hidden="true">&#8599;</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="contact-form-panel" data-aos="fade-left">
                <div class="contact-form-panel__header">
                    <p>Send a message</p>
                    <span>All fields required</span>
                </div>

                <form id="contactForm" method="POST" action="{{ route('contact.us.store') }}" class="main-form">
                    @csrf

                    <div class="group-input">
                        <div class="group-input-child">
                            <label for="name">Full Name</label>
                            <input id="name" type="text" name="name" class="form-control full-name" placeholder="Your name"
                                value="{{ old('name') }}" autocomplete="name" required>
                            <span id="nameError" class="text-danger"></span>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="group-input-child">
                            <label for="email">Email address</label>
                            <input id="email" type="email" name="email" class="form-control email-address" placeholder="you@example.com"
                                value="{{ old('email') }}" autocomplete="email" required>
                            <span id="emailError" class="text-danger"></span>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="group-input-child">
                            <label for="message">Your Message</label>
                            <textarea id="message" name="message" rows="4" class="form-control" placeholder="Tell me what you have in mind" required>{{ old('message') }}</textarea>
                            <span id="messageError" class="text-danger"></span>
                            @error('message')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="cf-turnstile" data-sitekey="0x4AAAAAAB5a-O9PNBLq5lzC" data-theme="auto" data-size="flexible">
                    </div>

                    @if ($errors->has('cf-turnstile-response'))
                        <span class="text-danger">{{ $errors->first('cf-turnstile-response') }}</span>
                    @endif

                    <div class="button-container">
                        <input type="submit" name="submit" value="Send Message" id="submitButton">
                    </div>

                    <div id="responseMessage" class="success-message"></div>
                </form>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
    </div>
</div>

<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
