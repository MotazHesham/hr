<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyContractRequest;
use App\Http\Requests\StoreContractRequest;
use App\Http\Requests\UpdateContractRequest;
use App\Models\Contract;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response; 
use Alert;

class ContractsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('contract_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contracts = Contract::with(['user'])->get();

        return view('admin.contracts.index', compact('contracts'));
    }

    public function create()
    {
        abort_if(Gate::denies('contract_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.contracts.create', compact('users'));
    }

    public function store(StoreContractRequest $request)
    {
        $contract = Contract::create($request->all());

        if($request->has('partials')){ 

            $user = User::find($contract->user_id);

            $contracts = $user->userContracts()->orderBy('created_at','desc')->get();

            return view('admin.users.relationships.userContracts',compact('contracts','user'));
        }
        Alert::success(trans('global.flash.created'));
        return redirect()->route('admin.contracts.index');
    }

    public function edit(Contract $contract)
    {
        abort_if(Gate::denies('contract_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contract->load('user');

        return view('admin.contracts.edit', compact('users', 'contract'));
    }

    public function editPartials($id)
    {
        abort_if(Gate::denies('contract_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden'); 

        $contract = Contract::findOrFail($id);

        $contract->load('user');

        return view('admin.contracts.partials.edit', compact('contract'));
    }

    public function update(UpdateContractRequest $request, Contract $contract)
    {
        $contract->update($request->all());

        if($request->has('partials')){ 
            
            $user = User::find($contract->user_id);

            $contracts = $user->userContracts()->orderBy('created_at','desc')->get();

            return view('admin.users.relationships.userContracts',compact('contracts','user'));
        }
        
        Alert::success(trans('global.flash.updated'));
        return redirect()->route('admin.contracts.index');
    }

    public function show(Contract $contract)
    {
        abort_if(Gate::denies('contract_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contract->load('user');

        return view('admin.contracts.show', compact('contract'));
    }

    public function destroy(Contract $contract, Request $request)
    {
        abort_if(Gate::denies('contract_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contract->delete();


        if($request->partials == true){ 
            
            $user = User::find($contract->user_id);

            $contracts = $user->userContracts()->orderBy('created_at','desc')->get();

            return view('admin.users.relationships.userContracts',compact('contracts','user'));
        }
        
        Alert::success(trans('global.flash.deleted'));
        return back();
    }

    public function massDestroy(MassDestroyContractRequest $request)
    {
        Contract::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
