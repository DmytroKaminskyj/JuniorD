<?php

namespace App\Repositories;

use App\Models\BlogCategory as Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class BlogCategoryRepository
 *
 * @package App\Repositories
 */
class BlogCategoryRepository extends CoreRepository
{
    /**
     * @return string
     */
    protected function getModelClass ()
    {
        return Model::class;
    }

    /**
     * Получить модель для редактирования в админке
     * @param $id
     * @return Model
     */

    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    /**
     * Получить список категорий для вывода в выпалающем списке
     * @return Collection
     */
    public function getForComboBox ()
    {
        //return $this->startConditions()->all();

        $columns = implode(',', [
            'id',
            'CONCAT(id, ". ", title) AS id_title ',
        ]);

        /*$result[] = $this->startConditions()->all();
        $result[] = $this
            ->startConditions()
            ->select ('blog_categories.*',
            \DB::raw('CONCAT(id, "." ,title) AS id_title '))
            ->toBase()
            ->get();
       */

        $result = $this
            ->startConditions()
            ->selectRaw($columns)
            ->toBase()
            ->get();

        return $result;
    }

    /**
     * Получение категорий для выводы пагинации
     * @param int|null $perpage
     *
     * @return LengthAwarePaginator
     */
    public function getAllWithPaginate ($perpage = null)
    {
        $columns = ['id','title','parent_id'];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->paginate($perpage);

        return $result;
    }
}
