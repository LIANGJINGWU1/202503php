<?php

namespace App\Observers;

use App\Models\Product;

class ProductObserver
{
    /**
     * Handle the Products "created" event.
     */
    public function created(Product $products): void
    {
        //
    }

    /**
     * Handle the Products "updated" event.
     */
    public function updated(Product $products): void
    {
        //
    }

    /**
     * Handle the Products "saving" event.
     */
    public function saving(Product $products): void
    {
        $products->name = $products->name . ' - Updated';
    }

    /**
     * Handle the Products "deleted" event.
     */
    public function deleted(Product $products): void
    {
        //
    }

    /**
     * Handle the Products "restored" event.
     */
    public function restored(Product $products): void
    {
        //
    }

    /**
     * Handle the Products "force deleted" event.
     */
    public function forceDeleted(Product $products): void
    {
        //
    }
}
