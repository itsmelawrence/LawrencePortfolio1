<div id="contact" class="card-info-container contact-card">
    <div class="fade-in-viewc">
        <h1 class="contact-tag">Let's Work Together</h1>
        <div class="main-info-container">
            <p class="contact-links-header">
                Have an idea, a vision, or a blank canvas? I’d love to hear from you.
                Whether it's a brand redesign or your next big startup, let's make it happen.
            </p>
        </div>

        <div class="main-info-container">
            <div class="fade-left-info-holder">
                <div class="list-item">
                    <li class="list-item-link">
                        <h3>Email:</h3>
                        <a href="mailto:lawrencetendenilla@outlook.com" target="_blank">lawrencetendenilla83@gmail.com</a>
                    </li>
                    <li class="list-item-link">
                        <h3>LinkedIn:</h3>
                        <a href="https://linkedin.com/in/lawrence-t-b73006261" target="_blank">@LawrenceTendenilla</a>
                    </li>
                    <li class="list-item-link">
                        <h3>WhatsApp:</h3>
                        <a href="https://wa.me/+639623424669" target="_blank">@lawrencetendenilla</a>
                    </li>
                </div>
            </div>

            <div class="fade-right-info-holder">
                <div class="contact-us-form">
                    <div class="form-container">
                        <form id="contactForm" method="POST" action="{{ route('contact.us.store') }}" class="main-form">
                            @csrf

                            <div class="group-input">
                                <div class="name-input">
                                    <label for="name">Full Name</label>
                                    <input type="text" name="name" class="form-control full-name" placeholder="Name" value="{{ old('name') }}">
                                    <span id="nameError" class="text-danger"></span>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="name-input">
                                    <label for="email">Email address</label>
                                    <input type="email" name="email" class="form-control email-address" placeholder="Email" value="{{ old('email') }}">
                                    <span id="emailError" class="text-danger"></span>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="message-input">
                                <label for="message">Your Message</label>
                                <textarea name="message" rows="3" class="form-control">{{ old('message') }}</textarea>
                                <span id="messageError" class="text-danger"></span>
                                @error('message')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- ✅ Cloudflare Turnstile Widget --}}
                            <div class="cf-turnstile" 
                                 data-sitekey="{{ env('CLOUDFLARE_TURNSTILE_SITE_KEY') }}" 
                                 data-theme="light"
                                 style="margin: 0 1rem;">
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
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
    </div>
</div>

{{-- ✅ Include the Turnstile JS API --}}
<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
