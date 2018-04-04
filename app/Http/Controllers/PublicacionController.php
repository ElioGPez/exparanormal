<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Pais;
use App\Publicacion;
use Carbon\Carbon;
use App\User;
use App\Imagen;

class PublicacionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return view('publicacion.index');

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $paises=Pais::orderBy('id','asc')->paginate(50);
       // return view('horario.create',compact('servicios','localidades','tipos'));       
        return view('publicacion.create',compact('paises')); 
 
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
       	//dd($request->all());
//obtenemos el campo file definido en el formulario
       	$file = $request->file('file');
 
       //obtenemos el nombre del archivo
       	$nombre = $file->getClientOriginalName();
      // 	$fechaSistema = Carbon::now()->toTimeString();
		$now = new \DateTime();
       	$fechaSistema = $now->format('Y-m-d');
 	   	$nombreBD = $fechaSistema.'_'.$nombre;
 		//dd($nombreBD);
        $imagen = new Imagen();
        $imagen->vinculo = $nombreBD;
        $imagen->ubicacion = 0;
        $imagen->save();
       //indicamos que queremos guardar un nuevo archivo en el disco local
       \Storage::disk('local')->put($nombreBD,  \File::get($file));
 
		//dd($request->all());
		$publicacion = new Publicacion();
		$publicacion->titulo = $request->titulo;
		$publicacion->cuerpo = $request->cuerpo;
		$publicacion->autor = $request->autorT;		
		$publicacion->titulo = $request->titulo;
		$publicacion->fecha = $fechaSistema;
		$publicacion->puntaje = 0;
		$publicacion->parrafos = $request->parrafos;	
		$publicacion->usuario_id = \Auth::user()->id;	
		$publicacion->localidad_id = $request->id_localidad;
		$publicacion->categoria_id = 1;	
		$publicacion->imagenPerfil = $nombreBD;
		$publicacion->save();	
		$publicacion->imagen()->attach($imagen);
		return redirect()->route('publicacion.index');
	}
 
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$publicacion = Publicacion::findOrFail($id);
		//$publicacion->categoria;
		//$publicacion->user;
		/*$publicacion->each(function($publicacion){
			$publicacion->user;
		});*/
		//$publicacion->comentario;


		return view('publicacion.show', compact('publicacion'));

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{


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
