<?php

namespace App\Http\Controllers;

use App\Models\Printer;
use Illuminate\Http\Request;

class PrinterController extends Controller
{
    public function store(Request $request)
    {
        $form = $request->only(['title', 'model', 'country', 'year', 'img', 'description', 'category', 'price']);

        if (!isset($_FILES['img'])) {
            return redirect(route('create'))->withErrors([
                'files' => "Для публикации требуется фото!",
            ]);
        }
        print_r($_FILES["img"]);
        $path = 'download/img/' . time() . $_FILES['img']['name'];
        copy($_FILES['img']['tmp_name'], $path);
        $form['img'] = $path;
        Printer::create($form);
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $printer = Printer::find($id);
        $form = $request->all();
        if (isset($_FILES['img']) && $_FILES['img']['size'] != 0) {
            if (file_exists($printer['img'])) {
                unlink($printer['img']);
            }
            $path = 'download/img/' . time() . $_FILES['img']['name'];
            copy($_FILES['img']['tmp_name'], $path);
            $form['img'] = $path;
        }
        
        $printer->update($form);
        return redirect(route('adminitem'));
    }

    public function destroy($id)
    {
        $printer = Printer::find($id);
        if (file_exists($printer['img'])) {
            unlink($printer['img']);
        }
        $printer->delete();
        return redirect(route('adminitem'));
    }
}
