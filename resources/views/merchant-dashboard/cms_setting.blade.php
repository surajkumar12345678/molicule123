@extends('layouts.merchantdashboard')
@section('style')
<link type="text/css" rel="stylesheet" href="{{ asset('web-layouts/dragimage/dist/image-uploader.min.css')}}">
<!-- include libraries(jQuery, bootstrap) -->

<style type="text/css">
.box .dataTables_wrapper {
    /* padding-top: 10px; */
    padding-left: 20px;
    padding-right: 20px;
}

.sb-example-1 .search {
    width: 100%;
    position: relative;
    display: flex;
}

.sb-example-1 .searchTerm {
    width: 100%;
    border: none;
    padding: 10px;
    margin-left: 70px;
}

.sb-example-1 .searchTerm:focus {
    color: #00B4CC;
}

.sb-example-1 .searchButton {
    width: 40px;
    /* height: 50px; */
    border: 1px solid #ffffff;
    background: #ffffff;
    text-align: center;
    color: #10000045;
    /* border-radius: 0 5px 5px 0; */
    cursor: pointer;
    font-size: 20px;
}

.productcss {
    width: 65%;
}

.toggle-btn {
    width: 75px;
    height: 30px;
    margin: 5px;
    border-radius: 50px;
    display: inline-block;
    position: relative;
    background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAyklEQVQ4T42TaxHCQAyENw5wAhLACVUAUkABOCkSwEkdhNmbpHNckzv689L98toIAKjqGcAFwElEFr5ln6ruAMwA7iLyFBM/TPDuQSrxwf6fCKBoX2UMIYGYkg8BLOnVg2RiAEexGaQQq4w9e9klcxGLLAUwgDAcihlYAR1IvZA1sz/+AAaQjXhTQQVoe2Yo3E7UQiT2ijeQdojRtClOfVKvMVyVpU594kZK9zzySWTlcNqZY9tjCsUds00+A57z1e35xzlzJjee8xf0HYp+cOZQUQAAAABJRU5ErkJggg==") no-repeat 50px center #e74c3c;
    cursor: pointer;
    -webkit-transition: background-color 0.4s ease-in-out;
    -moz-transition: background-color 0.4s ease-in-out;
    -o-transition: background-color 0.4s ease-in-out;
    transition: background-color 0.4s ease-in-out;
    cursor: pointer;
}

.toggle-btn.active {
    background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAmUlEQVQ4T6WT0RWDMAhFeZs4ipu0mawZpaO4yevBc6hUIWLNd+4NeQDk5sE/PMkZwFvZywKSTxF5iUgH0C4JHGyF97IggFVSqyCFga0CvQSg70Mdwd8QSSr4sGBMcgavAgdvwQCtApvA2uKr1x7Pu++06ItrF5LXPB/CP4M0kKTwYRIDyRAOR9lJTuF0F0hOAJbKopVHOZN9ACS0UgowIx8ZAAAAAElFTkSuQmCC") no-repeat 10px center #2ecc71;
}

.toggle-btn.active .round-btn {
    left: 45px;
}

