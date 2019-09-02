<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Elasticsearch\ClientBuilder;

class TestController extends Controller
{
    public function search()
    {
        $client = ClientBuilder::create()->build();
        $params = [
            'index' => 'my_index',
            'type' => 'my_type',
            'id' => 'my_id',
            'body' => ['testField'=>'abc']
        ];
        $response = $client->index($params);
        dump($response);
    }
}
