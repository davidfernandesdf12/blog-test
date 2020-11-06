<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userAdmin = User::where('name', 'Admin')->first();
        $userEditor = User::where('name', 'Editor Test')->first();

        $category = Categories::where('slug', 'linguagem-de-programacao')->first();

        $content = '<p><img alt="" src="https://pplware.sapo.pt/wp-content/uploads/2020/07/php_01.jpg" style="float:right; height:143px; width:250px" /></p>

        <h2><em>Where does it come from?</em></h2>

        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of <em>classical</em> Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>

        <p>The standard chunk of Lorem Ipsum used since the <strong>1500s</strong> is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>';

        $post1 = Posts::query()->create([
            'title' => 'Node',
            'content' => $content,
            'enabled' => true
        ]);

        $post1->addMedia(public_path('images/nodejs_capa-720x376.jpg'))
            ->preservingOriginal()
            ->toMediaCollection('posts_highlight');

        $post1->attachTags(['tags12', 'exemplo de tag'], 'posts');

        $post1->categories()->sync([$category->id]);

        $post2 = Posts::query()->create([
            'title' => 'Java',
            'content' => $content,
            'enabled' => true
        ]);

        $post2
            ->addMedia(public_path('images/java.png'))
            ->preservingOriginal()
            ->toMediaCollection('posts_highlight');

        $post2->attachTags(['tags12', 'exemplo de tag'], 'posts');

        $post2->categories()->sync([$category->id]);


        $post3 = Posts::query()->create([
            'title' => 'PHP',
            'content' => $content,
            'enabled' => true
        ]);

        $post3
            ->addMedia(public_path('images/1200px-PHP-logo.svg.png'))
            ->preservingOriginal()
            ->toMediaCollection('posts_highlight');

        $post3->attachTags(['tags12', 'exemplo de tag'], 'posts');

        $post3->categories()->sync([$category->id]);

        $post4 = Posts::query()->create([
            'title' => 'C Sharp',
            'content' => $content,
            'enabled' => true
        ]);

        $post4
            ->addMedia(public_path('images/1200px-C_Sharp_logo.svg.png'))
            ->preservingOriginal()
            ->toMediaCollection('posts_highlight');

        $post4->attachTags(['tags12', 'exemplo de tag'], 'posts');

        $post4->categories()->sync([$category->id]);

        $post5 = Posts::query()->create([
            'title' => 'Python',
            'content' => $content,
            'enabled' => true
        ]);

        $post5
            ->addMedia(public_path('images/python-screenshot.png'))
            ->preservingOriginal()
            ->toMediaCollection('posts_highlight');

        $post5->attachTags(['tags12', 'exemplo de tag'], 'posts');

        $post5->categories()->sync([$category->id]);

        $post6 = Posts::query()->create([
            'title' => 'Python',
            'content' => $content,
            'enabled' => true
        ]);

        $post6
            ->addMedia(public_path('images/Ruby_on_Rails_logo.jpg'))
            ->preservingOriginal()
            ->toMediaCollection('posts_highlight');

        $post6->attachTags(['tags12', 'exemplo de tag'], 'posts');

        $post6->categories()->sync([$category->id]);

        $userAdmin->posts()->sync([$post1->id, $post3->id, $post5->id]);
        $userEditor->posts()->sync([$post2->id, $post4->id, $post6->id]);

    }
}
