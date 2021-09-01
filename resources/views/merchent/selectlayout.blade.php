@extends('layouts.merchent')

@section('style')
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js" type="text/javascript"></script>
    <script type="text/javascript">
    (function(){
    'use strict';
    angular.module('app', ['colorPicker']);
    }());
    </script>
    <style>
    .ng-scope {text-align: center;}
    * {
    box-sizing: border-box;
    }
    body {
    text-align: center;
    padding-top: 75px;
    }
    .color-picker {
    display: inline-block;
    position: relative;
    }
    .color-picker input { display: none; }
    .canvas-wrapper {
    border-radius: 1000px;
    overflow: hidden;
    }
    .indicator {
    top: calc(50% - 2rem);
    left: 50%;
    display: block;
    position: absolute;
    background-color: transparent;
    transform: translate3d(-50%,-2rem,0);
    pointer-events: none;
    }
    .indicator .selected-color {
    position: absolute;
    top: 2px;
    left: 2px;
    right: 2px;
    bottom: 30%;
    border-radius: 1000px;
    z-index: -1;
    background-color: #fff;
    -webkit-filter: drop-shadow(0 5px 15px rgba(0,0,0,0.5));
    filter: drop-shadow(0 5px 15px rgba(0,0,0,0.5));
    }
    </style>
    <style type="text/css">

    /* HIDE RADIO */
[type=radio] { 
  position: absolute;
  opacity: 0;
  width: 0;
  height: 0;
}

/* IMAGE STYLES */
[type=radio] + img {
  cursor: pointer;
}

/* CHECKED STYLES */
[type=radio]:checked + img {
    /* outline: 5px solid #137feb; */
    opacity: 25%;
}
.image1, .image2, .image3, .image4, .image5, .image6, .image7, .image8, .image9, .image10 {
    height:100px;
    width:120px;
}

    /*.switch {
    position: relative;
    }
    .switch label {
    position: absolute;
    background-color: #1F85EC;
    border-radius: 50px;
    width: 95%;
    height: 20px;
    top: -45px;
    left: 20px;
    }
    .switch label:after {
    content: '';
    width: 60%;
    height: 14px;
    border-radius: 50px;
    position: absolute;
    background-color: white;
    transition: all 0.2s;
    top: 3px;
    left: 8px;
    }
    .switch input[type="checkbox"] {
    visibility: hidden;
    }
    .switch input[type="checkbox"]:checked + label {
    background-color: #1F85EC;
    }
    .switch input[type="checkbox"]:checked + label:after {
    /*left: 33px;*/
    /*}
    .upload-btn-wrapper {
    position: relative;
    overflow: hidden;
    display: inline-block;
    }
    .btnupload {
    border: 2px solid gray;
    color: gray;
    background-color: white;
    /*padding: 8px 20px;*/
    /*border-radius: 8px;
    font-size: 20px;
    font-weight: bold;
    }
    .upload-btn-wrapper input[type=file] {
    font-size: 100px;
    position: absolute;
    left: 0;
    top: 0;
    opacity: 0;
    }
    .selected {
    opacity: 0.2;
    }
    .wrapper {
    width: 350px;
    /*background: #222;*/
    
    /*border-radius: 30px;
    }
    canvas {
    width: 100%;
    background:  hsl(0,0%,50%);
    border-radius: 50%;
    cursor: pointer;
    }*/
</style>
@endsection

