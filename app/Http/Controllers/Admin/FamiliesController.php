<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFamilyRequest;
use App\Http\Requests\StoreFamilyRequest;
use App\Http\Requests\UpdateFamilyRequest;
use App\Models\Family;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FamiliesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('family_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $families = Family::with(['user'])->get();

        return view('admin.families.index', compact('families'));
    }

    public function create()
    {
        abort_if(Gate::denies('family_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.families.create', compact('users'));
    }

    public function store(StoreFamilyRequest $request)
    {
        $family = Family::create($request->all());
        
        $user = User::find($family->user_id);

        $families = $user->userFamilies()->orderBy('created_at','desc')->get();

        return view('admin.users.relationships.userFamilies',compact('families','user'));
    }

    public function edit(Family $family)
    {
        abort_if(Gate::denies('family_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $family->load('user');

        return view('admin.families.edit', compact('users', 'family'));
    }

    public function update(UpdateFamilyRequest $request, Family $family)
    {
        $family->update($request->all());

        $user = User::find($family->user_id);

        $families = $user->userFamilies()->orderBy('created_at','desc')->get();

        return view('admin.users.relationships.userFamilies',compact('families','user'));
    }

    public function show(Family $family)
    {
        abort_if(Gate::denies('family_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $family->load('user');

        return view('admin.families.show', compact('family'));
    }

    public function destroy(Family $family)
    {
        abort_if(Gate::denies('family_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $family->delete();

        $user = User::find($family->user_id);

        $families = $user->userFamilies()->orderBy('created_at','desc')->get();

        return view('admin.users.relationships.userFamilies',compact('families','user'));
    }

    public function massDestroy(MassDestroyFamilyRequest $request)
    {
        Family::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
