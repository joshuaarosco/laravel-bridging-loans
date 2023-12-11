<?php

namespace App\Repositories\Backoffice;
use App\Domain\Interfaces\Repositories\Backoffice\IProductRepository;

use App\Logic\ImageUploader as UploadLogic;
use App\Models\Backoffice\Product as Model;
use App\Models\Backoffice\ProductImage;
use DB, Str;

class ProductRepository extends Model implements IProductRepository
{

    public function fetch(){
        return $this->all();
    }

    public function saveData($request){
        DB::beginTransaction();
        try {
            $data = $this->find($request->id)?:new self;
            $data->name = $request->name;
            $data->description = $request->description;
            $data->price = $request->price;
            $data->stock = $request->stock;
            $data->loan_type_id = $request->type;

            $data->save();

            if($request->hasFile('thumbnail')){

                $this->deleteProdImg($data->id);

                $dataImage = new ProductImage;
                
                $dataImage->product_id = $data->id;
                $dataImage->is_thumb = true;

                $upload = UploadLogic::upload($request->thumbnail,'storage/product');
                $dataImage->path = $upload["path"];
                $dataImage->directory = $upload["directory"];
                $dataImage->filename = $upload["filename"];
                
                $dataImage->save();
            }

            DB::commit();

            return $data;
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }
    }

    public function findOrFail($id){
        $data = $this->find($id);
        if(!$data){
            return false;
        }
        $prod = [
            'id' => $data->id,
            'loan_type_id' => $data->loan_type_id,
            'name' => $data->name,
            'description' => $data->description,
            'price' => $data->price,
            'stock' => $data->stock,
            'thumbnail' => $data->thumbnail(),
        ];
        return $prod;
    }

    public function deleteProdImg($id){
        $prodImgs = ProductImage::where('product_id',$id)->get();
        foreach($prodImgs as $index => $prodImg){
            $prodImg->delete();
        }
    }

    public function deleteData($id){
        DB::beginTransaction();
        try {
            $prodImgs = ProductImage::where('product_id',$id)->get();
            foreach($prodImgs as $index => $prodImg){
                $prodImg->delete();
            }
            $this->destroy($id);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }
    }
}
