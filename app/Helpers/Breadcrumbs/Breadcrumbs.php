<?php

namespace App\Helpers\Breadcrumbs;

use Illuminate\Http\Request;

class Breadcrumbs
{
    public function __construct(protected Request $request) { }

    public function segments() : \Illuminate\Support\Collection|array
    {
        return collect($this->request->segments())->map(
            fn ($segment) => new Segments($this->request, $segment)
        );
    }
}
