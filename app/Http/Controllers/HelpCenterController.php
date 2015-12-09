<?php

namespace App\Http\Controllers;

use App\FAQs;
use App\Http\Requests;
use OpenGraph;
use SEOMeta;
use Twitter;

class HelpCenterController extends Controller
{
    public function index()
    {
        $this->SeoHelpCenter();
        return view('Page.FrontEnd.HelpCenter.index');
    }

    public function indexBack()
    {
        return view('Page.BackEnd.HelpCenter.index');
    }

    public function showFaqs()
    {
        $faqs = FAQs::all();

        return view('Page.FrontEnd.FAQs.index', compact('faqs'));
    }

    private function SeoHelpCenter()
    {
        SEOMeta::setDescription('Pertanyaan, kritik dan saran atau bugs? Email us mastahcode@gmail.com');
        SEOMeta::addKeyword(['pertanyaan', 'kritik', 'saran', 'bugs', 'email', 'mastahcode@gmail.com']);
        OpenGraph::setDescription('Pertanyaan, kritik dan saran atau bugs? Email kami di mastahcode@gmail.com');
        OpenGraph::setTitle('Help Center|Mastahcode.com');
        OpenGraph::setUrl(url(action('HelpCenterController@index')));
        OpenGraph::setSiteName('mastahcode.com');
        OpenGraph::addProperty('type', 'Help');

        Twitter::setTitle('Help Center|Mastahcode.com');
        Twitter::setDescription('Pertanyaan, kritik dan saran atau bugs? Email kami di mastahcode@gmail.com');
        Twitter::setSite('@mastahcode');
        Twitter::setUrl(url(action('HelpCenterController@index')));
        Twitter::setType('Help');
    }
}
