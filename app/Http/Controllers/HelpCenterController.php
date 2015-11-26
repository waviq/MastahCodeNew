<?php

namespace App\Http\Controllers;

use App\Http\Requests;

class HelpCenterController extends Controller
{
    public function index()
    {
        return view('Page.FrontEnd.HelpCenter.index');
    }

    public function showFaqs()
    {
        $faqs = FAQs::all();

        return view('Page.FrontEnd.FAQs.index', compact('faqs'));
    }
}
