<?php
use Illuminate\Database\Eloquent\Model;
use App\Commands\CreateArticle;
use App\GenerateId;
use App\Seeder;

class ArticleTableSeeder extends Seeder {

	public function run()
	{
		$articles = [
			[
				"name"	=>	"first article",
				"description"	=>	"first description"
			],
			[
				"name"	=>	"fantastic journey",
				"description"	=>	"tomorrow"
			],
			[
				"name"	=>	"hot head",
				"description"	=>	"best story"
			],
			[
				"name"	=>	"South Paw",
				"description"	=>	"Boxing Style"
			],						
		];

		foreach ($articles as $article) {
			Bus::dispatch(
		      	new CreateArticle(new GenerateId, $article)
			);			
		}


	}

}
