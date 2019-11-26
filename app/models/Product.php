<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Product extends Model
{
    use SoftDeletes;

    public $timestamps = true;
    protected $fillable = ['name', 'price', 'description', 'category_id', 'sub_category_id', 'quantity', 'image_path'];
    protected $dates = ['deleted_at'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    /**
     * @param $data
     * @return array
     * @throws \Exception
     */
    public function transform($data)
    {
        $products = [];
        foreach ($data as $item) {
            $created_at = new Carbon($item->created_at);
            $updated_at = new Carbon($item->updated_at);
            $products[] = [
                'id' => $item->id,
                'name' => $item->name,
                'price' => asDollars($item->price),
                'description' => $item->description,
                'category_id' => $item->category_id,
                'category_name' => Category::where('id', $item->category_id)->first()->name,
                'sub_category_id' => $item->sub_category_id,
                'sub_category_name' => SubCategory::where('id', $item->sub_category_id)->first()->name,
                'quantity' => $item->quantity,
                'image_path' => $item->image_path,
                'created_at' => $created_at->toDateTimeString(),
                'updated_at' => $updated_at->toDateTimeString()
            ];
        }
        return $products;
    }
}

