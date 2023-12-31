<?php

namespace App\Http\Controllers\Admin;

use App\DTO\Supports\CreateSupportDTO;
use App\DTO\Supports\UpdateSupportDTO;
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
        $supports = $this->service->paginate(
            page: $request->get('page', 1),
            totalPerPage: $request->get('per_page', 5),
            filter: $request->filter
        );

        $filters = ['filter' => $request->get('filter', '')];

        return view('admin/supports/index', compact('supports', 'filters'));
    }

    public function create ()
    {
        return view('admin/supports/create');
    }

    public function store(StoreUpdateSupportRequest $request)
    {
        $this->service->new(CreateSupportDTO::makeFromRequest($request));
        return redirect()->route('supports.index')->with('message', 'Cadastrado com sucesso!');
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
        $support = $this->service->update(UpdateSupportDTO::makeFromRequest($request, $support));

        if (!$support) {
            return back();
        }

        return redirect()->route('supports.index')->with('message', 'Atualizado com sucesso!');;
    }

    public function destroy(string|int $support)
    {
        $this->service->delete($support);
        return redirect()->route('supports.index')->with('message', 'Deletado com sucesso!');;
    }
}
