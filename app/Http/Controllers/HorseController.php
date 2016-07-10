<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Flash;
use App\Horse;
use App\Image;
class HorseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $horses = Horse::orderBy('created_at','DESC')->paginate(5);
        $horses->each(function($horses){
            $horses->images;
        });
        return view('back.horses.index')->with('horses',$horses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.horses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $extenal_id = date('His'); // i have created my own id for multiple images.
        $horse = new Horse($request->except('images'));
        $horse->save();
        //Images save.
        $picture = '';
        if ($request->hasFile('images')) {
            $files = $request->file('images');
            foreach($files as $file){
                //image data
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $picture = date('His').'_'.$filename;                
                //make images sliders
                $image=\Image::make($file->getRealPath()); //Call image library installed.
                $destinationPath = public_path().'/img/horses/';
                $image->resize(1300, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image->save($destinationPath.'slider_'.$picture);
                //make images thumbnails
                $image2=\Image::make($file->getRealPath()); //Call image library installed.

                $thumbPath = public_path().'/img/horses/thumbs/';
                $image2->resize(350, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image2->save($thumbPath.'thumb_'.$picture);
                //save image information on the db.
                $imageDb = new Image();
                $imageDb->nombre = $picture;
                $imageDb->horse()->associate($horse);
                $imageDb->save();              
            }
        }
        Flash::message('Caballo Creado!');
        return redirect()->route('admin.caballo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $horse = Horse::find($id);
        $images = new Image();
        $horse->images->each(function($horse){
            $horse->images;
        });
        return view('back.horses.edit')->with('horse',$horse);
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
        $horse = Horse::find($id);
        $horse->delete();
        Flash::error('Caballo eliminado');
        return redirect()->route('admin.caballo.index');
    }
}
