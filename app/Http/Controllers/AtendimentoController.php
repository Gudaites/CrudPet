<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Atendimento;
use App\Pet;
use Illuminate\Support\Facades\Validator;
use \Illuminate\Database\QueryException;

class AtendimentoController extends Controller
{
    public function index()
    {
        $atendimentos = Atendimento::with('Pet:id,nome,especie')->paginate(15);
        return response()->json($atendimentos);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pet_id' => ['required'],
            'descricao' => ['nullable'],
            'data_atendimento' => ['required','date'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message'   => 'Validation Failed',
                'errors'        => $validator->errors()
            ], 422);
        }

        $existPet = Pet::find( $request->input('pet_id'));

        if($existPet){
            try{
                $atendimento = new Atendimento();
                $atendimento->pet_id = $request->input('pet_id');
                $atendimento->descricao = $request->input('descricao');
                $atendimento->data_atendimento = $request->input('data_atendimento');
                $atendimento->save();

                return response()->json($atendimento);
            }catch(QueryException  $e){
                return response()->json($e);
            }
        }else{
            return response()->json(['erro' => 'Pet não existe'], 400);
        }
    }
}