.toggle-btn .round-btn {
    width: 20px;
    height: 20px;
    background-color: #fff;
    border-radius: 50%;
    display: inline-block;
    position: absolute;
    left: 5px;
    top: 62%;
    margin-top: -15px;
    -webkit-transition: all 0.3s ease-in-out;
    -moz-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

.toggle-btn .cb-value {
    position: absolute;
    left: 0;
    right: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    z-index: 9;
    cursor: pointer;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
}

.made-with-love {
    position: fixed;
    left: 0;
    width: 100%;
    bottom: 10px;
    text-align: center;
    font-size: 10px;
    z-index: 9999;
    font-family: arial;
    color: #fff;
}

.made-with-love i {
    font-style: normal;
    color: #F50057;
    font-size: 14px;
    position: relative;
    top: 2px;
}

.made-with-love a {
    color: #fff;
    text-decoration: none;
}

.made-with-love a:hover {
    text-decoration: underline;
}
</style>

@endsection @section('content')
<div class="padding">
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
    <div class="row">
        <br>
    </div>
    
    <div class="box">
        <div class="box-header"></div>

        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h3 style="color:#1F85EC">Cms Setting</h3>
                </div>

            </div>
        </div>
        <hr>
        <div class="container table-responsive">
            <form action="{{ route('merchantcms_setting/store')}}"  method="POST" enctype="multipart/form-data" class="container">
                @csrf
                 
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="inputEmail3" class="form-control-label">Font Color</label>
                    </div>
                    <div class="col-md-10 mt-2"> 
                        <input type="text" id="color" name="font_color" value="{{ old('font_color')}}"><br><br>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="inputEmail3" class="form-control-label">Font Hover Color</label>
                    </div>
                    <div class="col-md-10 mt-2">
                        <input type="text" id="color" name="font_hover_color" value="#ff0000"><br><br>
                    </div>
                </div>	
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="inputEmail3" class="form-control-label">Active Color</label>
                    </div>
                    <div class="col-md-10 mt-2">
                        <input type="text" id="color" name="active_color" value="#ff0000"><br><br>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="inputEmail3" class="form-control-label">Whishlist Color</label>
                    </div>
                    <div class="col-md-10 mt-2">
                        <input type="text" id="color" name="whishlist_color" value="#ff0000"><br><br>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="inputEmail3" class="form-control-label">Cart Color</label>
                    </div>
                    <div class="col-md-10 mt-2">
                        <input type="text" id="color" name="cart_color" value="#ff0000"><br><br>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="inputEmail3" class="form-control-label">Button Color</label>
                    </div>
                    <div class="col-md-10 mt-2">
                        <input type="text" id="color" name="button_color" value="#ff0000"><br><br>
                    </div>
                </div>
                

                                
                <div class="form-group row m-t-md">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn white">Save</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
</div>

@endsection


@push('custom_js')


 <script type="text/javascript">
        var canvas = document.getElementById("input"),
        output = document.getElementById("output"),
        lock = document.getElementById("lockStat"),
        ctx = canvas.getContext("2d")
       
        canCen = {
            x: canvas.width/2,
            y: canvas.height/2
        },
        mouseAngle = 0,
        mousePos = {x: 0, y: 0},
        mouseDist = 50,
        useMouse = true,
            canvas.addEventListener("mousemove", function(e) {
                if(useMouse) {
                    var clientRect = canvas.getBoundingClientRect(),
                    x = (e.clientX - clientRect.left) * (canvas.width / canvas.offsetWidth),
                    y = (e.clientY - clientRect.top) * (canvas.height / canvas.offsetHeight),
                    n = 180 + (Math.atan2(canCen.y - y, canCen.x - x)) * 180 / Math.PI;
                    mouseDist = Math.round((Math.min(canCen.y - 64,Math.sqrt(Math.pow(canCen.x - x, 2) + Math.pow(canCen.y - y, 2)))/(canCen.y-64))*100);
                    mouseAngle = Math.round(n % 360);
                    mousePos.x = x;
                    mousePos.y = y;
                    output.style.color = output.innerHTML =  "hsl("+mouseAngle+","+mouseDist+"%, 50%)";
                }
            }, false);

        canvas.addEventListener("mouseup", function() {
            useMouse = !useMouse;
            if(useMouse) {
               lock.innerHTML = "Click to lock";
            }
            else {
                lock.innerHTML = "Click to unlock";
            }
        },false);
        function animate() {
              ctx.clearRect(0,0,canvas.width,canvas.height);
            for(var i = 0; i < 360; i++) {
                var scaleBack;
                ctx.strokeStyle = ctx.fillStyle = "hsl("+i+","+mouseDist+"%, 50%)";
                    if(i == mouseAngle) {
                        scaleBack = 32;
                        ctx.lineWidth = 10;
                        ctx.beginPath();
                        ctx.arc((canCen.x) + (canCen.x-scaleBack)*Math.cos((i/360)*Math.PI*2),
                        (canCen.y) + (canCen.y-scaleBack)*Math.sin((i/360)*Math.PI*2), 16, 0, Math.PI*2);
                        ctx.fill();
                    } else {
                        scaleBack = 64;
                        ctx.lineWidth = 5;
                    }
            ctx.beginPath();
            ctx.moveTo(canCen.x, canCen.y);
            ctx.lineTo(
            (canCen.x) + (canCen.x-scaleBack)*Math.cos((i/360)*Math.PI*2),(canCen.y) + (canCen.y-scaleBack)*Math.sin((i/360)*Math.PI*2)
            );
            ctx.stroke();
        }
        
        requestAnimationFrame(animate);
        }
        animate();
        </script>
        <script>
        (function(){
        'use strict';
            angular.module('app', ['colorPicker']);
            angular.module('colorPicker', [])
            .directive('colorPicker', [function () {
                var updateEventListenerTargets = ['touchstart','touchmove','mouseup','mousemove'],
                clientX, clientY,
                mousedown = 0;
                function ColorPicker() {
                    // Initialize at center position with white
                    this.ngModel = '#ffffff';
                }
                ColorPicker.$inject = [];
                return {
                        restrict: 'E',
                        controller: ColorPicker,
                        bindToController: true,
                        controllerAs: 'colorPicker',
                        scope: {
                              ngModel: '=color'
                        },
                    replace: true,
                    template: [
                        '<div class="color-picker">',
                            '<canvas width="230px" height="230px"></canvas>',
                            '<span class="indicator">',
                                '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="50" height="64" viewBox="0 0 25 32">',
                                '<path fill="#ffffff" d="M12.528 0c-6.943 0-12.528 5.585-12.528 12.528 0 10.868 12.528 19.472 12.528 19.472s12.528-9.585 12.528-18.792c0-6.868-5.66-13.208-12.528-13.208zM12.528 21.434c-4.981 0-9.057-4.075-9.057-9.057s4.075-9.057 9.057-9.057 9.057 4.075 9.057 9.057-4.075 9.057-9.057 9.057z"></path>',
                            '</svg>',
                            '<span class="selected-color"></span>',
                        '</span>',
                    '</div>'
                    ].join(''),
                link: function (scope, el, attrs, colorPicker) {
                var canvas = el.find('canvas')[0];
                var context = canvas.getContext('2d');
                var x = canvas.width / 2;
                var y = canvas.height / 2;
                var radius = x;
                var counterClockwise = false;
                    for(var angle=0; angle<=360; angle+=1){
                        var startAngle = (angle-2)*Math.PI/180;
                        var endAngle = angle * Math.PI/180;
                        context.beginPath();
                        context.moveTo(x, y);
                        context.arc(x, y, radius, startAngle, endAngle, counterClockwise);
                        context.closePath();
                        var gradient = context.createRadialGradient(x, y, 0, x, y, radius);
                        gradient.addColorStop(0,'hsl('+angle+', 10%, 100%)');
                        gradient.addColorStop(1,'hsl('+angle+', 100%, 50%)');
                        context.fillStyle = gradient;
                        context.fill();
                    }
                    var updateColorPicker = function(e){
                        e.preventDefault();
                            if (e.type === 'mousemove' && !mousedown) { return; }
                                clientX = (e.clientX) ? e.clientX : e.changedTouches[0].clientX;
                                clientY = (e.clientY) ? e.clientY : e.changedTouches[0].clientY;
                                var canvasOffset = canvas.getBoundingClientRect();
                                var canvasX = Math.floor(clientX - canvasOffset.left);
                                var canvasY = Math.floor(clientY - canvasOffset.top);
                                // get current pixel
                                var imageData = context.getImageData(canvasX, canvasY, 1, 1);
                                var pixel = imageData.data;
                                var indicator = el.find('span')[0];
                                var selectedColor = indicator.getElementsByClassName('selected-color')[0];
                                    if(!pixel[pixel.length - 1]) {
                                        return;
                                    }
                                var dColor = pixel[2] + 256 * pixel[1] + 65536 * pixel[0];
                                colorPicker.ngModel = '#' + ('0000' + dColor.toString(16)).substr(-6);
                                indicator.style.left    = canvasX + 'px';
                                indicator.style.top     = canvasY - 32 + 'px';
                                selectedColor.style.backgroundColor = colorPicker.ngModel;
                                scope.$apply(function(){
                                colorPicker.ngModel = colorPicker.ngModel;
                        });
                    };
                    for (var i=0, len = updateEventListenerTargets.length; i<len; i++) {
                        canvas.addEventListener(updateEventListenerTargets[i], updateColorPicker, false);
                    }
                canvas.addEventListener('mousedown', function(){
                    mousedown = 1;
                }, false);
                    document.addEventListener('mouseup', function(){
                        mousedown = 0;
                    }, false);
            }
        };
    }]);
}());
    </script>

@endpush

