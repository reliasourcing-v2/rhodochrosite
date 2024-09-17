<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scrollbar-style overflow-x-hidden">
    <head>
        <meta name="base" content="{{ url('/') }}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta property="og:type" content="website">
        <meta name="twitter:card" content="summary"></meta>

        <title>{{ $title ?? '' ? $title : config('app.name', 'Laravel') }}</title>

        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/favicon/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('/favicon/android-chrome-512x512.png') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('/favicon/android-chrome-192x192.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/favicon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/favicon/favicon-16x16.png') }}">
        <link rel="canonical" href="{{ Request::url() }}" />
        <link rel="manifest" href="{{ asset('/favicon/site.webmanifest') }}">
        <meta name="msapplication-TileColor" content="#FFFFFF">
        <meta name="theme-color" content="#FFFFFF">

        <meta itemprop="image" content="{{ $og_image_path ?? '' }}">
        <meta name="twitter:image" content="{{ $og_image_path ?? '' }}">
        <meta property="og:image" content="{{ $og_image_path ?? '' }}">
        <meta property="og:title" content="{!! $title ?? '' !!}">
        <meta name="description" content="{!! $description ?? '' !!}">
        <meta property="og:description" content="{!! $description ?? '' !!}">
        <meta name="twitter:description" content="{!! $description ?? '' !!}">
        <meta name="keywords" content="{!! $keywords ?? '' !!}">

        @routes

        <!-- Styles & Scripts -->
        @vite(['resources/scss/user.scss', 'resources/ts/app.ts'])
    </head>
    <body class="font-sans antialiased lg:overflow-x-visible overflow-x-hidden">
        @inertia

        <!-- Google Analytics Code Snippet --> 
        @if(config('app.google_analytics'))
        <!-- Google Tag Manager -->
        <script defer src="https://www.googletagmanager.com/gtag/js?id={{ $api_keys->content['section1_googleanalytics'] }}"></script>
        <script defer>

            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '{{ $api_keys->content['section1_googleanalytics'] }}');
            
        </script>
        <!-- End Google Tag Manager -->
        @endif
        <!-- End of Google Analytics Code Snippet --> 

        <!-- Tawk.to Code Snippet --> 
        @if(config('app.tawkto'))
        <!--Start of Tawk.to Script-->
        <script defer type="text/javascript">
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/{{ $api_keys->content['section2_tawkto_link'] }}/default';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
            })();
        </script>
        <!--End of Tawk.to Script-->
        @endif
        <!-- End of Tawk.to Code Snippet --> 

        <!-- Facebook/Messenger Chat Code Snippet --> 
        @if(config('app.facebook_chat'))

        <div id="fb-root"></div>
        <div id="fb-customer-chat" class="fb-customerchat"></div>

        <script defer>
            var chatbox = document.getElementById('fb-customer-chat');
            chatbox.setAttribute("page_id", "{{ $api_keys->content['section3_facebook_page_id'] }}");
            chatbox.setAttribute("attribution", "biz_inbox");
        </script>

        <script defer>
            window.fbAsyncInit = function() {
                FB.init({
                    xfbml: true,
                    version : 'v13.0'
                });
            };

            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
        @endif
        <!-- End of Facebook Chat Code Snippet --> 
    </body>
</html>
