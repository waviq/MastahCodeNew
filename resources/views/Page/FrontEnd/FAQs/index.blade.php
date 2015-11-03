@extends('Page.FrontEnd.Blog.BlogTemplate')

@section('title')
    Kumpulan artikel tutorial|Mastahcode.com
@endsection

@section('meta')
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
@endsection

@section('content')
    <div class="col-md-9">
        <div class="headline"><h2>General Questions</h2></div>
        <div class="panel-group acc-v1 margin-bottom-40" id="accordion">
            @foreach($faqs as $key => $faq)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                               href="#{{$faq->id}}">
                                {{$key+1}}. {{$faq->title}}
                            </a>
                        </h4>
                    </div>
                    <div id="{{$faq->id}}" class="panel-collapse collapse">
                        <div class="panel-body">
                            {!!$faq->isi!!}
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
        <!--/acc-v1-->
        <!-- End Other Questions -->
    </div><!--/col-md-9-->
@endsection

@section('barKanan')
    @include('Page.FrontEnd.Blog.partials.barKanan')
@endsection

