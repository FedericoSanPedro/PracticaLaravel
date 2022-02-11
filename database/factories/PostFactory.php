<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = \App\Models\Post::class;

    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'body' => $this->faker->paragraph,
            'created_at' => now(),
        ];
    }

    //este metodo viene de otra seccion, donde lo hizo con otros objeto, esto me servira para reemplazar a como lo hacia en MVC
    public function store(Request $request){
        $post = new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');

        /*
        Esta forma es igual que la de arriba pero debo ir al modelo Post para agregar: protected $fillable =['title','body'];

        $post = Post::create([
            'title' => $request->input('title'),
            'body' => $request->input('body')

        ]);

        Si dejo la PALABRA create no es necesario usar save(), a diferencia de make que me lo pedira

        */

        //este save es lo que permitira que se guarde en la base de datos
        $post->save();

        return redirect('/');
    }

    public function edit(){
        $post = Post::find($id)->first();

        return view('post.create')->with('post', $post);
    }

    public function update(Request $request, $id){
        $post = Post::where('id',$id)
            ->update([
                'title' => $request->input('title'),
                'body' => $request->input('body')

        ]);
        
        return redirect('/');
        
    }

    public function destroy($id){
        $post = Post::find($id)->first();

        $post->delete();

        return redirect('/');

    }

    /* Segunda forma de hacerlo
    public function destroy(Car $car){
        
        $post->delete();

        return redirect('/');

    }
    */

}
