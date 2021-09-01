
    <style type="text/css">
        .first-nav {
            background: white;
        }

        .second-nav {

            color: black;
            background-color: white;
        }

        .navcss {
            margin-top: 20px;
            margin-left: auto !important;
        }

        #submitsearch {
            border: 1px solid rgb(138, 134, 134);
            margin-left: -82px;
            padding: 5px;
            border-radius: 19px;
            cursor: pointer;
            padding-left: 10px;
            padding-right: 8px;
            padding-top: 4px;

            display: none;
            box-shadow: 0 0 1px black;
            margin-right: 110px;
        }

        #searchInput {
            width: 100%;

            border: 1px solid #000;
            border-radius: 30px;
            /*font-size: 16px;*/
            background-color: white;
            background-image: url('https://cdn2.iconfinder.com/data/icons/ios-7-icons/50/search-24.png');

            background-position: 10px 7px;
            background-repeat: no-repeat;
            padding: 8px 20px 8px 40px;
            -webkit-transition: width 0.8s ease-in-out;
            transition: width 0.8s ease-in-out;
            outline: none;
            opacity: 0.9;

        }
    </style>


    <!-- 
           faded
           -->
    <nav class="navbar navbar-expand-sm bg-faded navbar-light  first-nav">
        <div class="container">
            <div class="row">
                <a href="#" class="navbar-brand">
                    <p style="font-size: 30px;color: #82e023; margin-top: 10px;">LOGO</p>
                </a>
                <div class="navbar-brand navcss" id="navbar1">
                    <div class='navbar-brand container'>
                        <input style="height: 40px;" type="text" id="searchInput" placeholder="Search..">
                        <div id='submitsearch' style="">
                            <span>Search</span>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <hr>
    <!-- 
           dark
           -->
    <nav style=" margin-top: -15px;" class="navbar navbar-expand-sm navbar-dark sticky-top second-nav">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar2">
                <span class="fas fa-bars"></span>
            </button>
            <!-- <a href="/" class="navbar-brand">Home</a> -->
            <div class="navbar-collapse collapse" id="navbar2">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>

                </ul>
                <!-- <ul class="navbar-nav">

            </ul>
            <ul class="navbar-nav">

            </ul>
            <ul class="navbar-nav">

            </ul>
            <ul class="navbar-nav">

            </ul>
            <ul class="navbar-nav">

            </ul>
            <ul class="navbar-nav">

            </ul>
            <ul class="navbar-nav">

            </ul>
            <ul class="navbar-nav">

            </ul>
            <ul class="navbar-nav">

            </ul>
            <ul class="navbar-nav">

            </ul>
            <ul class="navbar-nav">

            </ul>
            <ul class="navbar-nav">

            </ul>
            <ul class="navbar-nav">

            </ul>
            <ul class="navbar-nav">

            </ul>
            <ul class="navbar-nav">

            </ul>
            <ul class="navbar-nav">

            </ul>
            <ul class="navbar-nav">

            </ul>
            <ul class="navbar-nav">

            </ul>
            <ul class="navbar-nav">

            </ul>
            <ul class="navbar-nav">

            </ul>
            <ul class="navbar-nav">

            </ul>
            <ul class="navbar-nav">

            </ul>
            <ul class="navbar-nav">

            </ul>
            <ul class="navbar-nav">

            </ul>
            <ul class="navbar-nav">

            </ul>
            <ul class="navbar-nav">

            </ul> -->

                <ul class="navbar-nav ml-auto">
                    <li style="" class="nav-item">
                        <a class="nav-link" href="#"><i style="color:#b4cf10;" class="fa fa-shopping-cart"
                                aria-hidden="true"></i>&nbsp;&nbsp;Cart(2)</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <script type="text/javascript">
        $("#searchInput").focus(function () {

            $("#searchInput").css({
                "display": "inline",
                "width": "40%",
                "border": "1px solid #40585d",
                "opacity": "1",
                "padding": "8px 20px 8px 20px",
                "background-image": "none",
                "box-shadow": "0 0 1px black"
            });
            $("#submitsearch").css("display", "inline");

            $("#searchInput").prop("placeholder", "");
        });
    </script>
