<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'description',
        'image',
        'category',
        'sub_category',
        'brand',
        'original_price',
        'sale_price',
        'special_discount',
        'stock',
    ];

    protected $casts = [
        'original_price' => 'decimal:2',
        'sale_price' => 'decimal:2',
        'special_discount' => 'decimal:2',
        'stock' => 'integer',
    ];

    public function displayName(): string
    {
        return $this->name ?? $this->title ?? 'Product';
    }

    public function imageUrl(): string
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }

        return asset('images/product/HONDA-AIR-BLADE-125-PREMIUM-VERSION-2025-SILVER-RED-BLACK-300x300.webp');
    }

    public function categoryLabel(): string
    {
        return $this->sub_category ?: ($this->category ?: 'Motorcycles');
    }

    public function resolvedSpecialDiscount(): ?float
    {
        if ($this->special_discount !== null) {
            return (float) $this->special_discount;
        }

        if ($this->original_price !== null && $this->sale_price !== null) {
            return max(0, (float) $this->original_price - (float) $this->sale_price);
        }

        return null;
    }

    public function formatMoney(?float $amount): ?string
    {
        if ($amount === null) {
            return null;
        }

        return 'MVR ' . number_format($amount, 2);
    }

    /**
     * @return array<int, array{label: string, value: string}>
     */
    public function parsedSpecs(): array
    {
        if (! $this->description) {
            return self::defaultSpecs();
        }

        $lines = array_filter(array_map('trim', explode("\n", $this->description)));
        $specs = [];
        $hasColonLines = false;

        foreach ($lines as $line) {
            if (! str_contains($line, ':')) {
                continue;
            }

            $parts = explode(':', $line, 2);
            if (count($parts) !== 2 || trim($parts[0]) === '') {
                continue;
            }

            $hasColonLines = true;
            $specs[] = [
                'label' => trim($parts[0]),
                'value' => trim($parts[1]),
            ];
        }

        return $hasColonLines ? $specs : self::defaultSpecs();
    }

    /**
     * @return array<int, array{label: string, value: string}>
     */
    public static function defaultSpecs(): array
    {
        return [
            ['label' => 'Engine Capacity', 'value' => '160cc'],
            ['label' => 'Fuel Type', 'value' => 'Gasoline'],
            ['label' => 'Carburation', 'value' => 'Fuel Injection'],
            ['label' => 'Brakes Front', 'value' => 'Disc - ABS'],
            ['label' => 'Brakes rear', 'value' => 'Disc'],
            ['label' => 'Suspension Front', 'value' => 'Telescopic Fork'],
            ['label' => 'Wheels Front', 'value' => 'Cast'],
            ['label' => 'Wheels Rear', 'value' => 'Cast'],
            ['label' => 'Fuel Tank Capacity', 'value' => '8.1L'],
            ['label' => 'Ground Clearance', 'value' => '135 mm'],
            ['label' => 'Frame Type', 'value' => 'Double Cradle'],
            ['label' => 'Net Weight', 'value' => '132 kg'],
            ['label' => 'Seat Height', 'value' => '764 mm'],
            ['label' => 'Clutch', 'value' => 'Automatic, Centrifugal, Dry Type'],
            ['label' => 'Final Drive', 'value' => 'Belt'],
            ['label' => 'Transmission Type', 'value' => 'Automatic CVT Transmission'],
        ];
    }
}
