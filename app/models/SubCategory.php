<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class SubCategory extends Model
{
    use SoftDeletes;

    public $timestamps = true;
    public $table = 'sub_categories';
    protected $fillable = ['name', 'slug', 'category_id'];
    protected $dates = ['deleted_at'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }

   public function transform($data)
    {
        $subcategories = [];
        foreach ($data as $item) {
            $created_at = new Carbon($item->created_at);
            $updated_at = new Carbon($item->updated_at);
            $subcategories[] = [
                'id' => $item->id,
                'category_name' => Category::where('id', $item->category_id)->first()->name,
                'name' => $item->name,
                'slug' => $item->slug,
                'category_id' => $item->category_id,
                'created_at' => $created_at->toDateTimeString(),
                'updated_at' => $updated_at->toDateTimeString()
            ];
        }
        return $subcategories;
    }

    public function scopeFindBySlug($queryBuilder, $slug)
    {
        return $queryBuilder->where('slug', $slug)->first();
    }

    public function scopeFindBySlugAndCategoryId($queryBuilder, $slug, $categoryId)
    {
        return $queryBuilder->where('slug', $slug)
            ->where('category_id', $categoryId)->get();
    }

}

