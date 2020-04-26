<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Post;
use App\Entity\Tag;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        for ($i = 0; $i < 4; $i++){

            $tag = new Tag();
            $category = new Category();
            $category->setTitle('GreatCategory');
            $category->setSlug('GreatSlug');
            $tag->setName('GreatTag');
            $tag->setSlug('GreatSlug');

            $manager->persist($tag);
            $manager->persist($category);
        }

       for ($i = 0; $i < 20; $i++){
           $post = new Post();
           $post->setTitle('My sweet Post');
           $post->setContent('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
           $post->setPublished(true);
           $post->addTag($tag);
           $post->setCategory($category);
           $post->setThumbnail('samurai-jack-wallpaper-2615-5ea440af713d9114428925.jpg');
           $manager->persist($post);
       }

           $user = new User();
           $user->setEmail('admin@mail.com');
           $user->setRoles(["ROLE_ADMIN"]);
           $user->setPassword('$argon2id$v=19$m=65536,t=4,p=1$dlBJUjJ3dVE5Q09CNVZhNg$kxh9lk5WmRyD8rD/xq29asvGXUQEyPwCjGAkAIZBj2I');
           $manager->persist($user);

            $user = new User();
            $user->setEmail('user@mail.com');
            $user->setRoles(["ROLE_USER"]);
            $user->setPassword('$argon2id$v=19$m=65536,t=4,p=1$dlBJUjJ3dVE5Q09CNVZhNg$kxh9lk5WmRyD8rD/xq29asvGXUQEyPwCjGAkAIZBj2I');
            $manager->persist($user);

           $manager->flush();
    }
}
