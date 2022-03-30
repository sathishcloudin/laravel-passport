<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\News;
use App\Models\catemodel;
use App\Users;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // entha cat irukura object marri athaiya news.blade.php 309 line la use panni iruken  
        $data['cat'] = catemodel::where('status','1')->get();                                
        // entha news_data irukura object marri athaiya news.blade.php 358 line la use panni iruken  
        $data['news_data'] = News::leftjoin('catemodels','catemodels.id', '=','news.category_id')
                                ->get(['news.*','catemodels.name']);
        //var_dump($data['news']);die();                                
        return view ('news')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createq()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function listshow($id)
    {
        $Newsuser= News::find($id);
        return response()->json($Newsuser);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function newhow()
    {
        $Newsuser= News::all();
        return response()->json($Newsuser);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // ithu edit function
    public function edit($id)
    {
        $Newsuser= news::find($id);
       return view('edit',['Newsuser'=>$Newsuser]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // ithu update function
    public function update(Request $request)
    {
        news::where('id', $request->id)            
            ->update([
                'category_id' => $request->category_id,
                'news_title' => $request->news_title,
                'news_discussion' => $request->news_discussion               
            ]);
            return "updated";
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // enga edit function
        $Newsuser =News::find($id);
        // var_dump($Newsuser);die;
        $Newsuser->delete();
        
        
    }
    // after line web.php la iruku news_save oda insert query 
    public function news_save(Request $request)
    {
        $data = $request->all();
        News::create($data);
        //     $Newsuser = new News();
        //     $Newsuser->category_id = $request->category_id;
        //     $Newsuser->news_title = $request->news_title;
        //     $Newsuser->news_discussion = $request->news_discussion;
        //     $Newsuser->save();
        //    echo  $Newsuser;
        return "inserted";
    }


    public function news_view()
    {        

        $Newsuser = News::select('id','name')->get();
        return view('News');
    }
}
