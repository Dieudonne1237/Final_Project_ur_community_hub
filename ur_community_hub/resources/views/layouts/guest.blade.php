<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>UR Community Hub - Connecting and Empowering University of Rwanda Students</title>
    <!-- Basic Meta Tags -->
    <meta property="og:title" content="UR Community Hub - Connecting and Empowering University of Rwanda Students">
    <meta property="og:description"
        content="UR Community Hub is a platform designed to connect and empower students at the University of Rwanda through networking, collaboration, and shared opportunities.">
    <meta property="og:image" content="{{ asset('assets/images/og-image.jpg') }}">
    <meta property="og:url" content="https://www.urcommunityhub.com">
    <meta property="og:type" content="website">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="UR Community Hub - Connecting and Empowering University of Rwanda Students">
    <meta name="twitter:description"
        content="UR Community Hub is a platform designed to connect and empower students at the University of Rwanda through networking, collaboration, and shared opportunities.">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/jpg" href="{{ asset('assets/images/favicon.png') }}">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/jpg" href="{{ asset('assets/images/favicon.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assets/build/assets/app-DspuE8pW.js') }}">
    <link rel="stylesheet" href="{{ asset('assets/build/assets/app-DudOFP__.css') }}">

    <style>
        .btn-loading {
            position: relative !important;
            cursor: wait !important;
            pointer-events: none !important;
        }

        .btn-loading .btn-text {
            visibility: hidden !important;
        }

        .btn-loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 20px;
            height: 20px;
            border: 3px solid #fff;
            border-top: 3px solid #061077;
            border-radius: 50%;
            transform: translate(-50%, -50%);
            animation: spin 1s linear infinite;
            z-index: 10;
        }

        @keyframes spin {
            0% {
                transform: translate(-50%, -50%) rotate(0deg);
            }

            100% {
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }

        .floating-chat-btn {
            transition: transform 0.3s ease;
        }

        .floating-chat-btn:hover {
            transform: scale(1.1);
        }

        @media (max-width: 576px) {
            .modal-dialog-bottom-right {
                width: calc(100% - 40px);
                max-width: 300px;
            }
        }

        .nav-link:focus:not(:focus-visible) {
            outline: none;
        }

        .nav-link:focus-visible {
            outline: 2px solid blue;
        }
    </style>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('form');

            forms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    const submitButton = this.querySelector('button[type="submit"]');

                    if (submitButton) {
                        if (submitButton.classList.contains('btn-loading')) {
                            e.preventDefault();
                            return;
                        }
                        if (!submitButton.querySelector('.btn-text')) {
                            const buttonText = submitButton.innerHTML;
                            submitButton.innerHTML = `<span class="btn-text">${buttonText}</span>`;
                        }
                        submitButton.classList.add('btn-loading');
                        submitButton.disabled = true;
                    }
                });
            });
            window.addEventListener('pageshow', function(event) {
                const buttons = document.querySelectorAll('.btn-loading');
                buttons.forEach(button => {
                    button.classList.remove('btn-loading');
                    button.disabled = false;
                    const btnText = button.querySelector('.btn-text');
                    if (btnText) {
                        button.innerHTML = btnText.textContent;
                    }
                });
            });
        });
    </script>

    <!-- Styles -->
    @livewireStyles
</head>

<body>
    <div class="font-sans antialiased text-gray-900">
        {{ $slot }}
    </div>

    @livewireScripts
</body>

</html>
