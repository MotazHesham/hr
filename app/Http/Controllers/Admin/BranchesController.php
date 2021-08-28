<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBranchRequest;
use App\Http\Requests\StoreBranchRequest;
use App\Http\Requests\UpdateBranchRequest;
use App\Models\Branch;
use App\Models\City;
use App\Models\Facility;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class BranchesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('branch_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $branches = Branch::with(['city', 'facility', 'manager', 'media'])->get();

        return view('admin.branches.index', compact('branches'));
    }

    public function create()
    {
        abort_if(Gate::denies('branch_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cities = City::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $facilities = Facility::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $managers = User::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.branches.create', compact('cities', 'facilities', 'managers'));
    }

    public function store(StoreBranchRequest $request)
    {
        $branch = Branch::create($request->all());

        if ($request->input('logo', false)) {
            $branch->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        }

        if ($request->input('comrl_reg_image', false)) {
            $branch->addMedia(storage_path('tmp/uploads/' . basename($request->input('comrl_reg_image'))))->toMediaCollection('comrl_reg_image');
        }

        if ($request->input('chamber_of_commerce_image', false)) {
            $branch->addMedia(storage_path('tmp/uploads/' . basename($request->input('chamber_of_commerce_image'))))->toMediaCollection('chamber_of_commerce_image');
        }

        if ($request->input('vat_registeration_cerftificate', false)) {
            $branch->addMedia(storage_path('tmp/uploads/' . basename($request->input('vat_registeration_cerftificate'))))->toMediaCollection('vat_registeration_cerftificate');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $branch->id]);
        }

        return redirect()->route('admin.branches.index');
    }

    public function edit(Branch $branch)
    {
        abort_if(Gate::denies('branch_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cities = City::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $facilities = Facility::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $managers = User::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $branch->load('city', 'facility', 'manager');

        return view('admin.branches.edit', compact('cities', 'facilities', 'managers', 'branch'));
    }

    public function update(UpdateBranchRequest $request, Branch $branch)
    {
        $branch->update($request->all());

        if ($request->input('logo', false)) {
            if (!$branch->logo || $request->input('logo') !== $branch->logo->file_name) {
                if ($branch->logo) {
                    $branch->logo->delete();
                }
                $branch->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($branch->logo) {
            $branch->logo->delete();
        }

        if ($request->input('comrl_reg_image', false)) {
            if (!$branch->comrl_reg_image || $request->input('comrl_reg_image') !== $branch->comrl_reg_image->file_name) {
                if ($branch->comrl_reg_image) {
                    $branch->comrl_reg_image->delete();
                }
                $branch->addMedia(storage_path('tmp/uploads/' . basename($request->input('comrl_reg_image'))))->toMediaCollection('comrl_reg_image');
            }
        } elseif ($branch->comrl_reg_image) {
            $branch->comrl_reg_image->delete();
        }

        if ($request->input('chamber_of_commerce_image', false)) {
            if (!$branch->chamber_of_commerce_image || $request->input('chamber_of_commerce_image') !== $branch->chamber_of_commerce_image->file_name) {
                if ($branch->chamber_of_commerce_image) {
                    $branch->chamber_of_commerce_image->delete();
                }
                $branch->addMedia(storage_path('tmp/uploads/' . basename($request->input('chamber_of_commerce_image'))))->toMediaCollection('chamber_of_commerce_image');
            }
        } elseif ($branch->chamber_of_commerce_image) {
            $branch->chamber_of_commerce_image->delete();
        }

        if ($request->input('vat_registeration_cerftificate', false)) {
            if (!$branch->vat_registeration_cerftificate || $request->input('vat_registeration_cerftificate') !== $branch->vat_registeration_cerftificate->file_name) {
                if ($branch->vat_registeration_cerftificate) {
                    $branch->vat_registeration_cerftificate->delete();
                }
                $branch->addMedia(storage_path('tmp/uploads/' . basename($request->input('vat_registeration_cerftificate'))))->toMediaCollection('vat_registeration_cerftificate');
            }
        } elseif ($branch->vat_registeration_cerftificate) {
            $branch->vat_registeration_cerftificate->delete();
        }

        return redirect()->route('admin.branches.index');
    }

    public function show(Branch $branch)
    {
        abort_if(Gate::denies('branch_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $branch->load('city', 'facility', 'manager');

        return view('admin.branches.show', compact('branch'));
    }

    public function destroy(Branch $branch)
    {
        abort_if(Gate::denies('branch_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $branch->delete();

        return back();
    }

    public function massDestroy(MassDestroyBranchRequest $request)
    {
        Branch::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('branch_create') && Gate::denies('branch_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Branch();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
