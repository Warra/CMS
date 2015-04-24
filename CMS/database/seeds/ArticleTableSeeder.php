<?php
use Illuminate\Database\Eloquent\Model;
use App\Commands\createArticle;
use App\GenerateId;
use App\Seeder;

class ArticleTableSeeder extends Seeder {

	public function run()
	{
		// dd(new GenerateId);

		Bus::dispatch(
        	new CreateArticle(new GenerateId, "first article", "first description")
      	);

	}

}
