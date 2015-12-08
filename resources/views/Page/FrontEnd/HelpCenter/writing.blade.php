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
        <div class="headline"><h2>Menulis</h2></div>
        <h2>Formatting</h2>
        <p>Mention any Medium user in the body of your post, and they will receive a notification when you publish.
            Simply type @ and begin writing their name. A menu will pop up with a list of matching users, and the name you select will link to their Medium profile from your story.
            (Mentions made in unlisted posts will still notify the user.)</p>
        <p>
            Highlight the text you would like to style and the formatting bar opens: You can bold, italicize, create headers, block quotes, pull quotes (click the quote button twice), and link elsewhere. Formatting can be removed by deselecting the option on the toolbar.

        </p>
        <!--/acc-v1-->
        <!-- End Other Questions -->
    </div><!--/col-md-9-->
@endsection

@section('barKanan')
    @include('Page.FrontEnd.Blog.partials.barKanan')
@endsection

