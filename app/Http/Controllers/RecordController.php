<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecordRequest;
use App\Models\Record;

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
        $record->fill($input)->save();
        return redirect('/records/' . $record->id);
    }
}
