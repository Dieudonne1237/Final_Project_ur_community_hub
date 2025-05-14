<!-- Contact & FAQ Section -->
<div class="section faq" id="contact-us">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 col-md-8 col-lg-8 text-center">
                <div class="section-heading-wrapper">
                    <h2 class="mb-4 text-center">Connect with UR Community Hub</h2>
                </div>
            </div>
        </div>

        <div class="row align-items-center justify-content-center">
            <!-- FAQ Section -->
            <div class="col-md-6 col-lg-6">
                <div class="accordion" id="accordionExample">
                    <div class="section-heading-wrapper">
                        <h2 class="section-small-heading " style="color: #0056b3">Frequently Asked Questions</h2>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="h1">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#c1" aria-expanded="false" aria-controls="c1">
                                How can I join UR Community Hub?
                            </button>
                        </h2>
                        <div id="c1" class="accordion-collapse collapse" aria-labelledby="h1"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Joining is simple! Register as Community Leader or Community Staff, complete your profile, and
                                    start engaging with the community.</p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="h2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#c2" aria-expanded="false" aria-controls="c2">
                                What activities are available in the hub?
                            </button>
                        </h2>
                        <div id="c2" class="accordion-collapse collapse" aria-labelledby="h2"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>We host community events like mentorship programs, project collaborations, Entertainment events, Worship Events and
                                    leadership training. Stay updated via our events page!</p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="h3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#c3" aria-expanded="false" aria-controls="c3">
                                How do I contact community leaders?
                            </button>
                        </h2>
                        <div id="c3" class="accordion-collapse collapse" aria-labelledby="h3"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>You can reach out via the contact form below or connect directly with community
                                    leaders through their profiles.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-md-6 col-lg-6">
                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="contact-form-group">
                                <label class="contact-form-label">Your Name <span>*</span></label>
                                <input class="contact-form-input" type="text" name="name" placeholder="Enter your name" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="error-msg-contact"><p>{{ $message }}</p></div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="contact-form-group">
                                <label class="contact-form-label">Your E-mail <span>*</span></label>
                                <input class="contact-form-input" type="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="error-msg-contact"><p>{{ $message }}</p></div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="contact-form-group">
                                <label class="contact-form-label">Message <span>*</span></label>
                                <textarea class="contact-form-input" name="message" rows="4" placeholder="Write your message" required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="error-msg-contact"><p>{{ $message }}</p></div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="theme-btn btn-main">Send Your Message</button>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>

<!-- Custom Styling -->
<style>
    .faq {
        background: #f9f9f9;
        padding: 50px 0;
    }

    .section-heading-wrapper h4 {
        font-size: 1.2rem;
        font-weight: bold;
        color: #444;
        text-transform: uppercase;
    }

    .section-main-heading {
        font-size: 2rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 20px;
    }

    .accordion-item {
        border: none;
        margin-bottom: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .accordion-button {
        font-size: 1.1rem;
        font-weight: bold;
        background: #fff;
        color: #333;
    }

    .contact-form-group {
        margin-bottom: 15px;
    }

    .contact-form-label {
        font-weight: bold;
        color: #333;
    }

    .contact-form-input {
        width: 100%;
        padding: 10px;
        border-radius: 8px;
        border: 1px solid #ccc;
        font-size: 1rem;
    }

    .theme-btn {
        background: #007bff;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 1rem;
        transition: 0.3s ease-in-out;
    }

    .theme-btn:hover {
        background: #0056b3;
    }
</style>
