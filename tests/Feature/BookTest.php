<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookTest extends TestCase
{
    public function test_user_can_get_the_book_data()
    {
        $this->get('/api/book')
            ->assertJsonStructure([
                'status',
                'data' => [
                    'title',
                    'author',
                    'description',
                    'cover_photo',
                    'version',
                    'price',
                    'free_version_url',
                ]
            ]);
    }
}
