<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\Decoration;
use App\Music;
use App\Theme;
use App\Colors;
use App\Design;

class DecorationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $decoration = Decoration::all();
        $data = array(
             'decoration' => $decoration,
             'count'    => Decoration::count(),
         );
   
          return view('decorations.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        foreach(Music::all() as $ms){$decoration[]= $ms -> name;}
        foreach(Colors::all() as $cs){$decoration[]= $cs -> name;}
        foreach(Design::all() as $ds){$decoration[]= $ds -> name;}
        foreach(Theme::all() as $ts){$decoration[]= $ts -> name;}
             $data = array(
                 'decoration' => $decoration,
             );
         return view('decorations.create')->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //validate the data
         $this->validate($request,array(
             'music_fk'        => 'required',
             'theme_fk'         => 'required',
             'design_fk'        => 'required',
             'color_fk'         => 'required',
             'body'          => 'required'
             ));

        // // store in the database
         $decoration = new Decoration;

         $decoration -> music_fk       = $request -> music_fk;
         $decoration -> theme_fk        = $request -> theme_fk;
         $decoration -> design_fk       = $request -> design_fk;
         $decoration -> color_fk        = $request -> color_fk;
         $decoration -> body         = $request -> body;
         $decoration-> price   = $request -> price;
          
        $decoration -> save();

        Session::flash('succsess', 'Pridėtas naujas dekoras.');
        //redirect to another page
        return redirect() -> route('decorations.show', $decoration->id);          
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $decoratio=Decoration::find($id);      
            $data = array(
                 'decoratio' => $decoratio,
             );
         return view('decorations.show')->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
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
        $this->validate($request,array(
             'price'         => 'required|max:4',
             'body'          => 'required',
             'music_fk'        => 'required',
             'theme_fk'         => 'required',
             'design_fk'        => 'required',
             'color_fk'         => 'required'
     ));

         // Save to the database
         $decoration = Decoration::find($id);

        $decoration -> music_fk       = $request -> music_fk;
         $decoration -> theme_fk        = $request -> theme_fk;
         $decoration -> design_fk       = $request -> design_fk;
         $decoration -> color_fk        = $request -> color_fk;
         $decoration -> body         = $request -> body;
         $decoration-> price   = $request -> price;
        
           $decoration -> save();
         //set flash data with success message
           Session::flash('succsess', 'Informacija atnaujinta');
        // redirect wth flash data to decorations.show
           return redirect() -> route('decorations.show', $decoration->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id2)
    {
         $decoration = Decoration::find($id2);
         $dcoration->delete();
         Session::flash('succsess', 'Dekoras pašalinta');
         return redirect()->route('decorations.index');
    }
}
