<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Contract;
use App\Classes\Dj as dj;
use Schema;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(Request $request) {

        $limit = 20;
        $skip = 0;

        $data = $request->all();
        if(empty($data)){

            return view('index');            
        }

        $cols = Schema::getColumnListing('contracts');
        
        $contracts = new Contract();
        
        if(isset($data['q']))
        foreach($data['q'] AS $q){
            if(in_array($q['field'],$cols)){
                if(isset($q['value']))
                $contracts = $contracts->where($q['field'],$q['conditional'],$q['value']);
                else
                $contracts = $contracts->where($q['field'],$q['conditional']);
            }
        }
        
        
        // AGREGO LOS SELECT
        $select = [];
        $functions = [];
        if(isset($data['fields'])){
            foreach($data['fields'] AS $sField){
                if($this->isFunction($sField))
                $functions[] = $sField;
                else{

                    $pos = strpos(strtolower($sField), ' as ');
                    if($pos === false && $sField != '*'){
                        $sField = $sField." as ".$sField;
                    }
                    $select[] = $sField;
                }
            }
        }

        foreach($functions AS $f)
        $select[] = DB::raw($f);
        
        if($select)
        $contracts = $contracts->select($select);

        if(isset($data['limit']))
        $limit = $data['limit'];

        if(isset($data['skip']))
        $skip = $data['skip'];

        $contracts = $contracts->skip($skip);
        $contracts = $contracts->take($limit);

        if(isset($data['sql']) && $data['sql'])
        return response()->json($this->getEloquentSqlWithBindings($contracts));            
        else
        return response()->json($contracts->get());            


    }

    public function isFunction($field,$char = '('){
        $isFunction = false;
        $pos = strpos($field, $char);

        if ($pos !== false) {
            $isFunction = true;
            if($char == '(')
            $isFunction = $this->isFunction($field,$char = ')');
        }
        return $isFunction;
    }

    function getEloquentSqlWithBindings($query){

        return vsprintf(str_replace('?', '%s', $query->toSql()), collect($query->getBindings())->map(function ($binding) {
            return is_numeric($binding) ? $binding : "'{$binding}'";
        })->toArray());

    }

    //
}
