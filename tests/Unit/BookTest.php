<?php

use App\Book;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class BookTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function test_a_book_can_be_created()
    {
        $user = factory(App\User::class)->create();

        $book = $user->books()->create([
            'title' => 'The Hobbit',
            'description' => 'This book talks about a hobbit.',
        ]);

        $found_book = Book::orderBy('id', 'desc')->first();

        $this->assertEquals('The Hobbit', $found_book->title);
        $this->assertEquals('This book talks about a hobbit.', $found_book->description);
    }
}
