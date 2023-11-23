<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Items;

class ItemsService
{
    public function get()
    {
        return DB::table('items')->get();
    }

    public function detail($id)
    {
        return DB::table('items')->where('item_code',$id)->first();
    }

    public function create($data)
    {
        try {
            
            DB::beginTransaction();
            $data = DB::table('items')->insert($data);
            DB::commit();

            return $data;

        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            throw $e;
        }
    }

    public function update($id, $data)
    {
        try {
            DB::beginTransaction();
            $data = DB::table('items')->where('item_code', $id)->update($data);
            DB::commit();
            return $data;
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            throw $e;
        }
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();
            $item = DB::table('items')->where('item_code', $id)->first();
            DB::table('items')->where('item_code', $id)->delete();
            DB::commit();

            return $item;
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            throw $e;
        }
    }
}
