<?php

namespace App\Observers;

use App\Models\Product\Category;
use Illuminate\Support\Facades\Cache;

class CategoryObserver
{
    /**
     * Handle the Category "created" event.
     *
     * @param  \App\Models\Product\Category  $category
     * @return void
     */
    public function created(Category $category)
    {

        Cache::forget('categoriesWisthSubcategories');
        $categories = Cache::rememberForever('categoriesWisthSubcategories', function(){
            return Category::with(['subcategories' => function ($query) {
                return $query->select(['id', 'category_id', 'name', 'slug', 'photo'])->orderBy('name', 'asc');
            }])->select('id', 'name', 'slug', 'photo')->orderBy('name', 'asc')->get();
        });
    }

    /**
     * Handle the Category "updated" event.
     *
     * @param  \App\Models\Product\Category  $category
     * @return void
     */
    public function updated(Category $category)
    {
        Cache::forget('categoriesWisthSubcategories');
        $categories = Cache::rememberForever('categoriesWisthSubcategories', function(){
            return Category::with(['subcategories' => function ($query) {
                return $query->select(['id', 'category_id', 'name', 'slug', 'photo'])->orderBy('name', 'asc');
            }])->select('id', 'name', 'slug', 'photo')->orderBy('name', 'asc')->get();
        });
    }

    /**
     * Handle the Category "deleted" event.
     *
     * @param  \App\Models\Product\Category  $category
     * @return void
     */
    public function deleted(Category $category)
    {
        Cache::forget('categoriesWisthSubcategories');
        $categories = Cache::rememberForever('categoriesWisthSubcategories', function(){
            return Category::with(['subcategories' => function ($query) {
                return $query->select(['id', 'category_id', 'name', 'slug', 'photo'])->orderBy('name', 'asc');
            }])->select('id', 'name', 'slug', 'photo')->orderBy('name', 'asc')->get();
        });
    }

    /**
     * Handle the Category "restored" event.
     *
     * @param  \App\Models\Product\Category  $category
     * @return void
     */
    public function restored(Category $category)
    {
        //
    }

    /**
     * Handle the Category "force deleted" event.
     *
     * @param  \App\Models\Product\Category  $category
     * @return void
     */
    public function forceDeleted(Category $category)
    {
        //
    }
}
