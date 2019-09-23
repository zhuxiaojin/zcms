<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Plank\Mediable\Media;

class UploadController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth:manager');
    }
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function uploadEditor(Request $request) {
        $url = \Storage::putFile("files/" . auth('manager')->id(), $request->file('editormd-image-file'));
        return response()->json(['success' => 1, 'message' => '', 'url' => asset(\Storage::url($url))]);
    }
    /**
     * @param Request $request
     * @return string
     */
    public function fakerUpload(Request $request) {
        return '';
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Plank\Mediable\Exceptions\MediaUpload\ConfigurationException
     * @throws \Plank\Mediable\Exceptions\MediaUpload\FileExistsException
     * @throws \Plank\Mediable\Exceptions\MediaUpload\FileNotFoundException
     * @throws \Plank\Mediable\Exceptions\MediaUpload\FileNotSupportedException
     * @throws \Plank\Mediable\Exceptions\MediaUpload\FileSizeException
     * @throws \Plank\Mediable\Exceptions\MediaUpload\ForbiddenException
     * @throws \Plank\Mediable\Exceptions\MediaUrlException
     */
    public function uploadMedia(Request $request) {
        $media = \MediaUploader::fromSource($request->file('file'))
            ->toDisk('public')
            ->toDirectory(auth('manager')->id() . '/' . 'media')
            ->useHashForFilename()
            ->upload();
        $media->url = $media->getUrl();
        $media->path = \Storage::path($media->getDiskPath());
        //根据需要同步生成缩略图
//        $img = \Image::make($media->path)
//            ->resize(200, 200)
//            ->save(storage_path('app/public/'.auth('manager')->id() . '/' . 'media/') . $media->filename . '_thumbnail' . '.' . $media->extension);
        return response()->json($media);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteMedia(Media $media) {
        $media->delete();
        return response()->json(['code' => 200]);
    }
}
