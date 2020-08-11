<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\UrlRequest;
use App\Http\Resources\Client\PageResource;
use App\Models\FileExtension;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Image;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    public function store(UrlRequest $request)
    {
        $page = new Page();
        $page->fill($request->all());
        $page->user_id = $request->user()->id;
        $page->save();
        //Parser::dispatch($page);
        return response()->json($page);
    }

    public function results(int $id)
    {
        $page = Page::findOrFail($id);
        return PageResource::make($page);
    }

    public function pageResults(Request $request)
    {
        $pages = Page::where('user_id', $request->user()->id)->paginate(15);
        return response()->json([
            'items' => $pages->makeHidden('results'),
            'pagination' => $this->pagination($pages),
        ]);
    }

    use SoftDeletes;
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        Page::findOrFail($id)->delete();
        return response()->json(['message' => 'deleted']);
    }

    public function getIcon(int $width, int $height, string $name) {
        if (!empty($name) && $name !== 'null' && $name !== 'undefined') {
            $filePath = storage_path('app/public/').$name;

            try {
                if (File::exists($filePath)) {
                    $mime = '';
                    $extension = Arr::last(explode('.', $name));

                    switch ($extension) {
                        case FileExtension::JPG:
                            $mime = 'image/jpeg';
                            break;
                        case FileExtension::JPEG:
                            $mime = 'image/jpeg';
                            break;
                        case FileExtension::PNG:
                            $mime = 'image/png';
                            break;
                        case FileExtension::BMP:
                            $mime = 'image/bmp';
                            break;
                        case FileExtension::GIF:
                            $mime = 'image/gif';
                            break;
                    }

                    $image = new Imagick($filePath);
                    $image->cropThumbnailImage($width, $height);
                    $data = (string) $image;
                    $image->destroy();

                    return $this->response->make($data, 200, ['Content-Type', $mime]);
                }
            }
            catch (\ImagickException $exception) {}
        }

        $image = new Imagick(public_path('img/no-photo.png'));
        $image->cropThumbnailImage($width, $height);
        $data = (string) $image;
        $image->destroy();

        return $this->response->make($data, 200, ['Content-Type', 'image/png']);
    }
}
