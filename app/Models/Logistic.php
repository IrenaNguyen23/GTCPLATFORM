<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logistic extends Model
{
    protected $table = 'logistic';
    protected $guarded = [];

    protected  $sc_category = []; // array category id

    public function descriptions()
    {
        return $this->hasMany(LogisticDescription::class, 'post_id', 'id');
    }

    //Function get text description
    public function getText()
    {
        return $this->descriptions()->where('lang', sc_get_locale())->first();
    }

    /**
     * Set array category 
     *
     * @param   [array|int]  $category 
     *
     */
    public function setCategory($category)
    {
        if (is_array($category))
        {
            $this->sc_category = $category;
        }
        else
        {
            $this->sc_category = array((int)$category);
        }
        return $this;
    }
    
    public function categories(){
        return $this->belongsToMany(LogisticCategory::class, 'post_category_join', 'post_id', 'category_id');
    }

    public static function search(string $keyword){
        $keyword = '%' . addslashes($keyword) . '%';
        $result = self::select('id', 'title', 'slug', 'description')
            ->where('title', 'like', $keyword)->paginate(12);
        return $result;
    }
    
    public function getSeoTitleAttribute($value)
    {
        if($value =='' || $value === null)
            return $this->name;
        return $value;
    }

    public function getList(array $dataSearch)
    {
        $keyword          = $dataSearch['keyword'] ?? '';
        $sort_order       = $dataSearch['sort_order'] ?? '';
        $arrSort          = $dataSearch['arrSort'] ?? '';
        $limit          = $dataSearch['limit'] ?? 0;

        $tableDescription = (new LogisticDescription)->getTable();
        $tablePTC         = (new LogisticCategoryJoin)->getTable();
        $tableProduct     = (new Logistic)->getTable();

        //Select field
        $dataSelect = $tableProduct.'.*, '.$tableDescription.'.name, '.$tableDescription.'.description, '.$tableDescription.'.content';

        $productList = (new Logistic)
            ->selectRaw($dataSelect)
            ->leftJoin($tableDescription, $tableDescription . '.post_id', $tableProduct . '.id');

        if (count($this->sc_category)) {
            $productList = $productList->leftJoin($tablePTC, $tablePTC . '.post_id', $this->getTable() . '.id');
            $productList = $productList->whereIn($tablePTC . '.category_id', $this->sc_category)->groupBy($tablePTC . '.post_id');
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
        if($limit)
            $productList = $productList->limit($limit)->get();
        else
            $productList = $productList->paginate(20);

        return $productList;
    }

    public function getDetail($key = null, $type = null, $checkActive = 1)
    {
        if (empty($key)) {
            return null;
        }
        
        $tableDescription = (new \App\Models\LogisticDescription)->getTable();

        $dataSelect = $this->getTable().'.*, '.$tableDescription.'.*';

        $post = $this->leftJoin($tableDescription, $tableDescription . '.post_id', $this->getTable() . '.id');
        
        $post = $post->where($tableDescription . '.lang', sc_get_locale());

        if (empty($type)) {
            $post = $post->where($this->getTable().'.id', $key);
        } 
        elseif ($type == 'slug') {
            $post = $post->where($this->getTable().'.slug', $key);
        } 
        else {
            return null;
        }

        if ($checkActive) 
        {
            $post = $post->where($this->getTable() .'.status', 1);
        }
        $post = $post->selectRaw($dataSelect);

        $post = $post->first();
        return $post;
    }
}
