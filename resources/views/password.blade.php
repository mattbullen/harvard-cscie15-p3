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
        <link rel="stylesheet" href="{{ URL::asset('assets/css/password.css') }}">
      
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
                    <a class="button-href" href="/text">Lorem Ipsum Generator</a>
                </div>
                
                <div id="button-users" class="left button-link">
                    <a class="button-href" href="/users">Random User Generator</a>
                </div>
                
                <div id="button-password" class="left button-link">
                    <a class="button-href button-active" href="/password">XKCD Password Generator</a>
                </div>
                
            </div>
        </div>
        
        <div id="row-content" class="row">
        
            <div id="left" class="large-4 columns">
            
                <button id="button-post" class="element-highlight">Get a new password!</button>
                
                <h5 id="number-words-title">How many words?</h5>
                <div id="range-slider-words" class="range-slider" data-slider data-options="initial: 4; start: 1; end: 10; step: 1;">
                    <span id="range-button-words" class="range-slider-handle element-highlight" role="slider" tabindex="0" aria-valuemin="0" aria-valuemax="10" aria-valuenow="4"> </span>
                    <span class="range-slider-active-segment"> </span>
                    <input id="quantity-words" name="quantity-words" type="hidden">
                </div>
                
                <h5 id="customize-title">Customize the words?</h5>
                
                <div class="checkbox-row">
                    <div class="checkbox-label">Include numbers</div>
                    <input id="include-numbers" class="checkbox-box" type="checkbox" name="include-numbers" value="false">
                </div>
                
                <div id="range-slider-numbers" class="range-slider disabled" data-slider data-options="initial: 1; start: 1; end: 10; step: 1;">
                    <span id="range-button-numbers" class="range-slider-handle element-highlight" role="slider" tabindex="0" aria-valuemin="0" aria-valuemax="10" aria-valuenow="0"> </span>
                    <span class="range-slider-active-segment"> </span>
                    <input id="quantity-numbers" name="quantity-numbers" type="hidden">
                </div>
                
                <div class="checkbox-row">
                    <div class="checkbox-label">Include special characters</div>
                    <input id="include-special" class="checkbox-box" type="checkbox" name="include-special" value="false">
                </div>
                
                <div id="range-slider-special" class="range-slider disabled" data-slider data-options="initial: 1; start: 1; end: 10; step: 1;">
                    <span id="range-button-special" class="range-slider-handle element-highlight" role="slider" tabindex="0" aria-valuemin="0" aria-valuemax="10" aria-valuenow="0"> </span>
                    <span class="range-slider-active-segment"> </span>
                    <input id="quantity-special" name="quantity-special" type="hidden">
                </div>
                
                <h5 id="spacers-title">Word spacing?</h5>
                
                <div class="checkbox-row-grouped">
                    <div class="checkbox-label">Use hyphens</div>
                    <input id="include-hyphens" class="checkbox-box checkbox-box-spacers" type="checkbox" name="include-hyphens" value="true" checked>
                </div>
                
                <div class="checkbox-row-grouped">
                    <div class="checkbox-label">Use underscores</div>
                    <input id="include-underscores" class="checkbox-box checkbox-box-spacers" type="checkbox" name="include-underscores" value="false">
                </div>
                
                <div class="checkbox-row-grouped">
                    <div class="checkbox-label">Use blank spaces</div>
                    <input id="include-spaces" class="checkbox-box checkbox-box-spacers" type="checkbox" name="include-spaces" value="false">
                </div>
                
                <h5 id="case-title">Word case?</h5>
                
                <div class="checkbox-row-grouped">
                    <div class="checkbox-label">All lowercase</div>
                    <input id="include-lowercase" class="checkbox-box checkbox-box-case" type="checkbox" name="include-lowercase" value="true" checked>
                </div>
                
                <div class="checkbox-row-grouped">
                    <div class="checkbox-label">All uppercase</div>
                    <input id="include-uppercase" class="checkbox-box checkbox-box-case" type="checkbox" name="include-uppercase" value="false">
                </div>

                <div class="checkbox-row-grouped">
                    <div class="checkbox-label">First letter capitalized</div>
                    <input id="include-capitalized" class="checkbox-box checkbox-box-case" type="checkbox" name="include-capitalized" value="false">
                </div>
                
            </div>
            
            <div id="right" class="large-8 columns">

                <ul class="accordion" data-accordion role="tablist">
                    <li class="accordion-navigation accordion-navigation-first">
                        <a id="panel1d-heading" class="accordion-href element-highlight" href="#panel1d" role="tab" aria-controls="panel1d">What's XKCD and what's an XKCD password?</a>
                        <div id="panel1d" class="content" role="tabpanel" aria-labelledby="panel1d-heading">
                            <p class="discussion">
                                XKCD is a web comic covering math, science and computer programming topics, known for its witty and dry sense of humor. A popular post there discussed a type of user-friendly high-entropy password, meaning a password designed to be easy for humans to remember, but hard for computers to crack.
                            </p>
                        </div>
                    </li>
                    <li class="accordion-navigation">
                        <a id="panel2d-heading" class="accordion-href element-highlight" href="#panel2d"  role="tab" aria-controls="panel2d">How do I make one?</a>
                        <div id="panel2d" class="content" role="tabpanel" aria-labelledby="panel2d-heading">
                            <p class="discussion">Pick any combination of settings, then click "Get a new password!" directly above the menu. Your new password will be displayed in a pop-up message.</p>
                        </div>
                    </li>
                    <li id="comic-panel" class="accordion-navigation">
                        <a id="panel3d-heading" class="accordion-href element-highlight" href="#panel3d" role="tab" aria-controls="panel3d">How do I read the original XKCD post?</a>
                        <div id="panel3d" class="content" role="tabpanel" aria-labelledby="panel3d-heading">
                            <div class="image-wrapper overlay-fade-in-new-background">
                                <img id="pic" src="{{ URL::asset('assets/img/comic.png') }}" alt="The original XKCD comic strip!" title="The original XKCD comic strip!" />
                                <div class="image-overlay-content">
                                    <div class="discussion">To read the original post and other XKCD posts, use this link:</div>
                                    <div class="xkcd-center">
                                        <a id="xkcd-button" class="element-highlight" href="https://xkcd.com/936/" target="_blank" title="Read the original post on www.xkcd.com">xkcd.com</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                
            </div>
            
            <div id="modal" class="reveal-modal" data-reveal aria-labelledby="modalMessage" aria-hidden="true" role="dialog">
                <p id="modalLeadTop" class="lead"> </p>
                <h3 id="modalMessage" class="password">*</h3>
                <p id="modalLeadBottom" class="lead"> </p>
                <a class="close-reveal-modal" aria-label="Close">&#215;</a>
            </div>
            
        </div>
        
        <!-- JS-->
        <script src="{{ URL::asset('assets/js/jquery.2.1.4.min.js') }}"> </script>
        <script src="{{ URL::asset('assets/js/foundation.min.js') }}"> </script>
        <script src="{{ URL::asset('assets/js/password.js') }}"> </script>
        
    </body>
   
</html>