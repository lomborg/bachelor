@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        {{ trans('backpack::base.dashboard') }}<small>Daily insights from instagram account</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">{{ trans('backpack::base.dashboard') }}</li>
      </ol>
    </section>
@endsection


@section('content')

    


    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <!-- <div class="box-title">{{ trans('backpack::base.login_status') }}</div> -->
                    <div class="box-title">Insights</div>
                </div>
                <div class="box-body">
                    <div class="col-md-3">
                        <h3>Today:</h3>
                        <hr>
                        @foreach($insights as $insight)
                            {{ $insight['name'] }} : {{ $insight['values'][1]['value'] }} <hr>
                        @endforeach    
                    </div>
                        
                    <div class="col-md-3">
                    <h3>Yesterday:</h3>
                    <hr>
                    @foreach($insights as $insight)
                        {{ $insight['name'] }} : {{ $insight['values'][0]['value'] }} <hr>
                    @endforeach    

                     </div>
                 </div>
            </div>
        </div>
    </div>
@endsection
