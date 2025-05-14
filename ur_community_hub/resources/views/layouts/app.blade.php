<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>UR Community Hub - Connecting and Empowering University of Rwanda Students</title>
    <!-- Basic Meta Tags -->
    <meta property="og:title" content="UR Community Hub - Connecting and Empowering University of Rwanda Students">
    <meta property="og:description" content="UR Community Hub is a platform designed to connect and empower students at the University of Rwanda through networking, collaboration, and shared opportunities.">
    <meta property="og:image" content="{{ asset('assets/images/og-image.jpg') }}">
    <meta property="og:url" content="https://www.urcommunityhub.com">
    <meta property="og:type" content="website">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="UR Community Hub - Connecting and Empowering University of Rwanda Students">
    <meta name="twitter:description" content="UR Community Hub is a platform designed to connect and empower students at the University of Rwanda through networking, collaboration, and shared opportunities.">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/jpg" href="{{ asset('assets/images/favicon.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assets/build/assets/app-DspuE8pW.js') }}">
    <link rel="stylesheet" href="{{ asset('assets/build/assets/app-DudOFP__.css') }}">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

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

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')
        @include('layouts.auth.aside-menu')

        <!-- Page Content -->
        <main>
            <div class="p-4 sm:ml-64">
                <div class="border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
                    <!-- Page Heading -->
                    @if (isset($header))
                        <header class="bg-white shadow">
                            <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                                {{ $header }}
                            </div>
                        </header>
                    @endif

                    {{ $slot }}
                </div>
            </div>

        </main>
    </div>

    @stack('modals')

    @livewireScripts
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>

    <script src="{{ asset('assets/tinymce/js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        tinymce.init({
            selector: '#content',
            plugins: [
                'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link',
                'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
                'checklist', 'mediaembed', 'casechange', 'export', 'formatpainter', 'pageembed',
                'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste',
                'advtable', 'advcode', 'editimage', 'advtemplate', 'ai', 'mentions', 'tinycomments',
                'tableofcontents', 'footnotes', 'mergetags', 'autocorrect',
                'typography', 'inlinecss', 'markdown', 'textcolor',
                'colorpicker'
            ],
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat | forecolor backcolor', // Added forecolor and backcolor
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [{
                    value: 'First.Name',
                    title: 'First Name'
                },
                {
                    value: 'Email',
                    title: 'Email'
                },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject(
                'See docs to implement AI Assistant')),
            images_upload_url: '/your-image-upload-endpoint',
            images_upload_base_path: '/some/basepath',
            images_upload_credentials: true,
            automatic_uploads: true,
            file_picker_types: 'file image media',
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                if (meta.filetype == 'image') {
                    input.setAttribute('accept', 'image/*');
                }
                if (meta.filetype == 'media') {
                    input.setAttribute('accept', 'video/*');
                }

                input.onchange = function() {
                    var file = this.files[0];
                    var reader = new FileReader();
                    reader.onload = function() {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), {
                            title: file.name
                        });
                    };
                    reader.readAsDataURL(file);
                };

                input.click();
            },
            setup: function(editor) {
                editor.on('change', function() {
                    tinymce.triggerSave();
                });
            }
        });
        const form = document.querySelector('form');
        form.addEventListener('submit', function(e) {
            tinymce.triggerSave();
        });
    });
</script>
    <script>
        document.addEventListener('livewire:load', function() {
            if (typeof $ !== 'undefined' && $.fn.select2) {
                $('.select2').select2();
            }
            Livewire.hook('message.processed', () => {
                if (typeof $ !== 'undefined' && $.fn.select2) {
                    $('.select2').select2();
                }
            });
        });

        document.addEventListener('livewire:init', () => {
            // Success message listener
            Livewire.on('show-success-message', (event) => {
                const successMessage = document.createElement('div');
                successMessage.id = 'success-message';
                successMessage.className =
                    'fixed top-4 right-4 p-4 text-green-700 bg-green-100 border border-green-400 rounded shadow-lg alert alert-success z-50';
                successMessage.style.right = '16px'; // Ensure right alignment
                successMessage.innerHTML = `${event.message}
            <div class="absolute bottom-0 left-0 h-1 bg-green-400 time-indicator"></div>`;
                document.body.appendChild(successMessage);
                setTimeout(() => {
                    successMessage.remove();
                }, 10000);
            });

            // Error message listener
            Livewire.on('show-error-message', (event) => {
                const errorMessage = document.createElement('div');
                errorMessage.id = 'error-message';
                errorMessage.className =
                    'fixed top-4 right-4 p-4 text-red-700 bg-red-100 border border-red-400 rounded shadow-lg alert alert-danger z-50';
                errorMessage.style.right = '16px'; // Ensure right alignment
                errorMessage.innerHTML = `${event.message}
            <div class="absolute bottom-0 left-0 h-1 bg-red-400 time-indicator"></div>`;
                document.body.appendChild(errorMessage);
                setTimeout(() => {
                    errorMessage.remove();
                }, 10000);
            });
        });
    </script>
</body>

</html>
