<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Http\Requests\RecordRequest;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function index(Record $record)
    {
        return view('records.index')->with(['records' => $record->getPaginateByLimit()]);
    }
    
    public function show(Record $record)
    {
        return view('records.show')->with(['record' => $record]);
    }
    
    public function create()
    {
        return view('records.create');
    }
    
    public function store(Record $record, RecordRequest $request)
    {
        $input = $request['record'];
        $input += ['user_id' => $request->user()->id];
        $record->fill($input)->save();
        return redirect('/records/' . $record->id);
    }
    
    public function edit(Record $record)
    {
        return view('records.edit')->with(['record' => $record]);
    }
    
    public function update(RecordRequest $request, Record $record)
    {
        $input_record = $request['record'];
        $input_record += ['user_id' => $request->user()->id];
        
        $record->fill($input_record)->save();
        
        return redirect('/records/' . $record->id);
    }
    
    public function delete(Record $record)
    {
        $record->delete();
        return redirect('/records');
    }
}
