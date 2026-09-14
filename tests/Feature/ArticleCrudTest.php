<?php

namespace Tests\Feature;

use App\Models\ArticleType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArticleCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_anonymous_session_can_create_read_update_and_delete_an_article(): void
    {
        $type = ArticleType::create(['name' => 'นิยาย', 'slug' => 'novel', 'is_active' => true]);
        $headers = ['X-Session-Id' => 'session-a'];

        $created = $this->withHeaders($headers)->postJson('/api/articles', [
            'article_type_id' => $type->id,
            'title' => 'บทความเริ่มต้น',
            'content' => '<p>เนื้อหา</p>',
            'keywords' => ['เริ่มต้น'],
            'status' => 'draft',
        ])->assertCreated()->json('data');

        $this->withHeaders($headers)->getJson('/api/articles')->assertOk()->assertJsonPath('data.0.id', $created['id']);
        $this->withHeaders(['X-Session-Id' => 'session-b'])->getJson('/api/articles')->assertOk()->assertJsonCount(0, 'data');
        $this->withHeaders($headers)->putJson('/api/articles/'.$created['id'], ['title' => 'บทความที่แก้ไข'])->assertOk()->assertJsonPath('data.title', 'บทความที่แก้ไข');
        $this->withHeaders($headers)->deleteJson('/api/articles/'.$created['id'])->assertNoContent();
        $this->withHeaders($headers)->getJson('/api/articles')->assertOk()->assertJsonCount(0, 'data');
    }
}
