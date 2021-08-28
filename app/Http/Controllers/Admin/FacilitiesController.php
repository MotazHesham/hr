<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyFacilityRequest;
use App\Http\Requests\StoreFacilityRequest;
use App\Http\Requests\UpdateFacilityRequest;
use App\Models\City;
use App\Models\Facility;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class FacilitiesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('facility_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $facilities = Facility::with(['city', 'media'])->get();

        return view('admin.facilities.index', compact('facilities'));
    }

    public function create()
    {
        abort_if(Gate::denies('facility_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cities = City::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.facilities.create', compact('cities'));
    }

    public function store(StoreFacilityRequest $request)
    {
        $facility = Facility::create($request->all());

        if ($request->input('logo', false)) {
            $facility->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        }

        if ($request->input('comrl_reg_image', false)) {
            $facility->addMedia(storage_path('tmp/uploads/' . basename($request->input('comrl_reg_image'))))->toMediaCollection('comrl_reg_image');
        }

        if ($request->input('chamber_of_commerce_image', false)) {
            $facility->addMedia(storage_path('tmp/uploads/' . basename($request->input('chamber_of_commerce_image'))))->toMediaCollection('chamber_of_commerce_image');
        }

        if ($request->input('vat_registeration_cerftificate', false)) {
            $facility->addMedia(storage_path('tmp/uploads/' . basename($request->input('vat_registeration_cerftificate'))))->toMediaCollection('vat_registeration_cerftificate');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $facility->id]);
        }

        return redirect()->route('admin.facilities.index');
    }

    public function edit(Facility $facility)
    {
        abort_if(Gate::denies('facility_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cities = City::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $facility->load('city');

        return view('admin.facilities.edit', compact('cities', 'facility'));
    }

    public function update(UpdateFacilityRequest $request, Facility $facility)
    {
        $facility->update($request->all());

        if ($request->input('logo', false)) {
            if (!$facility->logo || $request->input('logo') !== $facility->logo->file_name) {
                if ($facility->logo) {
                    $facility->logo->delete();
                }
                $facility->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($facility->logo) {
            $facility->logo->delete();
        }

        if ($request->input('comrl_reg_image', false)) {
            if (!$facility->comrl_reg_image || $request->input('comrl_reg_image') !== $facility->comrl_reg_image->file_name) {
                if ($facility->comrl_reg_image) {
                    $facility->comrl_reg_image->delete();
                }
                $facility->addMedia(storage_path('tmp/uploads/' . basename($request->input('comrl_reg_image'))))->toMediaCollection('comrl_reg_image');
            }
        } elseif ($facility->comrl_reg_image) {
            $facility->comrl_reg_image->delete();
        }

        if ($request->input('chamber_of_commerce_image', false)) {
            if (!$facility->chamber_of_commerce_image || $request->input('chamber_of_commerce_image') !== $facility->chamber_of_commerce_image->file_name) {
                if ($facility->chamber_of_commerce_image) {
                    $facility->chamber_of_commerce_image->delete();
                }
                $facility->addMedia(storage_path('tmp/uploads/' . basename($request->input('chamber_of_commerce_image'))))->toMediaCollection('chamber_of_commerce_image');
            }
        } elseif ($facility->chamber_of_commerce_image) {
            $facility->chamber_of_commerce_image->delete();
        }

        if ($request->input('vat_registeration_cerftificate', false)) {
            if (!$facility->vat_registeration_cerftificate || $request->input('vat_registeration_cerftificate') !== $facility->vat_registeration_cerftificate->file_name) {
                if ($facility->vat_registeration_cerftificate) {
                    $facility->vat_registeration_cerftificate->delete();
                }
                $facility->addMedia(storage_path('tmp/uploads/' . basename($request->input('vat_registeration_cerftificate'))))->toMediaCollection('vat_registeration_cerftificate');
            }
        } elseif ($facility->vat_registeration_cerftificate) {
            $facility->vat_registeration_cerftificate->delete();
        }

        return redirect()->route('admin.facilities.index');
    }

    public function show(Facility $facility)
    {
        abort_if(Gate::denies('facility_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $facility->load('city');

        return view('admin.facilities.show', compact('facility'));
    }

    public function destroy(Facility $facility)
    {
        abort_if(Gate::denies('facility_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $facility->delete();

        return back();
    }

    public function massDestroy(MassDestroyFacilityRequest $request)
    {
        Facility::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('facility_create') && Gate::denies('facility_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Facility();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
