<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;

class PhotosController extends Controller
{

    public function __construct(){
        //allow these actions without login
        $this->middleware('auth');
    }


    public function index()
    {
        //get all photos by this user
        $photos=Photo::where('user_id',auth()->user()->id)
            ->orderBy('created_at','desc')->get();

        return view('photos.index')->with('photos',$photos);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('photos.create');

        return view('photos.upload');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //problem here
    public function store(Request $request)
    {
        //validation
        $this->validate($request,[
            'photo'=>'image|max:3999'
        ]);

        $user_id=auth()->user()->id;

        //handle the file upload
        $filenametostore=$this->uploadFile($request);


        //save record
        $photo=new Photo;
        //get the input

        //if the title is empty set it to the rfile name
        if(empty($request->input('title'))){
            $photo->title=$request->file('photo')->getClientOriginalName();
        }
        else{
            $photo->title=$request->input('title');
        }

        $photo->description=$request->input('description');
        $photo->size=$request->file('photo')->getClientSize();
        $photo->photo=$filenametostore;

        //user_id
        $photo->user_id=auth()->user()->id;

        //save it
        $photo->save();

        //flash message and redirect
        return redirect('/photos/')->with('success','photo Saved ');
    }


    /**
     * @param $request
     * @return string
     * handle the file upload
     */
    function uploadFile($request){

        try{
            $user_id=auth()->user()->id;

            //get file name with ext
            $filenamewithext=$request->file('photo')->getClientOriginalName();

            //get just the filename
            $filename=pathinfo($filenamewithext,PATHINFO_FILENAME);

            //get the ext only
            $ext=$request->file('photo')->getClientOriginalExtension();

            //create new filename
            $filenametostore=$filename.'-'.time().'.'.$ext;

            //upload image in storage/public/photo/user_id/filename
            $path=$request->file('photo')->storeAs('public/photos/'.$user_id,$filenametostore);

            return $filenametostore;
        }
        catch(Exception $e){
            return false;
        }
    }

    /*
    function uploadFile2($request){
        $file = $request->file('file');

        $name = time().$file->getClientOriginalName();

        Photo::create(['file'=>$name]);

        $file->move('imagesxxx',$name);
    }*/

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        //get the record
        $photo=Photo::find($id);
        //return the view
        return view('photos.show')
            ->with('photo',$photo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //show the edit form
    public function edit($id)
    {
        $photo=Photo::find($id);
        return view('photos.edit')
            ->with('photo',$photo);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //update the data from the edit form

    public function update(Request $request, $id)
    {
        //validation
        $this->validate($request,[
            'photo'=>'required',
            'title'=>'required'
        ]);

        $photo=Photo::find($id);

        //get the input
        /**$photo->name=$request->input('name');
        $photo->email=$request->input('email');
        $photo->website=$request->input('website');
        $photo->address=$request->input('address');
        $photo->phone=$request->input('phone');
        $photo->bio=$request->input('bio');
        $photo->user_id=auth()->user()->id;

        //save it
        //$photo->save();
         **/

        //mass alignment save all inut fields
        $photo->update($request->all());

        //flash message and redirect
        return redirect('/photos')
            ->with('success','Updated');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo=Photo::find($id);
        $photo->delete();

        //flash message and redirect
        /*return redirect('/')
            ->with('success',' deleted');*/
    }
}
