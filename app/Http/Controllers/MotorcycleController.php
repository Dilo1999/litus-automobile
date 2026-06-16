<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MotorcycleController extends Controller
{
    public function index(Request $request)
    {
        $selectedBrand = $request->filled('brand') ? trim($request->brand) : null;
        $brands = ['All', 'Honda', 'Yamaha'];

        $defaults = $this->defaultCatalog();
        $dbProducts = Product::query()->latest()->get();

        $items = $dbProducts->count() > 0
            ? $dbProducts->map(fn (Product $p) => [
                'name' => $p->name ?? $p->title,
                'discount' => 'Contact for offer',
                'brand' => $p->brand ?? 'Honda',
                'image' => $p->image
                    ? asset('storage/' . $p->image)
                    : asset('images/product/HONDA-AIR-BLADE-125-PREMIUM-VERSION-2025-SILVER-RED-BLACK-300x300.webp'),
                'url' => route('products.show', $p),
            ])->values()->all()
            : $defaults;

        if ($selectedBrand && $selectedBrand !== 'All') {
            $items = array_values(array_filter(
                $items,
                fn ($item) => strcasecmp($item['brand'] ?? '', $selectedBrand) === 0
            ));
        }

        return view('pages.motorcycles', compact('items', 'brands', 'selectedBrand'));
    }

    private function defaultCatalog(): array
    {
        $image = asset('images/product/HONDA-AIR-BLADE-125-PREMIUM-VERSION-2025-SILVER-RED-BLACK-300x300.webp');

        return [
            ['name' => 'ADV 160 2026', 'discount' => 'MVR 16,750', 'brand' => 'Honda', 'image' => $image, 'url' => route('contact')],
            ['name' => 'ADV 160 2026', 'discount' => 'MVR 16,750', 'brand' => 'Honda', 'image' => $image, 'url' => route('contact')],
            ['name' => 'PCX 160 ABS', 'discount' => 'MVR 11,000', 'brand' => 'Honda', 'image' => $image, 'url' => route('contact')],
            ['name' => 'N Max 155 Neo S', 'discount' => 'MVR 14,100', 'brand' => 'Yamaha', 'image' => $image, 'url' => route('contact')],
            ['name' => 'Aerox Alpha 155 Standard', 'discount' => 'MVR 12,500', 'brand' => 'Yamaha', 'image' => $image, 'url' => route('contact')],
            ['name' => 'Scoopy Prestige 2026', 'discount' => 'MVR 14,000', 'brand' => 'Honda', 'image' => $image, 'url' => route('contact')],
            ['name' => 'Scoopy Fashion 2026', 'discount' => 'MVR 12,000', 'brand' => 'Honda', 'image' => $image, 'url' => route('contact')],
            ['name' => 'Scoopy Stylish 2026', 'discount' => 'MVR 14,000', 'brand' => 'Honda', 'image' => $image, 'url' => route('contact')],
            ['name' => 'Scoopy Prestige 2026', 'discount' => 'MVR 11,500', 'brand' => 'Honda', 'image' => $image, 'url' => route('contact')],
            ['name' => 'Scoopy Club 12 2026', 'discount' => 'MVR 13,500', 'brand' => 'Honda', 'image' => $image, 'url' => route('contact')],
            ['name' => 'Air Blade 125 Sport 2026', 'discount' => 'MVR 14,500', 'brand' => 'Honda', 'image' => $image, 'url' => route('contact')],
            ['name' => 'Air Blade 125 Special 2026', 'discount' => 'MVR 12,900', 'brand' => 'Honda', 'image' => $image, 'url' => route('contact')],
            ['name' => 'Air Blade 125 Standard 2026', 'discount' => 'MVR 12,500', 'brand' => 'Honda', 'image' => $image, 'url' => route('contact')],
        ];
    }
}
