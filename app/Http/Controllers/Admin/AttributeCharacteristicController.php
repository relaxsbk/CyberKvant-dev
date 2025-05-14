<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category_characteristic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AttributeCharacteristicController extends Controller
{
//    public function store(Request $request)
//    {
//
//        $request->validate([
//            'category_id' => 'required|exists:categories,id',
//            'attributes' => 'required|array',
//            'attributes.*' => 'nullable|string|max:255',
//        ]);
//
////        foreach ($request->attributes as $attribute) {
////            if ($attribute !== null && $attribute !== '') {
////                Category_characteristic::create([
////                    'category_id' => $request->category_id,
////                    'attribute_characteristic' => $attribute,
////                ]);
////            }
////        }
//        foreach ($request->attributes as $attribute) {
//            if ($attribute !== null && $attribute !== '') {
//                Log::debug('Добавляю характеристику: ' . $attribute);
//                DB::table('category_characteristics')->insert([
//                    'category_id' => $request->category_id,
//                    'attribute_characteristic' => $attribute,
//                    'created_at' => now(),
//                    'updated_at' => now(),
//                ]);
//            }
//        }
//
//        return redirect()->back()->with('success', 'Характеристики добавлены');
//    }
    public function store(Request $request)
    {
        Log::debug('➡ Начало метода store');

        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'attributes' => 'required|array',
            'attributes.*' => 'nullable|string|max:255',
        ]);

        Log::debug('✅ Валидация прошла', ['validated' => $validated]);

        foreach ($request->attributes as $attribute) {
            Log::debug('⚙ Обработка характеристики', ['attribute' => $attribute]);

            if ($attribute !== null && $attribute !== '') {
                try {
                    DB::table('category_characteristics')->insert([
                        'category_id' => $request->category_id,
                        'attribute_characteristic' => $attribute,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);

                    Log::debug('✅ Вставка выполнена', [
                        'category_id' => $request->category_id,
                        'attribute' => $attribute,
                    ]);
                } catch (\Throwable $e) {
                    Log::error('❌ Ошибка при вставке характеристики', [
                        'error' => $e->getMessage(),
                        'attribute' => $attribute,
                    ]);
                }
            } else {
                Log::debug('⏭ Пропущен пустой атрибут', ['attribute' => $attribute]);
            }
        }

        Log::debug('🏁 Конец метода store');

        return redirect()->back()->with('success', 'Характеристики добавлены');
    }
}
