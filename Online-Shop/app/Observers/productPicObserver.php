<?php

namespace App\Observers;

use App\Models\Product_photo;
use Illuminate\Support\Facades\Storage;

class productPicObserver
{
    /**
     * Handle the Product_photo "created" event.
     */
    public function created(Product_photo $product_photo): void
    {
        //
    }

    /**
     * Handle the Product_photo "updated" event.
     */
    public function updated(Product_photo $product_photo): void
    {
        //
    }

    public function updating(Product_photo $product_photo)
    {
        if ($product_photo->isDirty('image_path')) {
            $oldPath = $product_photo->getOriginal('image_path');
            if ($oldPath && Storage::exists($oldPath)) {
                Storage::delete($oldPath);
            }
        }
    }

    /**
     * Handle the Product_photo "deleted" event.
     */
    public function deleted(Product_photo $product_photo): void
    {
        //
    }

    /**
     * Handle the Product_photo "restored" event.
     */
    public function restored(Product_photo $product_photo): void
    {
        //
    }

    /**
     * Handle the Product_photo "force deleted" event.
     */
    public function forceDeleted(Product_photo $product_photo): void
    {
        //
    }
}
