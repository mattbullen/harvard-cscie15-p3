@extends("layouts.master")

@section("page-css")
    <link rel="stylesheet" href="{{ URL::asset('assets/css/index.css') }}">
@stop

@section("page-content")
    <div id="row-content" class="row">
        <h1 class="title">What is this app all about?</h1>
        <div id="description-wrapper">
            <p class="description">Developer's Best Friend is a Laravel 5-based web app designed to help developers with several tasks frequently encountered while building out a new site. In the menu above, you'll find links to four task generators:</p>
            <ul class="description">
                <li><a class="heading" href="/text" title="Go to the lorem ipsum text generator!">The <em>Lorem ipsum</em> text generator</a>: <em>Lorem ipsum</em> text is a traditional form of filler text made from Latin words and phrases. Use this generator when you need some quick text content to test your site's layout.</li>
                <li><a class="heading" href="/users" title="Go to the random users generator!">The random users generator</a>: This generator will create a list of up to twenty sample site users with customizable details for each, including e-mail addresses, phone numbers, and company names and descriptions.</li>
                <li><a class="heading" href="/unix" title="Go to the Unix permissions generator!">The Unix permissions generator</a>: Instead of guessing at which Unix permissions to use, this generator will find them for you in chmod-ready octal format.</li>
                <li><a class="heading" href="/password" title="Go to the XKCD password generator!">The XKCD-style high entropy password generator</a>: When you need a new password that's easy to remember, but hard to for others to guess, this generator will help you make one quickly.</li>
            </ul>
        </div>
    </div>
@stop

@section("page-js")
    <script src="{{ URL::asset('assets/js/index.js') }}"> </script>
@stop