<!DOCTYPE html>

<html id="html">

    <head>
   
        <!-- Meta-->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=3">
        <meta name="description" content="CSCI E-15 Project 3 - Developer's Best Friend">
        <meta name="author" content="Matthew Bullen">
        <meta name="csrf-token" content="<?php echo csrf_token() ?>" />
        
        <!-- Title & Favicon-->
        <title>CSCI E-15 Project 3</title>
        <link id="favicon" rel="shortcut icon" href="{{ URL::asset('assets/img/favicon.png') }}" type="image/png">
        
        <!-- CSS-->
        <link rel="stylesheet" href="{{ URL::asset('assets/css/normalize.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/css/foundation.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/css/base.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/css/text.css') }}">
      
    </head>
   
    <body id="body">

        <div id="row-header" class="row">
            <div class="large-12 columns">
                <h2 class="row-header-title">Developer's Best Friend</h2>
            </div>
        </div>
        
        <div id="row-menu" class="row">
            <div class="large-12 columns">
                
                <div id="button-home" class="left button-link">
                    <a class="button-href" href="/">Home</a>
                </div>
                
                <div id="button-text" class="left button-link">
                    <a class="button-href button-active" href="/text">Lorem Ipsum Generator</a>
                </div>
                
                <div id="button-users" class="left button-link">
                    <a class="button-href" href="/users">Random User Generator</a>
                </div>
                
                <div id="button-password" class="left button-link">
                    <a class="button-href" href="/password">XKCD Password Generator</a>
                </div>
                
            </div>
        </div>
        
        <div id="row-content" class="row">
            
            <div id="wrapper-input">
            
                <div id="wrapper-slider">
                    <div id="range-slider-paragraphs" class="range-slider" data-slider data-options="initial: 3; start: 1; end: 20; step: 1;">
                        <span id="range-button-paragraphs" class="range-slider-handle element-highlight" role="slider" tabindex="0" aria-valuemin="1" aria-valuemax="20" aria-valuenow="3"> </span>
                        <span class="range-slider-active-segment"> </span>
                        <input id="quantity-paragraphs" name="quantity-paragraphs" type="hidden">
                    </div>
                </div>
                
                <div class="button-link element-highlight button-post">
                    <span id="button-post" class="button-href">Get Lorem Ipsum Text!</span>
                </div>

            </div>
            
            <div id="wrapper-content">
                <div id="content" class="nano">
                    <div id="result" class="nano-content">
                        <div id="description">
                            <h3 id="description-title">How to use the <em>Lorem Ipsum</em> Generator</h3>
                            <div id="description-content">
                                <p class="description-content-paragraph">It's very easy . . . use the slider above to select the number of paragraphs to generate. The generator defaults to three paragraphs, but you can select up to twenty paragraphs.</p>
                                <p class="description-content-paragraph">Then click "Get Lorem Ipsum Text!" and the new text content will be displayed in this panel. The text is left-click selectable and will scroll for easier copy/paste.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
        </div>
        
        <!-- JS-->
        <script src="{{ URL::asset('assets/js/jquery.2.1.4.min.js') }}"> </script>
        <script src="{{ URL::asset('assets/js/foundation.min.js') }}"> </script>
        <script src="{{ URL::asset('assets/js/jquery.nanoscroller.min.js') }}"> </script>
        <script src="{{ URL::asset('assets/js/text.js') }}"> </script>
        
    </body>
   
</html>