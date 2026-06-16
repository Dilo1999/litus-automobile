<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * @var array<string, string>
     */
    public const SPEC_FIELDS = [
        'engine_capacity' => 'Engine Capacity',
        'fuel_type' => 'Fuel Type',
        'carburation' => 'Carburation',
        'brakes_front' => 'Brakes Front',
        'brakes_rear' => 'Brakes rear',
        'suspension_front' => 'Suspension Front',
        'wheels_front' => 'Wheels Front',
        'wheels_rear' => 'Wheels Rear',
        'fuel_tank_capacity' => 'Fuel Tank Capacity',
        'ground_clearance' => 'Ground Clearance',
        'frame_type' => 'Frame Type',
        'net_weight' => 'Net Weight',
        'seat_height' => 'Seat Height',
        'clutch' => 'Clutch',
        'final_drive' => 'Final Drive',
        'transmission_type' => 'Transmission Type',
    ];

    protected $fillable = [
        'name',
        'title',
        'description',
        'specs',
        'image',
        'brand',
        'original_price',
        'sale_price',
        'special_discount',
        'stock',
    ];

    protected $casts = [
        'specs' => 'array',
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
        $specs = [];
        $stored = $this->specs ?? [];

        foreach (self::SPEC_FIELDS as $key => $label) {
            $value = trim((string) ($stored[$key] ?? ''));
            if ($value !== '') {
                $specs[] = [
                    'label' => $label,
                    'value' => $value,
                ];
            }
        }

        if (! empty($specs)) {
            return $specs;
        }

        return $this->parsedSpecsFromLegacyDescription();
    }

    /**
     * @return array<int, array{label: string, value: string}>
     */
    private function parsedSpecsFromLegacyDescription(): array
    {
        if (! $this->description) {
            return [];
        }

        $lines = array_filter(array_map('trim', explode("\n", $this->description)));
        $specs = [];

        foreach ($lines as $line) {
            if (! str_contains($line, ':')) {
                continue;
            }

            $parts = explode(':', $line, 2);
            if (count($parts) !== 2 || trim($parts[0]) === '') {
                continue;
            }

            $specs[] = [
                'label' => trim($parts[0]),
                'value' => trim($parts[1]),
            ];
        }

        return $specs;
    }
}
