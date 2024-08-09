<?php

namespace App\Actions\Category;

use App\Models\Category;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateCategory
{
    use AsAction;

    public function handle(array $data): Category
    {
        return Category::create($data);
    }

}
