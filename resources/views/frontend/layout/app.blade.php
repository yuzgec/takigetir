<!DOCTYPE html>
<html lang="tr">
    <head>
        {!! SEOMeta::generate() !!}
        {!! OpenGraph::generate() !!}
        {!! Twitter::generate() !!}
        @include('frontend.layout.css')
        @yield('customCSS')
        <meta name="facebook-domain-verification" content="044gbsiu1s9t27pj9ien80wrr2rpyd" />
    </head>
    <body>
        @include('frontend.layout.header')

            <main id="content" role="main">
                @yield('content')
            </main>

        @include('frontend.layout.footer')
        @include('frontend.layout.js')
        @yield('customJS')

    </body>
</html>
