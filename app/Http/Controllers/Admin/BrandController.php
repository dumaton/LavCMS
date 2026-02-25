<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy('sort_order')->orderBy('name')->paginate(15);

        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        $nextSortOrder = (Brand::max('sort_order') ?? 0) + 1;

        return view('admin.brands.create', compact('nextSortOrder'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:1'],
            'is_active' => ['boolean'],
            'image' => ['nullable', 'image', 'max:4096'],
        ]);

        $data['sort_order'] = $data['sort_order'] ?? (Brand::max('sort_order') ?? 0) + 1;
        $data['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('brands', 'public');
            $this->resizeBrandImage($path, 50, 50);
            $data['image'] = $path;
        }

        Brand::create($data);

        return redirect()
            ->route('admin.brands.index')
            ->with('success', 'Бренд добавлен.');
    }

    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:1'],
            'is_active' => ['boolean'],
            'image' => ['nullable', 'image', 'max:4096'],
        ]);

        $data['sort_order'] = $data['sort_order'] ?? $brand->sort_order;
        $data['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('image')) {
            if ($brand->image) {
                Storage::disk('public')->delete($brand->image);
            }
            $path = $request->file('image')->store('brands', 'public');
            $this->resizeBrandImage($path, 50, 50);
            $data['image'] = $path;
        }

        $brand->update($data);

        return redirect()
            ->route('admin.brands.index')
            ->with('success', 'Бренд обновлён.');
    }

    public function destroy(Brand $brand)
    {
        if ($brand->image) {
            Storage::disk('public')->delete($brand->image);
        }

        $brand->delete();

        return redirect()
            ->route('admin.brands.index')
            ->with('success', 'Бренд удалён.');
    }

    private function resizeBrandImage(string $relativePath, int $targetWidth, int $targetHeight): void
    {
        if (!\function_exists('imagecreatetruecolor')) {
            // GD не установлен — тихо выходим без ресайза
            return;
        }

        $fullPath = Storage::disk('public')->path($relativePath);

        if (!is_file($fullPath)) {
            return;
        }

        $info = @\getimagesize($fullPath);
        if ($info === false) {
            return;
        }

        [$width, $height, $type] = $info;

        switch ($type) {
            case IMAGETYPE_JPEG:
                if (!\function_exists('imagecreatefromjpeg')) {
                    return;
                }
                $srcImage = @\imagecreatefromjpeg($fullPath);
                break;
            case IMAGETYPE_PNG:
                if (!\function_exists('imagecreatefrompng')) {
                    return;
                }
                $srcImage = @\imagecreatefrompng($fullPath);
                break;
            case IMAGETYPE_WEBP:
                if (\function_exists('imagecreatefromwebp')) {
                    $srcImage = @\imagecreatefromwebp($fullPath);
                } else {
                    return;
                }
                break;
            default:
                return;
        }

        if (!$srcImage) {
            return;
        }

        $dstImage = \imagecreatetruecolor($targetWidth, $targetHeight);

        if (in_array($type, [IMAGETYPE_PNG, IMAGETYPE_WEBP], true)) {
            \imagealphablending($dstImage, false);
            \imagesavealpha($dstImage, true);
            $transparent = \imagecolorallocatealpha($dstImage, 0, 0, 0, 127);
            \imagefilledrectangle($dstImage, 0, 0, $targetWidth, $targetHeight, $transparent);
        }

        $ratio = min($targetWidth / $width, $targetHeight / $height);
        $newWidth = (int) round($width * $ratio);
        $newHeight = (int) round($height * $ratio);
        $dstX = (int) floor(($targetWidth - $newWidth) / 2);
        $dstY = (int) floor(($targetHeight - $newHeight) / 2);

        \imagecopyresampled(
            $dstImage,
            $srcImage,
            $dstX,
            $dstY,
            0,
            0,
            $newWidth,
            $newHeight,
            $width,
            $height
        );

        switch ($type) {
            case IMAGETYPE_JPEG:
                \imagejpeg($dstImage, $fullPath, 90);
                break;
            case IMAGETYPE_PNG:
                \imagepng($dstImage, $fullPath);
                break;
            case IMAGETYPE_WEBP:
                if (\function_exists('imagewebp')) {
                    \imagewebp($dstImage, $fullPath, 90);
                }
                break;
        }

        \imagedestroy($srcImage);
        \imagedestroy($dstImage);
    }

    public function reorder(Request $request)
    {
        $data = $request->validate([
            'order' => ['required', 'array'],
            'order.*' => ['integer', 'exists:brands,id'],
        ]);

        foreach ($data['order'] as $index => $id) {
            Brand::whereKey($id)->update(['sort_order' => $index + 1]);
        }

        return response()->json(['status' => 'ok']);
    }
}

