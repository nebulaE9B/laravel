<?php namespace App\Http\Controllers;

use Input;
use Redirect;

use App\Lottery;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class LotteriesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	protected $rules = [
        'name' => ['required'],
        'hh' => ['required'],
        'mm' => ['required'],
    ];

	public function index()
	{
		$lotteries = Lottery::all();
		return view('lotteries.manage', compact('lotteries'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, $this->rules);
        $input = Input::all();
        if($input['hh'] < 10 ){
        	$input['hh'] = "0". $input['hh']; 
        }

        if($input['mm'] < 10){
        	$input['mm'] = "0". $input['mm']; 
        }

        $time = $input['hh'] . $input['mm'];

        $input['draw_time'] = $time;

        unset($input['hh']);
        unset($input['mm']);

        // dd($input);

        Lottery::create( $input );
     
        return view('lotteries.manage')->with('message', 'Lottery data created');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Lottery $lottery)
	{
		$project->delete();

	}

}
