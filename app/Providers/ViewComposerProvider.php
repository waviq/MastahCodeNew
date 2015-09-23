<?php

namespace App\Providers;

use App\CommentDisqus;
use App\Kategori;
use App\Post;
use Illuminate\Support\ServiceProvider;

class ViewComposerProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->Footer();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function Footer()
    {
        view()->composer('Page.partials.Footer', function ($view)
        {
            $view->with('posting', Post::latest('created_at')->take(3)->get());
        });

        view()->composer('Page.FrontEnd.Blog.partials.barKanan', function ($view)
        {
            $view->with('recentPost', Post::latest('created_at')->paginate(4));
            $view->with('kate', Kategori::all());
            $view->with('posted', Post::with('kategori')->first());
            $view->with('comment',CommentDisqus::latest('date')->take(7)->get());
        });


    }
}