@section('content')
 <!-- ***** Welcome Area Start ***** -->
 <section id="home" class="section welcome-area bg-overlay overflow-hidden d-flex align-items-center">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div  class="formarea">
                               <form action="/LayoutId" method="post" enctype="multipart/form-data">
                               @csrf
                                <h4 class="">Select Layout</h4>
                                <div style="padding: 80px; margin-top: -50px;" class="row">
                                    
                                    <div class="col-12 col-md-6 col-lg-3 mb-4 cat">
                                        <!-- Single Service -->
                                        <div class="single-service service-gallery m-0 overflow-hidden">
                                            <!-- Service Thumb -->
                                            <div class="service-thumb">
                                                <label>
                                                    <input type="radio" name="layout_id" value="1">
                                                    <img style="width: 99%;" src="{{ asset('/assets/img/layout/layout1.png') }}" alt="">
                                                </label>
                                            </div>
                                            <!-- Service Content -->
                                            <div class="service-content layoutext">
                                                <a class="service-btn" href="#">Preview</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-3 mb-4 cat">
                                        <!-- Single Service -->
                                        <div class="single-service service-gallery m-0 overflow-hidden">
                                            <!-- Service Thumb -->
                                            <div class="service-thumb">
                                                <label>
                                                    <input type="radio" name="layout_id" value="2">
                                                    <img style="width: 99%;" src="{{ asset('/assets/img/layout/layout2.png') }}"  alt="">
                                                </label>
                                            </div>
                                            <!-- Service Content -->
                                            <div class="service-content layoutext">
                                                <a class="service-btn" href="#">Preview</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-3 mb-4 cat">
                                        <!-- Single Service -->
                                        <div class="single-service service-gallery m-0 overflow-hidden">
                                            <!-- Service Thumb -->
                                            <div class="service-thumb">
                                                <label>
                                                    <input type="radio" name="layout_id" value="3">
                                                    <img style="width: 99%;" src="{{ asset('/assets/img/layout/layout3.png') }}"  alt="">
                                                </label>
                                            </div>
                                            <!-- Service Content -->
                                            <div class="service-content layoutext">
                                                <a class="service-btn" href="#">Preview</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-3 mb-4 cat">
                                        <!-- Single Service -->
                                        <div class="single-service service-gallery m-0 overflow-hidden">
                                            <!-- Service Thumb -->
                                            <div class="service-thumb">
                                                <label>
                                                    <input type="radio" name="layout_id" value="4">
                                                    <img style="width: 99%;" src="{{ asset('/assets/img/layout/layout4.png') }}"  alt="">
                                                </label>
                                            </div>
                                            <!-- Service Content -->
                                            <div class="service-content layoutext">
                                                <a class="service-btn" href="#">Preview</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-3 mb-4 cat">
                                        <!-- Single Service -->
                                        <div class="single-service service-gallery m-0 overflow-hidden">
                                            <!-- Service Thumb -->
                                            <div class="service-thumb">
                                                <label>
                                                    <input type="radio" name="layout_id" value="5">
                                                    <img style="width: 99%;" src="{{ asset('/assets/img/layout/layout2.png') }}"  alt="">
                                                </label>
                                            </div>
                                            <!-- Service Content -->
                                            <div class="service-content layoutext">
                                                <a class="service-btn" href="#">Preview</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-3 mb-4 cat">
                                        <!-- Single Service -->
                                        <div class="single-service service-gallery m-0 overflow-hidden">
                                            <!-- Service Thumb -->
                                            <div class="service-thumb">
                                                <label>
                                                    <input type="radio" name="layout_id" value="6">
                                                    <img style="width: 99%;" src="{{ asset('/assets/img/layout/layout3.png') }}"  alt="">
                                                </label>
                                            </div>
                                            <!-- Service Content -->
                                            <div class="service-content layoutext">
                                                <a class="service-btn" href="#">Preview</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-3 mb-4 cat">
                                        <!-- Single Service -->
                                        <div class="single-service service-gallery m-0 overflow-hidden">
                                            <!-- Service Thumb -->
                                            <div class="service-thumb">
                                                <label>
                                                    <input type="radio" name="layout_id" value="7">
                                                    <img style="width: 99%;" src="{{ asset('/assets/img/layout/layout4.png') }}"  alt="">
                                                </label>
                                            </div>
                                            <!-- Service Content -->
                                            <div class="service-content layoutext">
                                                <a class="service-btn" href="#">Preview</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-3 mb-4 cat">
                                        <!-- Single Service -->
                                        <div class="single-service service-gallery m-0 overflow-hidden">
                                            <!-- Service Thumb -->
                                            <div class="service-thumb">
                                                <label>
                                                    <input type="radio" name="layout_id" value="8">
                                                    <img style="width: 99%;" src="{{ asset('/assets/img/layout/layout1.png') }}"  alt="">
                                                </label>
                                            </div>
                                            <!-- Service Content -->
                                            <div class="service-content layoutext">
                                                <a class="service-btn" href="#">Preview</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h4 class="">Set Store Color</h4>
                                        <!-- <h5 class="pb-2 hedeadrcolor">Set Store Color</h5> -->
                                    </div>
                                    
                                    <div ng-app="app">
                                        <!-- <color-picker color="foo"></color-picker> -->
                                        <input type="color" id="color" name="color" value="#ff0000"><br><br>
                                    </div>
                                </div>
                                <br>
                                <h4 class="">Upload Homepage Cover Image <small>(up to 5)</small> </h4><br>
                                <!-- <h5 class="pb-2 hedeadrcolor">Upload Homepage Cover Image (up to 5)</h5> -->
                                <div class="row">
                                    
                                    <div class="col-md-2">
                                        <div class="upload-btn-wrapper">
                                            <button style="border:none;" class="btnupload" id="preview1"><img src="assets/img/thumb.png" class="image1"></button>
                                            <input style="padding: 50px;" type="file" name="image1" id="image1">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="upload-btn-wrapper">
                                            <button style="border:none;" class="btnupload" id="preview2"><img src="assets/img/thumb.png" class="image2"></button>
                                            <input style="padding: 50px;" type="file" name="image2" id="image2">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="upload-btn-wrapper">
                                            <button style="border:none;" class="btnupload" id="preview3"><img src="assets/img/thumb.png" class="image3"></button>
                                            <input style="padding: 50px;" type="file" name="image3" id="image3">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="upload-btn-wrapper">
                                            <button style="border:none;" class="btnupload" id="preview4"><img src="assets/img/thumb.png" class="image4"></button>
                                            <input style="padding: 50px;" type="file" name="image4" id="image4">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="upload-btn-wrapper">
                                            <button style="border:none;" class="btnupload" id="preview5"><img src="assets/img/thumb.png" class="image5"></button>
                                            <input style="padding: 50px;" type="file" name="image5" id="image5">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <h4>Upload Homepage Banner Image <small>(up to 5)</small> </h4><br>
                                <div class="row">
                                    
                                    <div class="col-md-2">
                                        <div class="upload-btn-wrapper">
                                            <button style="border:none;" class="btnupload" id="preview6"><img src="assets/img/thumb.png" class="image6"></button>
                                            <input style="padding: 50px;" type="file" name="image6" id="image6">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="upload-btn-wrapper">
                                            <button style="border:none;" class="btnupload" id="preview7"><img src="assets/img/thumb.png" class="image7"></button>
                                            <input style="padding: 50px;" type="file" name="image7" id="image7">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="upload-btn-wrapper">
                                            <button style="border:none;" class="btnupload" id="preview8"><img src="assets/img/thumb.png" class="image8"></button>
                                            <input style="padding: 50px;" type="file" name="image8" id="image8">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="upload-btn-wrapper">
                                            <button style="border:none;" class="btnupload" id="preview9"><img src="assets/img/thumb.png" class="image9"></button>
                                            <input style="padding: 50px;" type="file" name="image9" id="image9">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="upload-btn-wrapper">
                                            <button style="border:none;" class="btnupload" id="preview10"><img src="assets/img/thumb.png" class="image10"></button>
                                            <input style="padding: 50px;" type="file" name="image10" id="image10">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-5">
                                    <a href="/store_details" class="btn btn-primary">Previous</a>
                                    <button type="submit" class="btn btn-primary">next</button>
                                </div>
                                </form> 
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Shape Bottom -->
                <div class="welcome-shape">
                    <img src="assets/img/hero_shape.png" alt="">
                </div>
            </section>
            <!-- ***** Welcome Area End ***** -->
