<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function welcome()
        {
          $productstypes = DB::table('productstypes')->get();
          $productsdetails = DB::table('productsdetails')
          ->join('productstypes','productsdetails.type','productstypes.id')
          ->select('productsdetails.*','productstypes.producttype')
          ->paginate(10);
          return view('welcome',compact('productstypes','productsdetails'));
        }


    public function addtype()
    {
      $productstypes = DB::table('productstypes')->paginate(10);
      return view('addtypetest.addproducttype',compact('productstypes'));
    }
    public function storetype(Request $request)
    {
      $validatedData = $request->validate([
      'producttype'=>'required|unique:productstypes|max:15',
    ]);
    $data=array();
    $data['producttype']=$request->producttype;
    DB::table('productstypes')->insert($data);
        return redirect()->back();
    }
    public function typedelete($id){
      DB::table('productstypes')->where('id',$id)->delete();
       return redirect()->back();
    }

    public function adddetails(Request $request)
    {
      $productstypes = DB::table('productstypes')->get();
      return view('addtypetest.addproductdetails',compact('productstypes'));
    }

    public function storedetails(Request $request)
    {
      $validatedData = $request->validate([
        'image'=>'required | mimes:png,PNG,jpg,JPG,jpeg,JPEG|max:5000',
        'name'=>'required|max:50',
        'brand'=>'required|max:50',
        'model'=>'required|max:50',
        'used'=>'required|max:50',
        'price'=>'required',
        'details'=>'required',
    ]);
    $data=array();
    $data['type']=$request->type;
    $data['name']=$request->name;
    $data['brand']=$request->brand;
    $data['model']=$request->model;
    $data['used']=$request->used;
    $data['price']=$request->price;
    $data['details']=$request->details;
    $image = $request->file('image');
    if ($image) {
          $image_name=hexdec(uniqid());
          $ext=strtolower($image->getClientOriginalExtension());
          $image_full_name=$image_name.'.'.$ext;
          $upload_path='images/';
          $image_url=$upload_path.$image_full_name;
          $success=$image->move($upload_path,$image_full_name);
          $data['image']=$image_url;
    DB::table('productsdetails')->insert($data);
        return redirect()->back();
    }else{
      DB::table('productsdetails')->insert($data);
          return redirect()->back();
    }
  }

  public function detailsdelete($id)
  {
    $delete=DB::table('productsdetails')->where('id',$id)->delete();

    return redirect()->back();
  }


}
