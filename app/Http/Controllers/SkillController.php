<?php

namespace App\Http\Controllers;


use App\Http\Requests\ListNewSkill;
use App\Http\Requests\SkillAddRequest;
use App\Post;
use App\Skill;
use App\ValueSkill;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Vinkla\Hashids\HashidsManager;

class SkillController extends Controller {

    protected $hashids;

    public function __construct(HashidsManager $hashids)
    {
        $this->hashids = $hashids;
        $this->middleware('auth');
    }

    public function index()
    {
        $valueSkill = ValueSkill::with('skill')->get()->where('user_id', Auth::id(), true);

        return view('Page.BackEnd.Users.Skills.index', compact('valueSkill', 'skill'));

    }


    public function create()
    {
        //$skill = Skill::lists('namaSkill', 'id');
        $skill = Skill::lists('namaSkill', 'id');

        //dd($skill);
        return view('Page.BackEnd.Users.Skills.create', compact('skill'));
    }

    public function addSkill()
    {
        return view('Page.BackEnd.Users.Skills.addSkill');
    }

    public function postNewSkillList(ListNewSkill $request)
    {
        $skill = new Skill();
        $skill->namaSkill = Input::get('namaSkill');

        $skill->save();

        flash()->success('Selamat Mastah, New Skill List berhasil di tambahkan');

        return redirect(url(action('SkillController@create')));
    }


    public function store(SkillAddRequest $request)
    {
        $Skills = new ValueSkill();
        $Skills->user_id = Auth::id();
        $Skills->value = Input::get('value');

        $Skills->save();

        $Skills->skill()->attach($request->input('namaSkill'));

        if (isset($request['save_next']))
        {
            flash()->info('Skill information saved, silahkan tambahkan skill lagi');

            return redirect(url(action('SkillController@create')));
        }
        flash()->overlay('Skill information saved');

        return redirect(url(action('ProfileController@index')));
    }


    public function show($id)
    {

    }


    public function edit(ValueSkill $valueSkill)
    {
        //$valueSkill = ValueSkill::findOrFail($id);
        $sekil = Skill::lists('namaSkill', 'id');

        foreach($valueSkill->skill as $skills){
            $skill = $skills->namaSkill;
        }


        return view('Page.BackEnd.Users.Skills.edit', compact('skill', 'valueSkill','sekil'));
    }


    public function update(Request $request, ValueSkill $valueSkill)
    {
        //$valueSkill = ValueSkill::findOrFail($id);
        $valueSkill->value = $request->get('value');

        $valueSkill->save();
        //dd($valueSkill);
        flash()->success('berhasil update');
        return redirect(url(action('SkillController@index')));
    }


    public function destroy($id)
    {
        //
    }
}
