@extends('Page.FrontEnd.Blog.BlogTemplate')

@section('title')
    Help Center|Mastahcode.com
@endsection

@section('meta')
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
@endsection

@section('content')

    <div class="heading heading-v1 margin-bottom-30">
        <h2><span class="color-green">Help Center</span> Mastahcode</h2>

        <p>Pertanyaan, kritik dan saran atau ada bug? Email us: waviq.subkhi@gmail.com
        </p>
    </div>

    <a href="{{url(action('FAQsController@indexFront'))}}">
        <div id="gambarFaqs" class="col-md-6">
            <h2><span class="spacer">FAQs</span>
                <br>Mastah punya pertanyaan,
                <br>kami punya jawaban.
            </h2>
        </div>
    </a>

    <a href="{{url(action('WritingController@indexFront'))}}">
        <div id="gambarWriting" class="col-md-6">
            <h2><span class="spacer">Writing</span><br>Bagikan ilmu Mastah
                <br>untuk kami,
                <br>karenya kami
                <br>membutuhkanya.</h2>
        </div>
    </a>


    <div id="gambarReading" class="col-md-6">
        <h2><span class="spacer">Reading</span></h2>
    </div>

    <div id="gambarProfile" class="col-md-6">
        <h2><span class="spacer">Profile and Setting</span></h2>
    </div>

@endsection



