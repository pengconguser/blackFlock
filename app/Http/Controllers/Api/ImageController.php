<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageController extends Controller {
	public function save(Request $request) {
		$image = $request->upload_file->path();

		$data = [
			'success' => false,
			'msg' => '上传失败!',
			'file_path' => '',
		];
		if ($image) {
			$dir = '/image/article/';
			$image_path = public_path($dir);
			if (!is_dir($image_path)) {
				mkdir($image_path, 0777, 1);
			}
			$img = \ImageMaker::make($image);
			//不允许上传的图片宽度超过800撑破样式
			if ($img->width() > 800) {
				$img->resize(800, null, function ($constraint) {
					$constraint->aspectRatio();
				});
			}
			$file_path = $dir . time() . '.jpg';
			$img->save(public_path($file_path));
			// 图片保存成功的话
			if ($file_path) {
				$data['file_path'] = $file_path;
				$data['msg'] = "上传成功!";
				$data['success'] = true;
			}
			return $data;
		}
	}
}
