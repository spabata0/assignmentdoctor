<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/css/css.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/091f08a571.js"></script>
    <script src="<?=base_url();?>assets/js/script.js"></script>
    <title>Channel Hue</title>
</head>
<body>
    <nav class="navbar navbar-default navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href=".">
                    <img src="<?=base_url();?>assets/img/footerLogo.png" class="img-responsive">
                </a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="<?=base_url();?>">Home</a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="<?=base_url();?>tv-everywhere">TV EVERYWHERE
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?=base_url();?>coming-soon">COMING SOON</a>
                        </li>
                        <li>
                            <a href="<?=base_url();?>programmes">PROGRAMMES</a>
                        </li>
                        <li>
                            <a href="<?=base_url();?>film-competition">FILM COMPETITION</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">MAGAZINE
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?=base_url();?>archive">ARCHIVE</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?=base_url();?>in-production">IN PRODUCTION</a>
                </li>
                <li>
                    <a href="<?=base_url();?>advertisement-and-sponsors">ADVERTISEMENT & SPONSORS</a>
                </li>
                <li>
                    <a href="<?=base_url();?>hue-are-we">HUE ARE WE?</a>
                </li>
                <li>
                    <a href="#" class="btn-subscribe btn-danger btn">
                        Subscribe
                    </a>
                </li>
            </ul>
            </div>
        </div>
    </nav>