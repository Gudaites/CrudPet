<?php

namespace App\Http\Controllers;

use \Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Pet;
use Illuminate\Support\Facades\Validator;
use Throwable;

class PetController extends Controller
{
    public function index(Request $request) {
        $pets = Pet::with(array('Atendimentos'=> function($query){
            $query->orderBy('id', 'DESC');
        }))->where('nome', 'LIKE', '%'.$request->query('filter').'%')->paginate(15);

        return response()->json($pets);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'nome' => ['required', 'min:2'],
            'especie' => ['required','max:1' ,'regex:/([C|G])+/'],
        ]);

        if($validator->fails() ) {
            return response()->json([
                'message'   => 'Validation Failed',
                'errors'        => $validator->errors()
            ], 422);
        }

        try{
            $request->input('especie') === 'C' ? $especie = 'cão' : $especie = 'gato';

            $pet = new Pet();
            $pet->nome = $request->input('nome');
            $pet->especie = $especie;
            $pet->save();

            return response()->json($pet);

        }catch(Throwable  $e){

            return response()->json($e);

        }
    }

    public function destroy($id) {
        try{
            $pet = Pet::find($id);
            if($pet){
                $pet->delete();
                return response()->json();
            }else{
                return response()->json(['erro' => 'Pet não encontrado'], 400);
            }
        } catch (QueryException $e) {
            return response()->json(['erro' => 'Erro inexperado'], 400);
        }
    }
}
