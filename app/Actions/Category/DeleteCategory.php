<?php

namespace App\Actions\Category;

use App\Models\Category;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteCategory
{
    use AsAction;

    public function handle(Category $category): void
    {
        $category->delete();
    }
}