<script>
    const image1 = document.getElementById('image1');
    const preview1 = document.getElementById('preview1');
    const previewimage1 = preview1.querySelector('.image1');
    image1.addEventListener("change",function(){
        const file = this.files[0];
        if(file)
        {
            const reader = new FileReader();
            reader.addEventListener("load", function(){
                previewimage1.setAttribute("src", this.result);
            });
            reader.readAsDataURL(file);
        }
    });  
    const image2 = document.getElementById('image2');
    const preview2 = document.getElementById('preview2');
    const previewimage2 = preview2.querySelector('.image2');
    image2.addEventListener("change",function(){
        const file = this.files[0];
        if(file)
        {
            const reader = new FileReader();
            reader.addEventListener("load", function(){
                previewimage2.setAttribute("src", this.result);
            });
            reader.readAsDataURL(file);
        }
    });     
    const image3 = document.getElementById('image3');
    const preview3 = document.getElementById('preview3');
    const previewimage3 = preview3.querySelector('.image3');
    image3.addEventListener("change",function(){
        const file = this.files[0];
        if(file)
        {
            const reader = new FileReader();
            reader.addEventListener("load", function(){
                previewimage3.setAttribute("src", this.result);
            });
            reader.readAsDataURL(file);
        }
    });    
    const image4 = document.getElementById('image4');
    const preview4 = document.getElementById('preview4');
    const previewimage4 = preview4.querySelector('.image4');
    image4.addEventListener("change",function(){
        const file = this.files[0];
        if(file)
        {
            const reader = new FileReader();
            reader.addEventListener("load", function(){
                previewimage4.setAttribute("src", this.result);
            });
            reader.readAsDataURL(file);
        }
    });    
    const image5 = document.getElementById('image5');
    const preview5 = document.getElementById('preview5');
    const previewimage5 = preview5.querySelector('.image5');
    image5.addEventListener("change",function(){
        const file = this.files[0];
        if(file)
        {
            const reader = new FileReader();
            reader.addEventListener("load", function(){
                previewimage5.setAttribute("src", this.result);
            });
            reader.readAsDataURL(file);
        }
    });
    const image6 = document.getElementById('image6');
    const preview6 = document.getElementById('preview6');
    const previewimage6 = preview6.querySelector('.image6');
    image6.addEventListener("change",function(){
        const file = this.files[0];
        if(file)
        {
            const reader = new FileReader();
            reader.addEventListener("load", function(){
                previewimage6.setAttribute("src", this.result);
            });
            reader.readAsDataURL(file);
        }
    });
    const image7 = document.getElementById('image7');
    const preview7 = document.getElementById('preview7');
    const previewimage7 = preview7.querySelector('.image7');
    image7.addEventListener("change",function(){
        const file = this.files[0];
        if(file)
        {
            const reader = new FileReader();
            reader.addEventListener("load", function(){
                previewimage7.setAttribute("src", this.result);
            });
            reader.readAsDataURL(file);
        }
    });
    const image8 = document.getElementById('image8');
    const preview8 = document.getElementById('preview8');
    const previewimage8 = preview8.querySelector('.image8');
    image8.addEventListener("change",function(){
        const file = this.files[0];
        if(file)
        {
            const reader = new FileReader();
            reader.addEventListener("load", function(){
                previewimage8.setAttribute("src", this.result);
            });
            reader.readAsDataURL(file);
        }
    });
    const image9 = document.getElementById('image9');
    const preview9 = document.getElementById('preview9');
    const previewimage9 = preview9.querySelector('.image9');
    image9.addEventListener("change",function(){
        const file = this.files[0];
        if(file)
        {
            const reader = new FileReader();
            reader.addEventListener("load", function(){
                previewimage9.setAttribute("src", this.result);
            });
            reader.readAsDataURL(file);
        }
    });
    const image10 = document.getElementById('image10');
    const preview10 = document.getElementById('preview10');
    const previewimage10 = preview10.querySelector('.image10');
    image10.addEventListener("change",function(){
        const file = this.files[0];
        if(file)
        {
            const reader = new FileReader();
            reader.addEventListener("load", function(){
                previewimage10.setAttribute("src", this.result);
            });
            reader.readAsDataURL(file);
        }
    });
