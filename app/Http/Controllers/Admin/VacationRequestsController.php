<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyVacationRequestRequest;
use App\Http\Requests\StoreVacationRequestRequest;
use App\Http\Requests\UpdateVacationRequestRequest;
use App\Models\User;
use App\Models\VacationRequest;
use App\Models\VacationsType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class VacationRequestsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('vacation_request_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = VacationRequest::with(['vacation_type', 'user'])->select(sprintf('%s.*', (new VacationRequest())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'vacation_request_show';
                $editGate = 'vacation_request_edit';
                $deleteGate = 'vacation_request_delete';
                $crudRoutePart = 'vacation-requests';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('reason', function ($row) {
                return $row->reason ? $row->reason : '';
            });

            $table->editColumn('status', function ($row) {
                return $row->status ? VacationRequest::STATUS_SELECT[$row->status] : '';
            });
            $table->addColumn('vacation_type_name', function ($row) {
                return $row->vacation_type ? $row->vacation_type->name : '';
            });

            $table->addColumn('user_email', function ($row) {
                return $row->user ? $row->user->email : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'vacation_type', 'user']);

            return $table->make(true);
        }

        return view('admin.vacationRequests.index');
    }

    public function create()
    {
        abort_if(Gate::denies('vacation_request_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vacation_types = VacationsType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.vacationRequests.create', compact('vacation_types', 'users'));
    }

    public function store(StoreVacationRequestRequest $request)
    {
        $vacationRequest = VacationRequest::create($request->all());

        return redirect()->route('admin.vacation-requests.index');
    }

    public function edit(VacationRequest $vacationRequest)
    {
        abort_if(Gate::denies('vacation_request_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vacation_types = VacationsType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vacationRequest->load('vacation_type', 'user');

        return view('admin.vacationRequests.edit', compact('vacation_types', 'users', 'vacationRequest'));
    }

    public function update(UpdateVacationRequestRequest $request, VacationRequest $vacationRequest)
    {
        $vacationRequest->update($request->all());

        return redirect()->route('admin.vacation-requests.index');
    }

    public function show(VacationRequest $vacationRequest)
    {
        abort_if(Gate::denies('vacation_request_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vacationRequest->load('vacation_type', 'user');

        return view('admin.vacationRequests.show', compact('vacationRequest'));
    }

    public function destroy(VacationRequest $vacationRequest)
    {
        abort_if(Gate::denies('vacation_request_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vacationRequest->delete();

        return back();
    }

    public function massDestroy(MassDestroyVacationRequestRequest $request)
    {
        VacationRequest::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
