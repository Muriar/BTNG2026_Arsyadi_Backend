<?php

namespace Tests\Feature;

use Tests\TestCase;

class ApiDocumentationTest extends TestCase
{
    public function test_api_documentation_is_publicly_accessible(): void
    {
        $this->get('/docs/api')->assertOk();
        $this->get('/docs/api.json')->assertOk();
    }
}
