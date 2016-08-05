<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;



use App\Http\Requests;

use Flash;

use App\Horse;

use App\Image;

use App\Category;

use App\User;

use Auth;

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

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function getAllHorses()

    {

        $horses = Horse::orderBy('created_at','DESC')->paginate(4);

        $horses->each(function($horses){

            $horses->images;

            $horses->category;

            $horses->user;

        });      

        return view('front.index')->with('horses',$horses);

    }

    public function getAllHorses2()

    {

        $horses = Horse::orderBy('created_at','DESC')->paginate(8);

        $horses->each(function($horses){

            $horses->images;

            $horses->category;

            $horses->user;

        });      

        return view('front.show-all')->with('horses',$horses);

    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        $categories = Category::orderBy('nombre','ASC')->lists('nombre','id');

        return view('back.horses.create')->with('categories',$categories);

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

        $horse = new Horse($request->except('images','categoria'));

        //associate  user with horse

        $user = User::find(Auth::user()->id);

        $horse->user()->associate($user);

        $horse->save();

        //associate category with horse

        $category = Category::find($request['category_id']);

        $horse->category()->associate($category);

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

        return redirect()->route('admin.caballos.index');

    }



    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($slug)

    {

        $horse = Horse::where('slug',$slug)->get()->first();

        return view('front.show')->with('horse',$horse);

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

        $categories = Category::orderBy('nombre','ASC')->lists('nombre','id');

        $horse->images->each(function($horse){

            $horse->images;

        });

        return view('back.horses.edit')->with('horse',$horse)->with('categories',$categories);

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

        $extenal_id = date('His'); // i have created my own id for multiple images.

        $category = Category::find($request['categoria']);

        $horse = Horse::find($id);

        $horse->category()->associate($category);

        $horse->fill($request->all());

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

        Flash::message('Caballo Editado!');

        return redirect()->back();

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroyHorse(Request $request,$id)

    {

        $horse = Horse::find($id);

        foreach($horse->images as $image){

            $myimage = "img/horses/slider_".$image->nombre;

            $myimageThumb = "img/horses/thumbs/thumb_".$image->nombre;

            \File::delete([

                $myimage,

                $myimageThumb

            ]);

        }

        $image->delete();

        $horse->delete();

        return response()->json(['msg'=>'success']);

    }

}

