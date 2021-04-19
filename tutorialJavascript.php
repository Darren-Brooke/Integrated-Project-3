<?php
include("header.php");
?>

<div class="container-fluid" style="padding-left: 0; padding-right: 0;">
    <div class="row">
        <div class ="col-12">
            
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="container">
                <div class="page-header">
                    <h1>JavaScript techniques <small>How we access and process data using JavaScript</small></h1>
                </div>
                <br>
                This page is designed to give you an idea as to how to use JavaScript to access and process data within a web application.
                To discover more about a topic, please click or tap on any of the headings below.
                Please note that the information has been arranged in such a way that beginners should start from the top heading and make their way down.
                <br>
                <br>
                
                <div class="panel-group" id="accordion">
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">-Getting started with libraries</a>
                            </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse in">
                            <div class="panel-body">
                                Before attempting to use any of the code shown in this page, you will need to have access to the jQuery library otherwise the browser will have no idea how to interpret some of the code.
                                There are two conventional ways of gaining access to JavaScript libraries and both require a script tag within the head of the HTML document:
                                <ol>
                                    <li>Placing a link to the external content delivery network (CDN) (<span class="code-snippet"><code>&lt;script src = "URL OF CDN" type="text/javascript">&lt;/script></code></span>)</li>
                                    <ul style="list-style: none;">
                                        <li>
                                            + Cut down on storage space needed for your application.
                                        </li>
                                        <li>
                                            - Reliant on another system being up and running for your site to function.
                                        </li>
                                    </ul>
                                    <li>Downloading the relevant files themselves (<span class="code-snippet"><code>&lt;script src = "LOCATION OF JS FILE e.g. 'js/myjavascript.js'" type="text/javascript">&lt;/script></code></span>)</li>
                                    <ul style="list-style: none;">
                                        <li>
                                            + No need to be reliant on another system for your site to function.
                                        </li>
                                        <li>
                                            - Increased storage space needed to accomodate the necessary files.
                                        </li>
                                    </ul>
                                </ol>
                                Alternatively, in a "best of both worlds" viewpoint, you could connect to the CDN but as a fallback, use local JS files.
                                If you decide to go this route then you should use something akin to the following (credit to <a class ="tutorial-link" href = "https://www.hanselman.com/blog/CDNsFailButYourScriptsDontHaveToFallbackFromCDNToLocalJQuery.aspx">Scott Hanselman</a> for this trick):
                                <br>
                                <code class="code-snippet">
                                    &lt;script src="http://ajax.aspnetcdn.com/ajax/jquery/jquery-2.0.0.min.js">&lt;/script>
                                    <br>&lt;script>
                                        <br>if (typeof jQuery == 'undefined') {
                                            <br>document.write(unescape("%3Cscript src='/js/jquery-2.0.0.min.js' type='text/javascript'%3E%3C/script%3E"));
                                        <br>}
                                    <br>&lt;/script>
                                </code>
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">-Retrieving data with Ajax</a>
                            </h4>
                        </div>
                        <div id="collapse2" class="panel-collapse collapse in">
                            <div class="panel-body">
                                This application uses Ajax to retrieve data from a variety of sources; some external to the application and some internal.
                                The Ajax code necessary to retrieve data can be unnecessarily complex and so jQuery was used to simplify the syntax tremendously.
                                The jQuery Ajax code (official documentation can be found <a class ="tutorial-link" href = "http://api.jquery.com/jquery.ajax/">here</a>) needs four <q>key/value</q> pairs:
                                
                                <ul>
                                    <li>Location of the data (it should be noted that the data can be located externally in an API using a URL or locally e.g. a JSON file)</li>
                                    <li>Type of request i.e. <b>GET</b> or <b>POST</b> (our application only retrieves data and so we have used GET exclusively)</li>
                                    <li>The data type of the resource in question (JSON, XML, CSV etc)</li>
                                    <li>What should happen if the request has been successful or if it has failed (the latter isn't essential but desirable so the application can <q>fail gracefully</q>)</li>
                                </ul>
                                
                                The following code snippet can be used to make an Ajax request with jQuery (simply populate the empty quotation fields/functions with the relevant data):
                                
                                <div class="code-snippet">
                                    <code>
                                        $.ajax({<br>
                                        "url": "",<br>
                                        "type": "",<br>
                                        "dataType": "",<br>
                                        "success": function(data) {<br>
                                        // "data" refers to the data that has been retrieved<br>
                                        },<br>
                                        "error": function() {<br>
                                        }<br>
                                        })<br>
                                    </code>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">-Viewing data using JavaScript and developer tools</a>
                            </h4>
                        </div>
                        <div id="collapse3" class="panel-collapse collapse">
                            <div class="panel-body">To check if the data has been retrieved successfully, it's a good idea to use the developer tools within the browser.
                                With regards to the <a href ="https://www.w3counter.com/globalstats.php">most popular internet browsers</a>,
                                their respective documentation for using the console via the developer tools can be found below:
                                <ul>
                                    <li><a class ="tutorial-link" href = "https://developers.google.com/web/tools/chrome-devtools/console/">Google Chrome</a></li>
                                    <li><a class ="tutorial-link" href = "https://support.apple.com/en-gb/guide/safari-developer/console-tab-dev170bfef99/11.0/mac/10.13">Safari</a></li>
                                    <li><a class ="tutorial-link" href = "https://docs.microsoft.com/en-us/microsoft-edge/devtools-guide/console">Microsoft Edge</a></li>
                                    <li><a class ="tutorial-link" href = "https://developer.mozilla.org/en-US/docs/Tools/Web_Console/Opening_the_Web_Console">Mozilla FireFox</a></li>
                                    <li><a class ="tutorial-link" href = "https://help.opera.com/en/presto/advanced-features/">Opera</a></li>
                                </ul>
                                
                                Assuming the given code snippet has been used, the success function should use the following JavaScript code:
                                <code class = "code-snippet">
                                    console.log(data);
                                </code>
                                Within the browsers developer tools under "console", you should be able to see the data returned by your Ajax request.
                                As an aside, it's a good idea to use this piece of code whenever debugging with JavaScript; it's very useful! 
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">-Processing data</a>
                            </h4>
                        </div>
                        <div id="collapse4" class="panel-collapse collapse">
                            <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- You guys need to include EOF so that jquery and bootstrap js works -->
<?php
include("eof.php");
?>