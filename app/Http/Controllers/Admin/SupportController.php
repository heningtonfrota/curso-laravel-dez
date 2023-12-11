<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupportRequest;
use App\Models\Support;
use App\Services\SupportService;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function __construct(
        protected SupportService $service
    ) {}

    public function index(Request $request)
    {
        $supports = $this->service->getAll($request->filter);
        return view('admin/supports/index', compact('supports'));
    }

    public function create ()
    {
        return view('admin/supports/create');
    }

    public function store(StoreUpdateSupportRequest $request, Support $support)
    {
        $this->service->new(CreateSupportDTO::makeFromRequest($request));
        return redirect()->route('supports.index');
    }

    public function show(string|int $support)
    {
        if (!$support = $this->service->findOne($support)) {
            return back();
        }
        return view('admin/supports/show', compact('support'));
    }

    public function edit(string|int $support)
    {
        if (!$support = $this->service->findOne($support)) {
            return back();
        }
        return view('admin/supports/edit', compact('support'));
    }

    public function update(StoreUpdateSupportRequest $request, string|int $support)
    {
        $support = $this->service->update(UpdateSupportDTO::makeFromRequest($request));
        if ($support) {
            return back();
        }
        return redirect()->route('supports.index');
    }

    public function destroy(string|int $support)
    {
        $this->service->delete($support);
        return redirect()->route('supports.index');
    }
}
