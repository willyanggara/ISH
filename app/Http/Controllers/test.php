<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\laravel;

use App\pesan;

use App\berita;

use App\message;

use Illuminate\Support\Facades\Input;

class test extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("home");
    }


    public function form()
    {
        return view("insertForm");
    }


    public function news()
    {

        return view("news");
    }


    public function about()
    {
        return view("about");
    }


    public function service()
    {
        return view("service");
    }


    public function icash()
    {
        return view("icash");
    }


    public function contact()
    {
        return view("contact");
    }


    public function clients()
    {
        return view("clients");
    }



//admin
    public function writenews()
    {
        return view("writenews");
    }

    public function dashboard()
    {

        return view("dashboard");
    }

    public function applied()
    {

        return view("applied");
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
        $user = new laravel;
        $user -> name = Input::get("name");
        $user -> email = Input::get("email");
        $user -> gender = Input::get("gender");
        $user -> birth = Input::get("birth");
        $user -> phone = Input::get("phone");
        $user -> address = Input::get("address");
        $user -> pilihan = Input::get("pilihan");


        if(Input::hasFile('image')){
          $file = Input::file('image');
          $file -> move(public_path().'/CV/', $file->getClientOriginalName());

          $user -> title = $file -> getClientOriginalName();
          $user -> size = $file -> getClientsize();
          $user -> type = $file -> getClientMimeType();
        }

        $user -> save();


        return redirect("form");
    }


    public function kirim(Request $request)
    {
      $this->validate($request, [
          'name'      => 'required|string|min:5:|max:35',
          'email'     => 'required|string|min:5:|max:35',
          'messages'  => 'required|string|min:5:|max:100',
      ],[
          'name.required'   =>'name required',
          'email.required'   =>'email required',
          'messages.required'   =>'what is your messages',

      ]);

        $user = new message([
          'name'      => $request->get('name'),
          'email'      => $request->get('email'),
          'messages'      => $request->get('messages')

        ]);


        $user -> save();


        return back()->with('msgdelivered','ur messages delivered');
    }


    public function insertNews(Request $request)
    {
        $user = new berita;
        $user -> author = Input::get("author");
        $user -> title = Input::get("title");
        $user -> topic = Input::get("topic");
        $user -> content = Input::get("content");


        if(Input::hasFile('gambar')){
          $file = Input::file('gambar');
          $file -> move(public_path().'/gambar/', $file->getClientOriginalName());

          $user -> titleimg = $file -> getClientOriginalName();
          $user -> size = $file -> getClientsize();
          $user -> type = $file -> getClientMimeType();
        }

        $user -> save();


        return redirect("writenews");
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

//show data on admin
    public function showall()
    {
        $user =berita::all();
        return view('writenews',compact('user'));
    }


    public function showmsg()
    {
        $user =message::all();
        return view('dashboard',compact('user'));
    }

    function showmsgid($id) {
      $show = messages::find($id);

    return view('dashboard', compact('show'));
    }

//show applied pegawai
    public function showapplied()
    {
        $user =laravel::all();
        return view('applied',compact('user'));
    }

// tampilan news
    public function lihat()
    {
        $user =berita::all();
        return view('news',compact('user'));
    }

    public function lihatjobs($topic)
    {
        $user = berita::findorfail($topic);
        return view('lihat',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = berita::table()->where('id',$id)->delete();
        return redirect('/writenews');
  }


    //delete News

}
