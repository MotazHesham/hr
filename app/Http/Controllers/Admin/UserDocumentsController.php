<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyUserDocumentRequest;
use App\Http\Requests\StoreUserDocumentRequest;
use App\Http\Requests\UpdateUserDocumentRequest;
use App\Models\User;
use App\Models\UserDocument;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class UserDocumentsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('user_document_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userDocuments = UserDocument::with(['user', 'media'])->get();

        return view('admin.userDocuments.index', compact('userDocuments'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_document_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.userDocuments.create', compact('users'));
    }

    public function store(StoreUserDocumentRequest $request)
    {
        $userDocument = UserDocument::create($request->all());

        if ($request->input('file', false)) {
            $userDocument->addMedia(storage_path('tmp/uploads/' . basename($request->input('file'))))->toMediaCollection('file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $userDocument->id]);
        }

        $user = User::find($userDocument->user_id);

        $userDocuments = $user->userUserDocuments()->orderBy('created_at','desc')->get();

        return view('admin.users.relationships.userUserDocuments',compact('userDocuments','user')); 
    }

    public function edit(UserDocument $userDocument)
    {
        abort_if(Gate::denies('user_document_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $userDocument->load('user');

        return view('admin.userDocuments.edit', compact('users', 'userDocument'));
    } 

    public function update(UpdateUserDocumentRequest $request, UserDocument $userDocument)
    {
        $userDocument->update($request->all());

        if ($request->input('file', false)) {
            if (!$userDocument->file || $request->input('file') !== $userDocument->file->file_name) {
                if ($userDocument->file) {
                    $userDocument->file->delete();
                }
                $userDocument->addMedia(storage_path('tmp/uploads/' . basename($request->input('file'))))->toMediaCollection('file');
            }
        } elseif ($userDocument->file) {
            $userDocument->file->delete();
        }

        $user = User::find($userDocument->user_id);

        $userDocuments = $user->userUserDocuments()->orderBy('created_at','desc')->get();

        return view('admin.users.relationships.userUserDocuments',compact('userDocuments','user')); 
    }

    public function show(UserDocument $userDocument)
    {
        abort_if(Gate::denies('user_document_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userDocument->load('user');

        return view('admin.userDocuments.show', compact('userDocument'));
    }

    public function destroy(UserDocument $userDocument)
    {
        abort_if(Gate::denies('user_document_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userDocument->delete();

        $user = User::find($userDocument->user_id);

        $userDocuments = $user->userUserDocuments()->orderBy('created_at','desc')->get();

        return view('admin.users.relationships.userUserDocuments',compact('userDocuments','user')); 
    }

    public function massDestroy(MassDestroyUserDocumentRequest $request)
    {
        UserDocument::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('user_document_create') && Gate::denies('user_document_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new UserDocument();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
