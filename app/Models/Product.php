<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = 'product';

    protected $fillable = [
        'P_Id', 'P_Name', 'Cat_Id', 'P_Price', 'P_Disc_Price', 'S_Description', 'L_Description', 'P_Duration', 'P_Image', 'P_Quantity', 'P_Status'
    ];

    public function qty()
    {
        return $this->belongsTo(Product::class, 'P_Id', 'Pro_Id');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    protected $primaryKey = 'P_Id';

    public function category()
    {
    	return $this->hasOne(Product_Category::class, 'P_Cat_Id', 'Cat_Id');
    }
    public function productReview()
    {
        return $this->hasMany(review::class);
    }
}


