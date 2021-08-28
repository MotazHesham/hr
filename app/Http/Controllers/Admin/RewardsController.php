<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRewardRequest;
use App\Http\Requests\StoreRewardRequest;
use App\Http\Requests\UpdateRewardRequest;
use App\Models\Reward;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class RewardsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('reward_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Reward::with(['user'])->select(sprintf('%s.*', (new Reward())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'reward_show';
                $editGate = 'reward_edit';
                $deleteGate = 'reward_delete';
                $crudRoutePart = 'rewards';

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
            $table->editColumn('value', function ($row) {
                return $row->value ? $row->value : '';
            });
            $table->editColumn('type', function ($row) {
                return $row->type ? Reward::TYPE_RADIO[$row->type] : '';
            });
            $table->addColumn('user_email', function ($row) {
                return $row->user ? $row->user->email : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'user']);

            return $table->make(true);
        }

        return view('admin.rewards.index');
    }

    public function create()
    {
        abort_if(Gate::denies('reward_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.rewards.create', compact('users'));
    }

    public function store(StoreRewardRequest $request)
    {
        $reward = Reward::create($request->all());

        return redirect()->route('admin.rewards.index');
    }

    public function edit(Reward $reward)
    {
        abort_if(Gate::denies('reward_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reward->load('user');

        return view('admin.rewards.edit', compact('users', 'reward'));
    }

    public function update(UpdateRewardRequest $request, Reward $reward)
    {
        $reward->update($request->all());

        return redirect()->route('admin.rewards.index');
    }

    public function show(Reward $reward)
    {
        abort_if(Gate::denies('reward_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reward->load('user');

        return view('admin.rewards.show', compact('reward'));
    }

    public function destroy(Reward $reward)
    {
        abort_if(Gate::denies('reward_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reward->delete();

        return back();
    }

    public function massDestroy(MassDestroyRewardRequest $request)
    {
        Reward::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
