<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Models\User;
use App\Models\catemodel;


class categoryController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cateindex()
    {
      $data = catemodel::all();
       return response()->json(
            [  'status'->true,                
                'data'-> $data                    
            ]
           ,200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["users"] = catemodel::get();        
        return view ('category')->with($data);
    }

    public function get_data(){
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function catshow($id)
    {
        $cateuser= catemodel::find($id);
         return response()->json($cateuser);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function secshow()
    {
        $cateuser= catemodel::all();
         return response()->json($cateuser);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // ithu edit function
    public function cate_edit($id)
    {
        $cateuser= catemodel::find($id);
       return view('cate_edit',['cateuser'=>$cateuser]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cate_update(Request $request)
    {
        catemodel::where('id', $request->id)            
        ->update([
            'name' => $request->name,
            'status' => $request->status
                     
        ]);
         return "updated";    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function category_destroy($id)
    {
    //    echo $id;exit;
       $cateuser =catemodel::find($id);
       if($cateuser){
        $cateuser->delete();
        return "deleted";

       }
     
    }

    public function category_save(Request $request)
    {
        $cateuser = new catemodel();
        $cateuser->name = $request->name;
        $cateuser->status = $request->status;
        $cateuser->save();
    //    echo  $cateuser;
        return "inserted";
    }
    

    public function news()
    {
        return view('news');
    }

     public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        $data['password'] = bcrypt($request->password);

        $user = User::create($data);

        $token = $user->createToken('API Token')->accessToken;

        return response([ 'user' => $user, 'token' => $token]);
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($data)) {
            return response(['error_message' => 'Incorrect Details. 
            Please try again']);
        }

        $token = auth()->user()->createToken('API Token')->accessToken;

        return response(['user' => auth()->user(), 'token' => $token]);

    }
}
