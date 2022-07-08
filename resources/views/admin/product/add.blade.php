@extends('layouts.app')
@include('layouts.auth_layout')

@section('content')
    <div class="container mt-10">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create') }}</div>

                    <div class="card-body">
                        <form method="post">
                            @csrf
                            <img id="product_photo" class="m-auto" width="400px" height="400px" alt="product_photo">
                            <div class="form-group row mt-2">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @if(session()->get('error') && session()->get('error')->name) is-invalid @endif" name="name" required autocomplete="name" autofocus>

                                    @if(session()->get('error') && session()->get('error')->name)
                                        <div class="alert text-danger mb-0 p-0">{{session()->get('error')->name[0]}}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea id="description" class="form-control @if(session()->get('error') && session()->get('error')->description) is-invalid @endif" name="description" required autocomplete="description"></textarea>

                                    @if(session()->get('error') && session()->get('error')->description)
                                        <div class="alert text-danger mb-0 p-0">{{session()->get('error')->description[0]}}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('Photo') }}</label>

                                <div class="col-md-6">
                                    <input id="photo" type="file" class="form-control @if(session()->get('error') && session()->get('error')->photo) is-invalid @endif" name="photo" required autocomplete="photo" autofocus>

                                    @if(session()->get('error') && session()->get('error')->photo)
                                        <div class="alert text-danger mb-0 p-0">{{session()->get('error')->photo[0]}}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="card list-group-horizontal">
                                <div class="card-header" id="attribute_edit_panel">
                                    <svg id="new_attribute" width="20px" height="20px" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z"/></svg>
                                </div>
                                <div class="card-body" id="add_product_attribute">
                                    <div id="1">
                                        <div class="form-group row mt-1">
                                            <label for="color" class="col-md-4 col-form-label text-md-right">{{ __('Color') }}</label>

                                            <div class="col-md-6 color_input_box">
                                                <input id="color" type="color" class="form-control" name="color" required autocomplete="color" autofocus>

                                            </div>
                                        </div>
                                        <div class="form-group row mt-1 price_input_box">
                                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                                            <div class="col-md-6">
                                                <input id="price" type="number" class="appearance-none form-control" name="Price" required autocomplete="price" autofocus>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>


                            <div class="form-group row mt-2">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                                <div class="col-md-6">
                                    <select name="category_id" id="category_id" class="form-control @if(session()->get('error') && session()->get('error')->category_id) is-invalid @endif">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" >{{$category->name}}</option>
                                        @endforeach
                                    </select>

                                    @if(session()->get('error') && session()->get('error')->category_id)
                                        <div class="alert text-danger mb-0 p-0">{{session()->get('error')->category_id[0]}}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="meta_title" class="col-md-4 col-form-label text-md-right">{{ __('Meta title') }}</label>

                                <div class="col-md-6">
                                    <input id="meta_title" type="text" class="form-control @if(session()->get('error') && session()->get('error')->meta_title) is-invalid @endif" name="meta_title" required autocomplete="meta_title" autofocus>

                                    @if(session()->get('error') && session()->get('error')->meta_title)
                                        <div class="alert text-danger mb-0 p-0">{{session()->get('error')->meta_title[0]}}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="meta_description" class="col-md-4 col-form-label text-md-right">{{ __('Meta description') }}</label>

                                <div class="col-md-6">
                                    <textarea id="meta_description" type="meta_description" class="form-control @if(session()->get('error') && session()->get('error')->meta_description) is-invalid @endif" name="meta_description" required autocomplete="meta_description"></textarea>

                                    @if(session()->get('error') && session()->get('error')->meta_description)
                                        <div class="alert text-danger mb-0 p-0">{{session()->get('error')->meta_description[0]}}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <input type="button" class="btn btn-primary" value="Create" id="submit_button">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var attribute_array = ['1']
        var attribute_json = []
        $(document).on('click', '.delete_attribute', function() {
            $( '#' + $(this).attr("delete_id") ).remove()
            $(this).remove()
            attribute_array.splice(attribute_array.indexOf($(this).attr("delete_id")) , 1 );
        }) ;
        $("#new_attribute").click(function() {
            var d = new Date().getTime();
            attribute_array.push(d.toString())
            $( "#add_product_attribute" ).append(
                '<div id="'+d+'">'+
                    '<div class="form-group row mt-1 color_input_box">'
                        +'<label for="color" class="col-md-4 col-form-label text-md-right">Color</label>'
                        +'<div class="col-md-6">'
                            +'<input id="color" type="color" class="form-control" name="color" required autocomplete="color" autofocus>'
                        +'</div>'
                    +'</div>'
                    +'<div class="form-group row mt-1 price_input_box">'
                       +'<label for="price" class="col-md-4 col-form-label text-md-right">Price</label>'
                        +'<div class="col-md-6">'
                            +'<input id="price" type="number" class="appearance-none form-control" name="Price" required autocomplete="price" autofocus>'
                        +'</div>'
                    +'</div>'
                +'</div>' )
            $("#attribute_edit_panel").append('<svg delete_id="'+d+'" class="mt-1 delete_attribute" width="15px" fill="currentColor" height="15px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8 17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0 81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM31.1 128H416V448C416 483.3 387.3 512 352 512H95.1C60.65 512 31.1 483.3 31.1 448V128zM111.1 208V432C111.1 440.8 119.2 448 127.1 448C136.8 448 143.1 440.8 143.1 432V208C143.1 199.2 136.8 192 127.1 192C119.2 192 111.1 199.2 111.1 208zM207.1 208V432C207.1 440.8 215.2 448 223.1 448C232.8 448 240 440.8 240 432V208C240 199.2 232.8 192 223.1 192C215.2 192 207.1 199.2 207.1 208zM304 208V432C304 440.8 311.2 448 320 448C328.8 448 336 440.8 336 432V208C336 199.2 328.8 192 320 192C311.2 192 304 199.2 304 208z"/></svg>')
        });
        $('#photo').change( function(event) {
            $("#product_photo").attr('src',URL.createObjectURL(event.target.files[0]));
        });
        $("#submit_button").click(function (){
            if($( '#'+attribute_array[0]+'>div>div>:input[type="color"]').val() !="" && $( '#'+attribute_array[0]+'>div>div>:input[type="number"]').val() != ""){
                jQuery.each( attribute_array, function( i, val ) {
                    attribute_json.push({
                        id: val,
                        color: $( '#'+val+'>div>div>:input[type="color"]').val(),
                        price: $( '#'+val+'>div>div>:input[type="number"]').val()
                    })
                });
                var files = $('#photo')[0].files
                var myformData = new FormData();
                myformData.append('_token', $("input[name='_token']").val());
                myformData.append('name', $("#name").val());
                myformData.append('description', $("#description").val());
                myformData.append('photo', files[0]);
                myformData.append('attributes', JSON.stringify(attribute_json));
                myformData.append('category_id', $("#category_id").val());
                myformData.append('meta_title', $("#meta_title").val());
                myformData.append('meta_description', $("#meta_description").val());
                $.ajax({
                    type: "POST",
                    url: '/admin/products',
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: myformData,
                    success: function(response){
                        window.location = '/admin/products'
                    },
                    error: function(response) {
                        location.reload();
                    }
                });
            } else if($( '#'+attribute_array[0]+'>div>div>:input[type="color"]').val() ==""){
                $( '#'+attribute_array[0]+'>div>div:input[type="color"]').addClass('is-invalid')
                $( '#'+attribute_array[0]+'>div>.color_input_box').append('<div class="alert text-danger mb-0 p-0">Field is required</div>')
            } else if($( '#'+attribute_array[0]+'>div>div>:input[type="number"]').val() ==""){
                $( '#'+attribute_array[0]+'>div>div:input[type="number"]').addClass('is-invalid')
                $( '#'+attribute_array[0]+'>div>.price_input_box').append('<div class="alert text-danger mb-0 p-0">Field is required</div>')
            }

        })

    </script>
@endsection
