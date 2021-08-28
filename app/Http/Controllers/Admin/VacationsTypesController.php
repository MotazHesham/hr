<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyVacationsTypeRequest;
use App\Http\Requests\StoreVacationsTypeRequest;
use App\Http\Requests\UpdateVacationsTypeRequest;
use App\Models\VacationsType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VacationsTypesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('vacations_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vacationsTypes = VacationsType::all();

        return view('admin.vacationsTypes.index', compact('vacationsTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('vacations_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.vacationsTypes.create');
    }

    public function store(StoreVacationsTypeRequest $request)
    {
        $vacationsType = VacationsType::create($request->all());

        return redirect()->route('admin.vacations-types.index');
    }

    public function edit(VacationsType $vacationsType)
    {
        abort_if(Gate::denies('vacations_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.vacationsTypes.edit', compact('vacationsType'));
    }

    public function update(UpdateVacationsTypeRequest $request, VacationsType $vacationsType)
    {
        $vacationsType->update($request->all());

        return redirect()->route('admin.vacations-types.index');
    }

    public function show(VacationsType $vacationsType)
    {
        abort_if(Gate::denies('vacations_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.vacationsTypes.show', compact('vacationsType'));
    }

    public function destroy(VacationsType $vacationsType)
    {
        abort_if(Gate::denies('vacations_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vacationsType->delete();

        return back();
    }

    public function massDestroy(MassDestroyVacationsTypeRequest $request)
    {
        VacationsType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
