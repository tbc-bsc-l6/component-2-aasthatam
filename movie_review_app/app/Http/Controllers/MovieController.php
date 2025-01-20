<?php

namespace App\Http\Controllers;
use App\Models\Movie;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{
    public function index(){
        $movies = Movie::orderBy('created_at','DESC')->paginate(3);


        return view('movies.list',[
            'movies' => $movies
        ]);
    }

    public function create(){
        return view('movies.create');
    }

    public function store(Request $request){

        $rules=[
            
                'title'=> 'required|min:3',
                'director'=> 'required|min:3',
                'status'=> 'required',
            
        ];

        if(!empty($request->image)){
            $rules['image']='image';
        }

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()){
            return redirect()->route('movies.create')->withInput()->withErrors($validator);
        }

        $movie = new Movie();

        $movie->title = $request->title;
        $movie->description = $request->description;
        $movie->director = $request->director;
        $movie->status = $request->status;
        $movie->save();

        if (!empty($request->image)){

            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time().'.'.$ext;
            $image->move(public_path('uploads/movies'),$imageName);

            $movie->image = $imageName;
            $movie->save();
        }

        return redirect()->route('movies.index')->with('success','Movie added successfully!');
    }
    

    public function edit($id){
        $movie = Movie::findOrFail($id);
        return view('movies.edit',[
            'movie' => $movie
        ]);
    }

    public function update($id, Request $request){
        $movie = Movie::findOrFail($id);

        $rules=[
            
            'title'=> 'required|min:5',
            'director'=> 'required|min:3',
            'status'=> 'required',
        
    ];

    if(!empty($request->image)){
        $rules['image']='image';
    }

    $validator = Validator::make($request->all(),$rules);

    if ($validator->fails()){
        return redirect()->route('movies.edit',$movie->id)->withInput()->withErrors($validator);
    }

    $movie->title = $request->title;
    $movie->description = $request->description;
    $movie->director = $request->director;
    $movie->status = $request->status;
    $movie->save();

    if (!empty($request->image)){

        File::delete(public_path('uploads/books/'.$movie->image));

        $image = $request->image;
        $ext = $image->getClientOriginalExtension();
        $imageName = time().'.'.$ext;
        $image->move(public_path('uploads/movies'),$imageName);

        $movie->image = $imageName;
        $movie->save();
    }

    return redirect()->route('movies.index')->with('success','Movie updated successfully!');
        
    }

    public function destroy(Request $request){
        $movie = Movie::find($request->id);

        if($movie == null) {
            session()->flash('error', 'Movie not found');
            return response()->json([
                'status' => false,
                'message' => 'Movie not found'
            ]);
        } else{
            File::delete(public_path('uploads/movies/'.$movie->image));
            $movie->delete();

            session()->flash('success', 'Movie deleted successfully.');
            return response()->json([
                'status' => true,
                'message' => 'Movie deleted successfully.'
            ]);
        }
    }
}
