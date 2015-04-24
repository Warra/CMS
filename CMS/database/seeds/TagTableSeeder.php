<?php
use Illuminate\Database\Eloquent\Model;
use App\Commands\CreateTag;
use App\GenerateId;
use App\Seeder;

class TagTableSeeder extends Seeder {

  public function run()
  {
    $tags = [
      [
        "name"  =>  "News",
      ],
      [
        "name"  =>  "Fantasy",
      ],
      [
        "name"  =>  "Anger Management",
      ],
      [
        "name"  =>  "Bokshing",
      ],            
    ];

    foreach ($tags as $tag) {
      Bus::dispatch(
            new CreateTag(new GenerateId, $tag)
      );      
    }


  }

}
