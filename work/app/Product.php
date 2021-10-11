<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'code',
        'name',
        'slug',
        'stock',
        'short_description',
        'long_description',
        'sell_price',
        'status',
        'subcategory_id',
        'provider_id',
    ];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
    public function images(){
        return $this->morphMany('App\Image','imageable');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function my_story($request){
      $product=  self::create([
            'code'=>$request->code,
            'name'=>$request->name,
            'slug'=>Str::slug($request->name,'_'),
            'short_description'=>$request->short_description,
            'long_description'=>$request->long_description,
            'sell_price'=>$request->sell_price,
            'subcategory_id'=>$request->subcategory_id,
            'provider_id'=>$request->provider_id,
        ]);
        $product->tags()->attach($request->get('tags'));
        $this->generate_code($product);
        $this->upload_files($request, $product);

    }

    public function my_update($request){
       $this->update([
            'code'=>$request->code,
            'name'=>$request->name,
            'slug'=>Str::slug($request->name,'_'),
            'short_description'=>$request->short_description,
            'long_description'=>$request->long_description,
            'sell_price'=>$request->sell_price,
            'subcategory_id'=>$request->subcategory_id,
            'provider_id'=>$request->provider_id,

        ]);
        $this->tags()->sync($request->get('tags'));
        $this->generate_code($this);

    }
    public function generate_code($product){
        $numero = $product->id;
        $numeroConCeros = str_pad($numero, 8, "0", STR_PAD_LEFT);
        $product->update(['code' => $numeroConCeros]);
    }

    public function upload_files($request, $product)
    {
        $urlimages = [];
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {
                $nombre = time() . $image->getClientOriginalName();
                $ruta = public_path() . '/image';
                $image->move($ruta, $nombre);
                $urlimages[]['url'] = '/image/' . $nombre;
            }
        }
        $product->images()->createMany($urlimages);
    }

    public function status(){
        switch ($this->status) {
            case 'ACTIVE':
                return 'Activo';

            case 'DEACTIVATED':

                return 'Desactivado';

            default:
                # code...
                break;
        }
    }

    static public function get_active_products(){
        return self::where('status', 'ACTIVE');
    }
}
