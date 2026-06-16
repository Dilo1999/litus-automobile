<?php

namespace App\Http\Controllers;

class GalleryController extends Controller
{
    public function index()
    {
        $images = $this->galleryImages();
        $featured = 'https://images.unsplash.com/photo-1558981403-c5f9899a28bc?auto=format&fit=crop&w=1600&q=80';

        return view('pages.gallery', compact('images', 'featured'));
    }

    private function galleryImages(): array
    {
        $pool = [
            'https://images.unsplash.com/photo-1558981403-c5f9899a28bc?auto=format&fit=crop&w=600&q=80',
            'https://images.unsplash.com/photo-1609630875171-b13213772735?auto=format&fit=crop&w=600&q=80',
            'https://images.unsplash.com/photo-1568772585407-9361f9bf3a87?auto=format&fit=crop&w=600&q=80',
            'https://images.unsplash.com/photo-1605559424843-9e4c228bf1c2?auto=format&fit=crop&w=600&q=80',
            'https://images.unsplash.com/photo-1622185133905-fd2a8f08c4c8?auto=format&fit=crop&w=600&q=80',
            'https://images.unsplash.com/photo-1619642751034-765dfdf7c58e?auto=format&fit=crop&w=600&q=80',
            'https://images.unsplash.com/photo-1591637333184-a19ee6acd7c3?auto=format&fit=crop&w=600&q=80',
            'https://images.unsplash.com/photo-1609630875245-2793b6e8f4e2?auto=format&fit=crop&w=600&q=80',
            'https://images.unsplash.com/photo-1571068316344-bc4f41241e85?auto=format&fit=crop&w=600&q=80',
            'https://images.unsplash.com/photo-1617450712302-7b8afeb6f90e?auto=format&fit=crop&w=600&q=80',
            'https://images.unsplash.com/photo-1525160354320-d8d3c17f190f?auto=format&fit=crop&w=600&q=80',
            'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?auto=format&fit=crop&w=600&q=80',
            'https://images.unsplash.com/photo-1622185133905-fd2a8f08c4c8?auto=format&fit=crop&w=600&q=80',
            'https://images.unsplash.com/photo-1609630875171-b13213772735?auto=format&fit=crop&w=600&q=80',
            'https://images.unsplash.com/photo-1568772585407-9361f9bf3a87?auto=format&fit=crop&w=600&q=80',
            'https://images.unsplash.com/photo-1605559424843-9e4c228bf1c2?auto=format&fit=crop&w=600&q=80',
        ];

        $local = [
            asset('images/background/6b38bb0353.jpeg'),
            asset('images/background/dubai-1-1536x1024.webp'),
            asset('images/background/about-1-ezgif.com-png-to-webp-converter.webp'),
            asset('images/background/Build.png'),
        ];

        $heroSliderRaw = \App\Models\Setting::get('hero_slider_images');
        $heroSliderImages = is_string($heroSliderRaw) ? json_decode($heroSliderRaw, true) : (is_array($heroSliderRaw) ? $heroSliderRaw : []);
        if (! empty($heroSliderImages)) {
            foreach ($heroSliderImages as $path) {
                $local[] = asset('storage/' . $path);
            }
        }

        $merged = array_merge($local, $pool);
        $images = [];

        for ($i = 0; $i < 62; $i++) {
            $images[] = $merged[$i % count($merged)];
        }

        return $images;
    }
}
