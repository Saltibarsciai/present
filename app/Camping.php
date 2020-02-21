<?php

namespace App;

use Faker\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PhpParser\Node\Expr\Cast\Double;
use Spatie\Tags\HasTags;

class Camping extends Model
{
    use HasTags;

    protected $guarded = [];

    public static function store(Request $request)
    {
        $id = Factory::create()->numberBetween(1, 500);
        return self::create([
            'country' => $request->country,
            'city' => $request->city,
            'name' => $request->name,
            'link' => $request->link,
            'tags' => json_decode($request->tags),
            'image' => "https://picsum.photos/id/$id/350/250"
        ]);
    }
    public function addRating($rating)
    {
        $reviews = $this->reviews + 1;
        $rating = (($this->rating * $this->reviews) + $rating)/$reviews;
        $this->rating = $rating;
        $this->reviews = $reviews;
        $this->save();
        return $this;
    }
    public function updateCamping(Request $request)
    {
        $this->country = $request->country;
        $this->city = $request->city;
        $this->name = $request->name;
        $this->link = $request->link;
        $this->tags = $request->tags;
        $this->save();
        return $this;
    }
}
