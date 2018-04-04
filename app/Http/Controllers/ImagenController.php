<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Imagen;
use Carbon\Carbon;

class ImagenController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
       return view('imagen.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		dd($request->all());
//obtenemos el campo file definido en el formulario
       	$file = $request->file('file');
 
       //obtenemos el nombre del archivo
       	$nombre = $file->getClientOriginalName();
      // 	$fechaSistema = Carbon::now()->toTimeString();
		$now = new \DateTime();
       	$fechaSistema = $now->format('d-m-Y');
       	//dd($fechaSistema);
 	   	$nombreBD = $fechaSistema.'_'.$nombre;
 		//dd($nombreBD);
        $imagen = new Imagen();
        $imagen->vinculo = $nombreBD;
        $imagen->ubicacion = 0;
        $imagen->save();
       //indicamos que queremos guardar un nuevo archivo en el disco local
       \Storage::disk('local')->put($nombreBD,  \File::get($file));
 
		return redirect()->route('imagen.index')->with('message', 'Archivo guardado!!');	}

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
	public function destroy($id)
	{
		//
	}

}
