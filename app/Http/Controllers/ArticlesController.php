<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = \App\Article::latest()->paginate(3);

        // $articles = \App\Article::get();
        // $articles->load('user');//지연로드
        
        // $articles = \App\Article::with('user')->get();//즉시 로드

        return view('articles.index', compact('articles'));

        // return __METHOD__ . '컬렉션 조회';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
        return __METHOD__ . '컬렉셩 만들기 위한 폼을 담은 뷰 반환';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\ArticlesRequest $request)
    {
        $article = \App\User::find(1)->articles()->create($request->all());

        if (! $article) {
            return back()->with('flash_message', '글이 저장되지 않았습니다.')->withInput();
        }

        return redirect(route('articles.index'))->with('flash_message', '작성하신 글이 저장되었습니다.');
    }
    // public function store(Request $request)
    // {
    //     $rules = [
    //             'title' => ['required'],
    //             'content' => ['required', 'min:6'],
    //     ];

    //     $messages = [
    //         'title.required' => '제목은 필수 입력 항목입니다.',
    //         'content.required' => '본문은 필수 입력 항목 입니다.',
    //         'content.min' => '본문은 최소 :min 글자 이상이어야 합니다.'
    //     ];

    //     $this->validate($request, $rules, $messages);
    //     // $validator = \Validator::make($request->all(), $rules, $messages);

    //     if ($validator->fails()) {
    //         return back()->withErrors($validator)->withInput();
    //     }

    //     $article = \App\User::find(1)->articles()->create($request->all());

    //     if (! $article) {
    //         return back()->with('flash_message', '글이 저장되지 않았습니다.')->withInput();
    //     }

    //     return redirect(route('articles.index'))->with('flash_message', '작성하신 글이 저장되었습니다.');
    //     // return __METHOD__ . '사용자가 입력한 폼 데이터로 새로운 컬렉션 생성';
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return __METHOD__ . $id . ' 값을 가진 모델 조회';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return __METHOD__ . $id . ' 값을 가진 모델 수정하기 위한 폼을 담은 뷰 반환';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return __METHOD__ . $id . ' 값을 가진 모델 수정';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return __METHOD__ . $id . ' 값을 가진 모델 삭제';
    }
}
