<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            JSON Dataset
        </title>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js">
        </script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
        </script>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <style>
            body {
                background-image: url('/images/bg.jpg');
                background-size: cover;
                background-repeat: repeat;
                font-family: Times;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1>&nbsp;</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-1">
                    &nbsp;
                </div>
                <div class="card bg-light col-10">
                    <div class="card-title">
                        <p>
                            <a href="/">reset page</a>
                        </p>
                        <br>
                        <br>
                        <h3 class="text-center text-dark">
                            I am a CDC dataset (JSON) displayed with raw PHP
                        </h3>
                    </div>
                    <div class="card-body bg-light">
                        <div class="form-group">
                            <form action="/" method="get">
                                <p>
                                    <input
                                        class="form-control"
                                        type="text"
                                        name="term"
                                        id="auto"
                                        value=""
                                        autocomplete="off"
                                        placeholder="Type a CDC title"
                                    />

                                    <input class="form-control btn btn-dark" type="submit" value="Submit" />
                                </p>
                            </form>
                        </div>
                        <script>
                            $('#auto').autocomplete({
                                source: function(request, response) {
                                    $.ajax({
                                        url: "/api/v1/autocomplete",
                                        type: "GET",
                                        data: request,
                                        success: function(data) {
                                            response(data);
                                        }
                                    });
                                },
                            });
                            jQuery.ui.autocomplete.prototype._resizeMenu = function() {
                                var ul = this.menu.element;
                                ul.outerWidth(this.element.outerWidth());
                            }
                        </script>
                        @if (isset($table))
                        <div class="col-1"></div>
                        <div class="text-dark col-10">
                            <div class="row">
                                <div class="col">
                                    <p class="text-dark">
                                        <b>Title: </b> {{ $table[0]["title"] }}
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p class="text-dark">
                                        <b>Description: </b> {{ $table[0]["description"] }}
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p class="text-dark">
                                        <b>Contact: </b> {{ $table[0]["contactPoint"]['fn'].', '.$table[0]['contactPoint']['hasEmail'] }}
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p class="text-dark">
                                        <b>URL: </b> {{ $table[0]["landingPage"] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-1">
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="col-1">
        </div>
        @endif
    </body>
</html>