</script>          
@endsection

@section('script')
<script>
        
        //declearing html elements
        const imgDiv = document.querySelector('.profile-pic-div');
        const img = document.querySelector('#photo');
        const file = document.querySelector('#file');
        const uploadBtn = document.querySelector('#uploadBtn');
        //if user hover on img div
        imgDiv.addEventListener('mouseenter', function () {
        uploadBtn.style.display = "block";
        });
        //if we hover out from img div
        imgDiv.addEventListener('mouseleave', function () {
        uploadBtn.style.display = "none";
        });
        //lets work for image showing functionality when we choose an image to upload
        //when we choose a foto to upload
        file.addEventListener('change', function () {
        //this refers to file
        const choosedFile = this.files[0];
        if (choosedFile) {
        const reader = new FileReader(); //FileReader is a predefined function of JS
        reader.addEventListener('load', function () {
        img.setAttribute('src', reader.result);
        });
        reader.readAsDataURL(choosedFile);
        
        }
        });
        </script>
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
        }
        else {
        scaleBack = 64;
        ctx.lineWidth = 5;
        }
        ctx.beginPath();
        ctx.moveTo(canCen.x, canCen.y);
        ctx.lineTo(
        (canCen.x) + (canCen.x-scaleBack)*Math.cos((i/360)*Math.PI*2),
        (canCen.y) + (canCen.y-scaleBack)*Math.sin((i/360)*Math.PI*2)
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
@endsection