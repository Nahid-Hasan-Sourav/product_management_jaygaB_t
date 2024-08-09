<?php

namespace App\Actions\Category;

use App\Models\Category;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateCategory
{
    use AsAction;

    public function handle(Category $category, array $data): Category
    {
        $category->update($data);

        return $category;
    }

}
