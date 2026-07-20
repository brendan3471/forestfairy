<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_slug',
        'option_weight',
        'sku',
        'stock',
    ];

    /**
     * Get all stock records keyed by SKU. Automatically seeds defaults if empty.
     */
    public static function getAllKeyedBySku(): array
    {
        self::ensureSeeded();

        return self::all()->keyBy('sku')->toArray();
    }

    /**
     * Get remaining stock for a given SKU.
     */
    public static function getStockForSku(string $sku): int
    {
        self::ensureSeeded();

        $item = self::where('sku', $sku)->first();
        return $item ? (int) $item->stock : 0;
    }

    /**
     * Safely decrement stock for a given SKU upon purchase.
     */
    public static function decrementStock(string $sku, int $quantity): bool
    {
        self::ensureSeeded();

        $item = self::where('sku', $sku)->first();
        if (!$item) {
            return false;
        }

        $newStock = max(0, $item->stock - $quantity);
        $item->update(['stock' => $newStock]);

        return true;
    }

    /**
     * Ensure stock records exist for all products defined in config/products.php.
     */
    public static function ensureSeeded(): void
    {
        $products = config('products', []);

        foreach ($products as $slug => $prod) {
            foreach ($prod['options'] as $weight => $opt) {
                if (empty($opt['sku'])) continue;

                self::firstOrCreate(
                    ['sku' => $opt['sku']],
                    [
                        'product_slug' => $slug,
                        'option_weight' => $weight,
                        'stock' => 50,
                    ]
                );
            }
        }
    }
}
