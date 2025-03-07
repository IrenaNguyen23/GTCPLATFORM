<?php

namespace App\Admin\Models;

use App\Models\Post;
use App\Models\PostDescription;
use App\Models\PostCategoryJoin;

class AdminPost extends Post
{
    /**
     * Insert data description
     *
     * @param   array  $dataInsert  [$dataInsert description]
     *
     * @return  [type]              [return description]
     */
    public static function insertDescription(array $dataInsert)
    {
        return PostDescription::create($dataInsert);
    }

    public function getListAdmin(array $dataSearch)
    {
        $keyword          = $dataSearch['keyword'] ?? '';
        $category_id      = $dataSearch['category_id'] ?? '';
        $sort_order       = $dataSearch['sort_order'] ?? '';
        $arrSort          = $dataSearch['arrSort'] ?? '';
        $tableDescription = (new PostDescription)->getTable();
        $tablePTC         = (new PostCategoryJoin)->getTable();
        $tableProduct     = (new AdminPost)->getTable();
        //Select field
        $dataSelect = $tableProduct.'.*, '.$tableDescription.'.name, '.$tableDescription.'.description, '.$tableDescription.'.content';

        $productList = (new AdminPost)
            ->selectRaw($dataSelect)
            ->leftJoin($tableDescription, $tableDescription . '.post_id', $tableProduct . '.id');

        if ($category_id) {
            $productList = $productList
                ->join($tablePTC, $tablePTC . '.post_id', $tableProduct . '.id')
                ->where($tablePTC . '.category_id', $category_id);
        }
        
        $productList = $productList
            ->where($tableDescription . '.lang', app()->getLocale());


        if ($keyword) {
            $productList = $productList->where(function ($sql) use ($tableDescription, $tableProduct, $keyword) {
                $sql->where($tableDescription . '.name', 'like', '%' . $keyword . '%');
            });
        }
        $productList->groupBy($tableProduct.'.id');

        if ($sort_order && array_key_exists($sort_order, $arrSort)) {
            $field = explode('__', $sort_order)[0];
            $sort_field = explode('__', $sort_order)[1];
            $productList = $productList->orderBy($field, $sort_field);
        } else {
            $productList = $productList->orderBy($tableProduct.'.created_at', 'desc');
        }
        $productList = $productList->paginate(20);

        return $productList;
    }
}
