<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::ordered()->get();

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        $nextSortOrder = (Service::max('sort_order') ?? 0) + 1;

        return view('admin.services.create', compact('nextSortOrder'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'in:criminal,civil'],
            'description' => ['nullable', 'string'],
            'icon' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:1'],
        ]);

        $nextSortOrder = (Service::max('sort_order') ?? 0) + 1;
        $data['sort_order'] = (int) ($data['sort_order'] ?? $nextSortOrder);

        $service = Service::create($data);

        if ($request->input('action') === 'apply') {
            return redirect()
                ->route('admin.services.edit', $service)
                ->with('success', 'Услуга добавлена.');
        }

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Услуга добавлена.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'in:criminal,civil'],
            'description' => ['nullable', 'string'],
            'icon' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:1'],
        ]);

        $data['sort_order'] = (int) ($data['sort_order'] ?? $service->sort_order);

        $service->update($data);

        if ($request->input('action') === 'apply') {
            return redirect()
                ->route('admin.services.edit', $service)
                ->with('success', 'Услуга обновлена.');
        }

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Услуга обновлена.');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Услуга удалена.');
    }

    public function reorder(Request $request)
    {
        $data = $request->validate([
            'order' => ['required', 'array'],
            'order.*' => ['integer', 'exists:services,id'],
        ]);

        foreach ($data['order'] as $index => $id) {
            Service::whereKey($id)->update(['sort_order' => $index + 1]);
        }

        return response()->json(['status' => 'ok']);
    }
}

