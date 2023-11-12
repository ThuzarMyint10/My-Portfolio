<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\BlogPost;

class PostTest extends TestCase
{
    use RefreshDatabase;
    public function testNoBlogPosts()
    {
        $response = $this->get('/posts');

        $response->assertSeeText('No blog posts yet!');
    }

    public function testSee1BlogPost()
    {
        // Arrange
        
        $post = $this->createDummyBlogPostWithNoComments();

        // Act 
        $response = $this->get('posts');

        // Assert
        $response->assertSeeText('New title');
        $response->assertSeeText('No comment yet!');
        $this->assertDatabaseHas('blog_posts', [
            'title' => 'New title'
        ]);
    }

    public function testSee1BlogPostWithComment()
    {
        $post = $this->createDummyBlogPostWithNoComments();
        
        $response = $this->get('posts');
    }

    public function testStoreValid()
    {
        $params = [
            'title' => 'Valid title',
            'content' => 'At least 10 characters'
        ];
        $this->post('/posts', $params)
            ->assertStatus(302)
            ->assertSessionHas('status'); 
        $this->assertEquals(session('status'), 'Blog post was created');
    }

    public function testStoreFail()
    {
        $params = [
            'title' => 'x',
            'content' => 'x'
        ];
        $this->post('/posts', $params)
            ->assertStatus(302)
            ->assertSessionHas('errors'); 

        $message = session('errors')->getMessage();
        $this->assertEquals($message['title'][0], 'The title must be at least 5 characters.');
        $this->assertEqueals($message['content'][0], 'The content must be at least 10 characters.');

    }

    public function testUpdateValid()
    {
        $post= new BlogPost();
        $post->title = 'New title';
        $post->content = 'Content of the blog post';
        $post->save();
        $post = $this->createDummyBlogPost();

        $this->assertDatabaseHas('blog_posts', $post->toArray());

        $params = [
            'title' => 'A new named title',
            'content' => 'Content was changed'
        ];
        $this->put("/posts/{$post->id}", $params)
            ->assertStatus(302)
            ->assertSessionHas('status'); 
        $this->assertEquals(session('status'), 'Blog post was updated!');

        $this->assertDatabaseMissing('blog_posts', $post->toArray());
        $this->assertDatabaseHas('blog_posts',[
            'title' => 'A new named title'
        ]);
    }

    public function testDelete()
    {
        $post = $this->createDummyBlogPost();
        $this->assertDatabaseHas('blog_posts', $post->toArray());

        $this->delete("/posts/{$post->id}",)
            ->assertStatus(302)
            ->assertSessionHas('status'); 
        $this->assertEquals(session('status'), 'Blog post was deleted!');
        $this->assertDatabaseMissing('blog_posts', $post->toArray());

         
    }

    public function createDummyBlogPost() : createDummyBlogPost{
        $post= new BlogPost();
        $post->title = 'New title';
        $post->content = 'Content of the blog post';
        $post->save();

        return factory(BlogPost::class)->states('new-title')->create();

       // return $post;
    }
}
