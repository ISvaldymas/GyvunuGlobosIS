<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use App\Entertainment;
use App\Activity;
use App\Theme;

class EntertainmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entertainments = Entertainment::all();
        $data = array(
             'entertainments' => $entertainments,
             'count'    => Entertainment::count(),
         );
   
          return view('entertainments.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        foreach(Activity::all() as $ce){$entertainment[]= $ce -> name;}
        foreach(Theme::all() as $ec){$entertainments[]= $ec -> name;}
             $data = array(
                 'entertainment' => $entertainment,
                 'entertainments' => $entertainments,
             );
         return view('entertainments.create')->with('data', $data);
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
             'activity_fk'        => 'required',
             'theme_fk'         => 'required',
             'body'          => 'required'
             ));

        // // store in the database
         $entertainment = new Entertainment;

         $entertainment -> activity_fk       = $request -> activity_fk;
         $entertainment -> theme_fk        = $request -> theme_fk;
         $entertainment -> body         = $request -> body;
         $entertainment-> duration   = $request -> duration;
         $entertainment-> price   = $request -> price;
          
        $entertainment -> save();

        Session::flash('succsess', 'Pridėta nauja pramoga.');
        //redirect to another page
        return redirect() -> route('entertainments.show',$entertainment->id);          
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entertainment=Entertainment::find($id);      
            $data = array(
                 'entertainment' => $entertainment,
             );
         return view('entertainments.show')->with('data',$data);
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
            'duration'        => 'required',
             'price'         => 'required|max:4',
             'body'          => 'required',
             'activity_fk'  => 'required',
             'theme_fk'  => 'required'
     ));

         // Save to the database
         $entertainment = Entertainment::find($id);

        $entertainment -> activity_fk       = $request -> activity_fk;
         $entertainment -> theme_fk        = $request -> theme_fk;
         $entertainment -> body         = $request -> body;
         $entertainment-> duration   = $request -> duration;
         $entertainment-> price   = $request -> price;
        
           $entertainment -> save();
         //set flash data with success message
           Session::flash('succsess', 'Informacija atnaujinta');
        // redirect wth flash data to entertainments.show
           return redirect() -> route('entertainments.show', $entertainment->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id2)
    {
         $entertainment = Entertainment::find($id2);
         $entertainment->delete();
         Session::flash('succsess', 'Pramoga pašalinta');
         return redirect()->route('entertainments.index');
    }
}
