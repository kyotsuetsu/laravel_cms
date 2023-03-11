<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function uploadForm()
    {
        return view('photos.create');
    }
    
    public function upload(Request $request)
    {
        // バリデーション
            $request->validate([
            'photo' => 'required|image|max:2048',
            ]);
        
        // 保存先ディレクトリ
        // $directory = '/home/ec2-user/environment/cms/storage/app/public/sample';
        $directory = 'public/sample';
        // ファイル名をユニークにする
        $filename = uniqid() . '.' . $request->file('photo')->getClientOriginalExtension();
        
        // ファイルを保存
        $request->file('photo')->storeAs($directory, $filename);
        
        // 保存したファイルのパスを取得
        $filepath = $directory . '/' . $filename;
        
        // リダイレクト
        return redirect()->route('photos.create.form')->with('success', '画像をアップロードしました。');
    }
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('photos.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//     public function upload(Request $request)
//     {
//         // ディレクトリ名
//         $dir = 'sample';

//         // sampleディレクトリに画像を保存
//         $request->file('image')->store('public/' . $dir);

//         return redirect('/');
        

//     }

//     /**
//      * Display the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function show($id)
//     {
//         //
//     }

//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function edit($id)
//     {
//         //
//     }

//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request, $id)
//     {
//         //
//     }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy($id)
//     {
//         //
//     }
// }
