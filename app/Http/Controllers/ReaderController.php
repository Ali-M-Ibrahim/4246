<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Reader;
use Illuminate\Http\Request;

class ReaderController extends Controller
{
    function getAllReaders(){
        // SELECT * FROM READERS;
        $data = Reader::all();
        return $data;
    }

    function getReaderById($id){
        // SELECT * FROM READERS WHERE ID=?
        $data = Reader::find($id);
        return $data;
    }

    function getReaderByIdOrFail($id){
        // SELECT * FROM READERS WHERE ID=?
        $data = Reader::findOrFail($id);
        return $data;
    }

    function getReaderByIdOr($id){
        // SELECT * FROM READERS WHERE ID=?
        $data = Reader::findOr($id,function(){
            return "the id does not exist";
        });
        return $data;
    }

    function getReaderWhereIsEditor(){
        //SELECT * FROM READERS WHERE is_editor=1;
        $data = Reader::where('is_editor',true)->get();
        return $data;
    }

    function getReaderWhereBalanceGt100(){
        //SELECT * FROM READERS WHERE BALANCE > 100;
        $data= Reader::where('balance','>','100')->get();
        return $data;
    }

    function getFirstReaderWhereBalanceGt100(){
        //SELECT * FROM READERS WHERE BALANCE > 100;
        $data= Reader::where('balance','>','100')->first();
        return $data;
    }

    function getFirstReaderWhereBalancelt100OrFail($nb){
        //SELECT * FROM READERS WHERE BALANCE > 100;
        $data= Reader::where('balance','<',$nb)->firstOrFail();
        return $data;
    }

    function getFirstReaderWhereBalancelt100Or($nb){
        //SELECT * FROM READERS WHERE BALANCE > 100;
        $data= Reader::where('balance','<',$nb)->firstOr(function(){
            return "The condition does not exist";
        });
        return $data;
    }

    function getReaderWhereBalanceGt100AndIsEditor(){
        //select * from readers where balance > 100 and is_editor=1;
        $data= Reader::where('balance','>=','100')
            ->where('is_editor',true)
            ->get();
        return $data;
    }

    function getReaderWhereBalanceGt100OrIsEditor(){
        // select * from readers where balance > 100 or is_editor=0;
        $data= Reader::where('balance','>=','100')
            ->OrWhere('is_editor',true)
            ->get();
        return $data;
    }

    function getReadersWhereIn(){
        //select * from readers where id in (1,2,3);
        //select * from readeers where id=1 or id=2 or id=3;
        $data = Reader::whereIn('id',[1,2,3])->get();
        return $data;
    }

    function getReadersWhereBetween(){
        //select * from readers where balance between 0 and 100;
        $data= Reader::whereBetween('balance',[0,100])->get();
        return $data;
    }

    function getReadersTake2(){
        //select * from readers where id>0 limit 2
        $data = Reader::where('id','>',0)
               ->limit(2)
               ->get();
            return $data;
    }

    function  getNameAndBalanceReaders(){
        //select name, balance from readers;
        $data = Reader::all()
            ->select(['name','balance']);
        return $data;
    }

    function getReadersOrderByBalance(){
        // select * from readers order by balance asc;
        $data = Reader::where('id','>','0')
            ->orderBy('balance','asc')
        ->get();
        return $data;
    }

    function getReadersOrderByBalanceDesc(){
        // select * from readers order by balance asc;
        $data = Reader::where('id','>','0')
            ->orderBy('balance','desc')
            ->get();
        return $data;
    }

    function getSumBalanceReader(){
        // select sum(balance) from readers
        $data = Reader::where('id','>',0)
            ->sum('balance');
        return $data;
    }

    function getCountBalanceReader(){
        // select sum(balance) from readers
        $data = Reader::where('id','>',0)
            ->count('balance');
        return $data;
    }

    function getMaxBalanceReader(){
        // select max(balance) from readers
        $data = Reader::where('id','>',0)
            ->max('balance');
        return $data;
    }

    function getMinBalanceReader(){
        // select min(balance) from readers
        $data = Reader::where('id','>',0)
            ->min('balance');
        return $data;
    }

    function getAvgBalanceReader(){
        // select avg(balance) from readers
        $data = Reader::where('id','>',0)
            ->avg('balance');
        return $data;
    }

    function getAuhtorsAndBooks(){
        //select authors.name, books.name , books.description from authors, books where authors.id= books.author_id;
        $data = Author::join('books','authors.id','books.author_id')
            ->select(['authors.name','books.name as bookname','books.description'])
            ->get();
        return $data;
    }


    function addReader1(){
        // to insert a new row
        $data = new Reader();
        $data->name='Ali Hamdoun';
        $data->balance= 1000;
        $data->is_editor=true;
        $data->save();
        return "created";
    }

    function addReader2(Request $request){
        $data = new Reader();
        $data->name=$request->name;
        $data->balance= $request->balance;
        $data->is_editor=$request->is_editor;;
        $data->save();
        return "created";
    }

    function addReader3(){
        Reader::create(
            [
                'name'=>'Test 1',
                'balance'=>'200',
                'is_editor'=>true
            ]
        );
        return "created";
    }

    function addReader4(Request $request){
        Reader::create(
            [
                'name'=> $request->name,
                'balance'=> $request->balance,
                'is_editor'=>$request->is_editor
            ]
        );
        return "created";
    }

    function addReader5(Request $request){
        Reader::create($request->all());
        return "created";
    }

    function updateReader1(){
        $data = Reader::find(1);
        $data->name= 'Updated name';
        $data->balance=5000;
        $data->is_editor=false;
        $data->save();
        return "updated";
    }

    function updateReader2(Request $request,$id){
        $data = Reader::find($id);
        $data->name= $request->name;
        $data->balance=$request->balance;
        $data->is_editor=$request->is_editor;
        $data->save();
        return "updated";
    }

    function updateReader3(){
        Reader::where('is_editor',false)
            ->update(['balance'=>0,'name'=>'XX']);
        return "updated";
    }


    function deleteReader($id){
        $data= Reader::find($id);
        $data->delete();
        return "deleted";
    }

    function massDelete(){
        Reader::where('is_editor',false)
            ->delete();
        return "deleted";
    }

    function update4(Request $request,$id){
        $data = Reader::find($id);
        $data->fill($request->all());
        if ($data->isClean()) {
            return response()->json(['message' => 'Please update the data'], 400);
        }

        $data->save();
        return "ok update";
    }
}
