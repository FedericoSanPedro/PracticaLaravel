<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function index(){
        $id = 2;
        /*
        Primera forma de buscar un id especifico
        $posts = DB::select('select * from posts where id = :id');
        */

        $posts = DB::table('posts')
        ->where('id',$id)
        ->get();

        $posts2 = DB::table('posts')
        ->select('body')
        ->get();

        $posts3 = DB::table('posts')
        ->where('created_at', '<', now()->subDay())
        ->orWhere('title','Titulo3')
        ->get();

        $posts4 = DB::table('posts')
        ->whereBetween('id',[7,9])
        ->get();

        $posts5 = DB::table('posts')
        ->whereNotNull('title')
        ->get();

        $posts6 = DB::table('posts')
        ->orderBy('title','asc')
        ->get();

        $posts7 = DB::table('posts')
        ->latest()
        ->get();

        $posts8 = DB::table('posts')
        ->oldest()
        ->get();

        $posts8 = DB::table('posts')
        ->inRandomOrder()
        ->get();

        $posts9 = DB::table('posts')
        ->max('id');
        //min,find,count

       /* Los posts se activan aunque el dd solo muestre el primero, este ingresa nuevo post por eso lo comento para no ingresar mas
        $posts10 = DB::table('posts')
        ->insert([
            'title' => 'NewPost 3', 'body' => 'New Body 3'
        ]);

        $posts11 = DB::table('posts')
        ->where('id', '=', 4)
        ->update([
            'title' => 'NewPost 2', 'body' => 'New Body 2'
        ]);

        */


        //Los dd solo muestran el primero a la vez, comentarlo para ver los demas
        dd($posts);
        dd($posts2);
        dd($posts3);
        dd($posts4);
        dd($posts5);
        dd($posts6);
        dd($posts7);
        dd($posts8);
        dd($posts9);
        dd($posts10);
    }
}
