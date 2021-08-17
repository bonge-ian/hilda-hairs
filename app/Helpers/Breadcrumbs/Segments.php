<?php

namespace App\Helpers\Breadcrumbs ;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class Segments
{
    public function __construct(protected Request $request, protected string $segment)
    {

    }

    public function name() : string
    {
        return Str::title($this->segment);
    }

    public function position() : int|string|false
    {
        return array_search($this->segment, $this->request->segments());
    }

    public function url() : \Illuminate\Contracts\Routing\UrlGenerator|string
    {
        return url(
            implode('/', array_slice($this->request->segments(), 0, $this->position() + 1))
        );
    }
}
