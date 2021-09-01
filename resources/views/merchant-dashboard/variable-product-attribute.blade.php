@extends('layouts.merchantdashboard')
@section('style')
<style>
@import url('https://kodhus.com/kodhus-ui/kodhus-0.1.0.min.css');

body {
    background: #eee;
}

.container2 {
    width: 40%;
}

.tag-container2 {
    border: 2px solid #ccc;
    border-radius: 3px;
    background: #fff;
    display: flex;
    flex-wrap: wrap;
    align-content: flex-start;
    padding: 6px;
    overflow-x: scroll;
    width: 150%;
}

.tag-container2 .tag {
    height: 30px;
    margin: 5px;
    padding: 5px 6px;
    border: 1px solid #ccc;
    border-radius: 3px;
    background: #eee;
    display: flex;
    align-items: center;
    color: #333;
    box-shadow: 0 0 4px rgba(0, 0, 0, 0.2), inset 0 1px 1px #fff;
    cursor: default;
}

.tag i {
    font-size: 16px;
    color: #666;
    margin-left: 5px;
}

.tag-container2 input {
    padding: 5px;
    font-size: 16px;
    border: 0;
    outline: none;
    font-family: 'Rubik';
    color: #333;
    flex: 1;
}


.container1 {
    height: 50%;
    width: 50%;
    margin-left: 5%;
}
</style>
@endsection
@section('content')
<div class="padding">
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @elseif ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>


    @endif
    <div class="row">

        <br>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div>
                        @foreach($product as $product)
                        <div class="row" style="margin-top:30px;">
                            <h5 class="ml-5">Add product attributes</h5>
                            
                            <hr style="width:95%;height:2px;border-width:0;color:gray;background-color:gray">
                        </div>

                        <div class="row">

                            <div class="col-sm-3 scroll" data-flex>
                                <nav class="scroll nav-light">

                                    <div class="list-group" ui-nav>


                                        <a href="{{ url('/variable-product-attribute/'. $product->id)  }}"
                                            class="list-group-item list-group-item-action active">
                                            <span class="nav-icon">
                                                <i class="material-icons">&#xe7ee;

                                                </i>
                                            </span>
                                            <span class="nav-text">Attributes</span>
                                        </a>

                                        <a href="{{ url('/variable-product-variation/'. $product->id)  }}"
                                            class="list-group-item list-group-item-action">
                                            <span class="nav-icon">
                                                <i class="material-icons">&#xe3e5;

                                                </i>
                                            </span>
                                            <span class="nav-text">Variations</span>
                                        </a>

                                    </div>
                                </nav>
                            </div>

                            <div class="container col-sm-9">
                                <button type="button" id="addattribute" class="btn btn-primary">Add New
                                    Attribute</button> 
                                    @error('attribute_name')
                                      <p class="alert" style="color:red">{{ $message }}</p>
                                    @enderror
                                     
                                <div id="new_attribute" style="display:none;" >
                                    <form action="{{ url('new-attribute')}}" method="post" class="row">
                                        @csrf
                                        <div class="col-md-8 mt-2 ">
                                            <input type="text" placeholder="Enter attribute name" name="attribute_name" required class="form-control" >
                                        </div>
                                        <div class="col-md-3 mt-2 ">
                                              <button type="submit" class="btn btn-primary">Add</button>
                                        </div>
                                    </form>
                                </div>
                                <form action="{{ url('variable-product-attribute/'.$product->id)}}" method="post"
                                    enctype="multipart/form-data" class="mb-5 mt-4 ">
                                    @csrf
                                    <div class="row">
                                    <div class="col-md-8">
                                        <select style="" id="attribute_name"
                                            name="attribute_name" class="form-control">
                                            <option value="" hidden>Add custom attribute</option>
                                            @foreach($attributes as $attribute)
                                            <option value="{{ $attribute->attribute_name }}" id="{{ $attribute->id }}">
                                                {{ $attribute->attribute_name }}</option>
                                            @endforeach
                                        </select>
                                      </div>
                                      <div class="col-md-3">
                                        <button type="button" id="addAttr" class="btn btn-primary">Add</button>
                                        @error('demo')
                                          <p class="alert" style="color:red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    </div>
                                    <div id="attribute_value" class="my-5" style="display:none;">
                                        <div class="col-12">
                                              <div class="row">
                                                <label for="value">Enter Attrubite values : { you can add multiple value here. } 
                                                    Press spacebar after you typed.</label>
                                                   <br>
                                                    <div class="tag-container2" style="width:77%">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <input type="text" id="demo" name="demo[]" hidden>
                                                
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                        <button type="submit" id="submit" class="btn btn-primary">Save
                                            Attribute</button>
                                    </div>
                                    </div>

                                    
                                </form>

                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
        <script>
        $('#addattribute').click(function(){
          $('#new_attribute').toggle();

        });
        
        

        $('#addAttr').click(function(){
           var data = $('#attribute_name').val();
           if(data){
              document.getElementById('attribute_value').style.display = 'block';
              document.getElementById('name').innerHTML = document.getElementById('attribute_name').value;
           }else{
              alert('Select attribute name');
           }
            
        });

        function myFunction() {
            if (document.getElementById('digital').checked == true) {
                document.getElementById('digital_item').style.display = 'block';
                document.getElementById('physical_item').style.display = 'none';
            }
            if (document.getElementById('physical').checked == true) {
                document.getElementById('physical_item').style.display = 'block';
                document.getElementById('digital_item').style.display = 'none';
            }
        }


        const tagContainer = document.querySelector('.tag-container2');
        const input = document.querySelector('.tag-container2 input');

        let tags = [];

        function createTag(label) {
            const div = document.createElement('div');
            div.setAttribute('class', 'tag');
            const span = document.createElement('span');
            span.innerHTML = label;
            const closeIcon = document.createElement('i');
            closeIcon.innerHTML = 'close';
            closeIcon.setAttribute('class', 'material-icons');
            closeIcon.setAttribute('data-item', label);
            div.appendChild(span);
            div.appendChild(closeIcon);
            return div;
        }

        function clearTags() {
            document.querySelectorAll('.tag').forEach(tag => {
                tag.parentElement.removeChild(tag);
            });
        }

        function addTags() {
            clearTags();
            document.getElementById('demo').value = tags;
            tags.slice().reverse().forEach(tag => {
                tagContainer.prepend(createTag(tag));
            });
        }

        input.addEventListener('keyup', (e) => {
            if (e.keyCode === 32) {
                e.target.value.split(',').forEach(tag => {
                    tags.push(tag);
                });

                addTags();
                input.value = '';
            }
        });
        document.addEventListener('click', (e) => {
            console.log(e.target.tagName);
            if (e.target.tagName === 'I') {
                const tagLabel = e.target.getAttribute('data-item');
                const index = tags.indexOf(tagLabel);
                tags = [...tags.slice(0, index), ...tags.slice(index + 1)];
                addTags();
            }
        })

        input.focus();
        </script>
        @endsection