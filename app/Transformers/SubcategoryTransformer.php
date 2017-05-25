<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Subcategory;

class SubcategoryTransformer extends TransformerAbstract
{
    public function transform(Subcategory $subcategory)
    {
        return [
            'id' => $subcategory->id,
            'title' => $subcategory->title,
            'category_id' => $subcategory->category_id,
            'articles_count' => $subcategory->articles_count,
        ];
    }
}
