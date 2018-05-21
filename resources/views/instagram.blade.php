@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        Instagram widget manager<small>setup for widgets</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">Instagram widget</li>
      </ol>
    </section>
@endsection


@section('content')

     <style type="text/css">

            .instagram-widget .row {
                margin-left: auto;
                margin-right: auto;
                margin-bottom: 20px;
            }

            .instagram-widget .row:after {
                content: "";
                display: table;
                clear: both;
            }

            .instagram-widget .row .col {
                float: left;
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
                padding: 0 .75rem;
                min-height: 1px;
            }

            .instagram-widget .row .col.s12 {
                width: 100%;
                margin-left: auto;
                left: auto;
                right: auto;
                max-width: 600px;
            }

            .instagram-widget .row .card {
                position: relative;
                margin: .5rem 0 1rem 0;
                background-color: #fff;
                -webkit-transition: -webkit-box-shadow .25s;
                transition: -webkit-box-shadow .25s;
                transition: box-shadow .25s;
                transition: box-shadow .25s, -webkit-box-shadow .25s;
                border-radius: 2px;

                  box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);
            }

            .instagram-widget .hoverable:hover{-webkit-box-shadow:0 8px 17px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);box-shadow:0 8px 17px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19)}

            .instagram-widget .row .black-text {
                color: black !important;
            }

            .instagram-widget .row img.responsive-img {
                max-width: 100%;
                height: auto;
            }

            .instagram-widget .row .padding-10 {
                padding: 10px !important;
            }

            .instagram-widget .row .truncate {
                display: block;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }


            .instagram-widget .row .col.s6 {
                width: 50%;
                margin-left: auto;
                left: auto;
                right: auto;
            }

            .instagram-widget .row .right-align {
                text-align: right;
            }

            .instagram-widget .row .instagram-card {
              padding: 0 !important;
            }

            .instagram-widget .row .padding-10{
              padding: 10px !important;
            }

            .instagram-widget .row .col.s3 {
                width: 25%;
                margin-left: auto;
                left: auto;
                right: auto;
            }

            .instagram-widget-icon {
              width: 16px;
            }

        </style>
        
<div class="row">

    <div class="col-md-12">

        <div class="box box-default">
        
            <div class="box-header with-border">
                
                <h3 class="box-title">Instructions</h3>
                
                <div class="box-tools pull-right">
                        
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                </div>

            </div>

            <div class="box-body">
                something something 
            </div>
        </div>

    </div>

</div>
<div class="row">

    <div class="col-md-12">

        <div class="box box-default">
        
            <div class="box-header with-border">
                
                <h3 class="box-title">Implementation</h3>
                
                <div class="box-tools pull-right">
                        
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                </div>

            </div>

            <div class="box-body">
                <textarea id="intelligo-instagram-widget-code" readonly rows="3" class="form-control"></textarea>
                <br>
                <div class="btn btn-success" id="copy-button">Click here to copy code</div>
            </div>
        </div>

    </div>

</div>



<div class="row">
    
    <div class="col-md-12">
        
        <div class="box box-default">

            <div class="box-header with-border">
                
                <h3 class="box-title">Instagram widget options</h3>

                <div class="box-tools pull-right">
                    
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                
                </div>

            </div>
        
            <div class="box-body">
                
                <div class="formgroup">

                    <label for="columns">Columns</label>

                    <select class="form-control instagram_preference" name="columns" id="columns">
                        <option value="1">1 column</option>
                        <option value="2">2 columns</option>
                        <option value="3" selected="selected">3 columns</option>
                        <option value="4">4 columns</option>
                        <option value="5">5 columns</option>
                    </select>


                </div>

                <div class="formgroup">

                    <label for="rows">Rows</label>

                    <select class="form-control instagram_preference" name="rows" id="rows">
                        <option value="1">1 row</option>
                        <option value="2" selected="selected">2 rows</option>
                        <option value="3">3 rows</option>
                        <option value="4">4 rows</option>
                    </select>


                </div>

                <div class="formgroup">

                    <label for="image_wrap">Image wrapping</label>

                    <select class="form-control instagram_preference" name="image_wrap" id="image_wrap">
                        <option value="1" selected="selected">Classic - with information</option>
                        <option value="2">Only images</option>
                    </select>

                </div>
            
            </div>

        </div>

    </div>
    
</div>


<div class="row">

    <div class="col-md-12">
        
        <div class="box box-default">
        
            <div class="box-header with-border">
            
                <h3 class="box-title">Preview</h3>
            
                <div class="box-tools pull-right">
                    
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                </div>
            
            </div>
            
            <div class="box-body">
                
                <div id="intelligo-instagram-feed-container"></div>
            
            </div>

        </div>

    </div>

</div>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <!-- <div class="box-title">{{ trans('backpack::base.login_status') }}</div> -->
                    <div class="box-title">Instagram widget preview</div>
                </div>

                <div class="box-body">
                       

                  <div class="instagram-widget">
                  <div class="row">

                  @foreach($feed as $img)
                      
                      
                      <div class="col s3">
                        <a href=" {{ $img['permalink'] }} " class="black-text" target="_blank">
                          <div class="col s12 m12 l12 card instagram-card hoverable">
                            <div>
                              <img src="{{ $img['media_url'] }}" class="responsive-img card-img">
                            </div>
                            
                            
                          
                          </div>
                        </a>
                      </div>
                      
                      @if ($loop->iteration % 4 == 0)
                          
                          </div>
                          
                          <div class="row">
                        
                        @endif


                  @endforeach
                  </div>
                  </div>


                </div>
            </div>
        </div>
    </div>
@endsection

@section('after_scripts')


<script type="text/javascript">

    $(".instagram_preference").change(function() {
            feedIt();
    });

    $("#copy-button").click(function(){
        $("#intelligo-instagram-widget-code").select();
        document.execCommand("Copy");
    });

    feedIt();

    function feedIt(){
        var container = $("#intelligo-instagram-feed-container");
        var columns = $('#columns').val();
        var rows = $('#rows').val();
        var image_wrap = $('#image_wrap').val();

        var sUrl = "{{ env('APP_URL') }}/instagramwidget/{{ Auth::user()->id }}/"+columns+"/"+rows+"/"+image_wrap+"/{{ Auth::user()->graph_instagram_id }}";
        $.getJSON(sUrl, function(data) {
            container.empty();
            container.append(data.html);
        });

        var codeContainer = $("#intelligo-instagram-widget-code");
        codeContainer.empty();
        var theCode = '<div id="intelligo-instagram-widget-container" widget_id="{{ Auth::user()->id }}" columns="'+columns+'" rows="'+rows+'" wrap="'+image_wrap+'" widget="{{ Auth::user()->graph_instagram_id }}"></div><script type="text/javascript" src="{{ env("APP_URL") }}/instagram.js"></scr'+'ipt>';
        codeContainer.text(theCode);

    }

</script>

@endsection