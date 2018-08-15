<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Animal;
use App\Animaltype;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$users = factory(App\User::class, 10)->create();
	    $user = factory(App\User::class)->create([
	      'name' => 'admin',
	      'email' => 'biuro@reklamasieciowa.pl',
	      'password' => bcrypt('haslo'),
	      'newsletter' => 1,
	      'notification' => 1,
		]);
		$roles = factory(App\Role::class)->create();
		$admin = User::find(11);
		$admin->roles()->attach(1);
		$animaltypes = factory(App\Animaltype::class)->create([
			'name' => 'pies'
		]);
		$animaltypes = factory(App\Animaltype::class)->create([
			'name' => 'kot'
		]);
		$animaltypes = factory(App\Animaltype::class)->create([
			'name' => 'inny'
		]);
		$animals = factory(App\Animal::class, 60)->create();

		$pages = factory(App\Page::class)->create([
			'title' => 'Pomoc',
	        'slug' => 'pomoc',
	        'metatitle' => 'Pomoc',
	        'metadescription' => 'metadescription',
	        'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam veritatis, aliquam quis nesciunt, distinctio culpa doloremque laudantium modi quas molestias fugiat, provident iusto enim officiis. Impedit numquam facere inventore reprehenderit ex. Animi odio aperiam perspiciatis laborum, atque modi sit deleniti beatae voluptatem exercitationem doloribus maiores architecto, recusandae! Modi, tempore a dolores earum dolore nisi saepe harum adipisci molestias deserunt, aliquam delectus. Aperiam eius aspernatur nesciunt aliquam incidunt quas sed obcaecati dolorem atque eaque sit vero earum, nisi consequatur quam facere amet rem corporis. Voluptas praesentium sed dolor qui eaque architecto, adipisci animi nihil odio explicabo obcaecati. Animi magni dolor non!',
	        'news' => 0,
		]);


		$pages = factory(App\Page::class)->create([
			'title' => 'O nas',
	        'slug' => 'o-nas',
	        'metatitle' => 'O Psygarnij',
	        'metadescription' => 'metadescription',
	        'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam veritatis, aliquam quis nesciunt, distinctio culpa doloremque laudantium modi quas molestias fugiat, provident iusto enim officiis. Impedit numquam facere inventore reprehenderit ex. Animi odio aperiam perspiciatis laborum, atque modi sit deleniti beatae voluptatem exercitationem doloribus maiores architecto, recusandae! Modi, tempore a dolores earum dolore nisi saepe harum adipisci molestias deserunt, aliquam delectus. Aperiam eius aspernatur nesciunt aliquam incidunt quas sed obcaecati dolorem atque eaque sit vero earum, nisi consequatur quam facere amet rem corporis. Voluptas praesentium sed dolor qui eaque architecto, adipisci animi nihil odio explicabo obcaecati. Animi magni dolor non!',
	        'news' => 0,
		]);


		$pages = factory(App\Page::class)->create([
			'title' => 'Kontakt',
	        'slug' => 'kontakt',
	        'metatitle' => 'Kontakt z nami',
	        'metadescription' => 'metadescription',
	        'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam veritatis, aliquam quis nesciunt, distinctio culpa doloremque laudantium modi quas molestias fugiat, provident iusto enim officiis. Impedit numquam facere inventore reprehenderit ex. Animi odio aperiam perspiciatis laborum, atque modi sit deleniti beatae voluptatem exercitationem doloribus maiores architecto, recusandae! Modi, tempore a dolores earum dolore nisi saepe harum adipisci molestias deserunt, aliquam delectus. Aperiam eius aspernatur nesciunt aliquam incidunt quas sed obcaecati dolorem atque eaque sit vero earum, nisi consequatur quam facere amet rem corporis. Voluptas praesentium sed dolor qui eaque architecto, adipisci animi nihil odio explicabo obcaecati. Animi magni dolor non!',
	        'news' => 0,
		]);

		$news = factory(App\Page::class, 10)->create();
	}
}
