@extends('Page.FrontEnd.Home.HalamanUtama')

@section('content')

    <div class="container content center_div">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('flash::message')
                {!! Form::open(['url'=>'admin/request-tutorial','class'=>'sky-form']) !!}

                    <header>Form Request Tutorial</header>
                    <fieldset>
                        <section>
                            <label class="label">Title</label>
                            <label class="input">
                                <input type="text" name="title">
                            </label>
                        </section>

                        <section>
                            <label class="label">Description</label>
                            <label class="textarea textarea-expandable">
                                <textarea name="description" rows="3"></textarea>
                            </label>
                            <div class="note"><strong>Note:</strong> Tulis Request tutorial dengan singkat dan jelas,
                            Ini adalah request tutorial, karena keterbatasan skill kami, maka tidak semua akan kami uprove, Namun
                                Kami akan berusaha dengan semaksimal mungkin untuk membantu menjawab Request Mastah, atau bisa juga
                                kami lempar ke forum agar Mastah-mastah yang lain diharapkan bisa ikut membantu.

                                Terimakasih
                            </div>
                        </section>

                        <section>
                            {!! app('captcha')->display() !!}
                        </section>

                    </fieldset>

                    <footer>
                        <button type="submit" class="btn-u">Submit</button>
                        <button type="button" class="btn-u btn-u-default" onclick="window.history.back();">Back</button>
                    </footer>

                {!! Form::close() !!}
                <br>
                @include('Page.partials.alertValidasi')
            </div>
        </div>
    </div>

@endsection
