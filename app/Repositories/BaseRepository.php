<?php

namespace App\Repositories;

use Exception;
use Illuminate\Http\JsonResponse;
//use App\Models\Shop;
//use App\Enums\Permission;
//use App\Exceptions\MarvelException;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;
use Prettus\Repository\Eloquent\BaseRepository as Repository;

abstract class BaseRepository extends Repository implements CacheableInterface
{
    use CacheableRepository;

    /**
     * Find data by field and value
     *
     * @param string $field
     * @param string $value
     * @param array $columns
     * @return mixed
     */
    public function findOneByField($field, $value = null, $columns = ['*'])
    {
        $model = $this->findByField($field, $value, $columns = ['*']);

        return $model->first();
    }


    /**
     * Find data by field and value
     *
     * @param string $field
     * @param string $value
     * @param array $columns
     * @return mixed
     */
    public function findOneWhere(array $where, $columns = ['*'])
    {
        $model = $this->findWhere($where, $columns);

        return $model->first();
    }

    /**
     * Find data by id
     *
     * @param int $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, $columns = ['*'])
    {
        $this->applyCriteria();
        $this->applyScope();
        $model = $this->model->find($id, $columns);
        $this->resetModel();

        return $this->parserResult($model);
    }

    /**
     * Find data by id
     *
     * @param int $id
     * @param array $columns
     * @return mixed
     */
    public function findOrFail($id, $columns = ['*'])
    {
        $this->applyCriteria();
        $this->applyScope();
        $model = $this->model->findOrFail($id, $columns);
        $this->resetModel();

        return $this->parserResult($model);
    }

    /**
     * Count results of repository
     *
     * @param array $where
     * @param string $columns
     * @return int
     */
    public function count(array $where = [], $columns = '*')
    {
        $this->applyCriteria();
        $this->applyScope();

        if ($where) {
            $this->applyConditions($where);
        }

        $result = $this->model->count($columns);
        $this->resetModel();
        $this->resetScope();

        return $result;
    }

    /**
     * @param string $columns
     * @return mixed
     */
    public function sum($columns)
    {
        $this->applyCriteria();
        $this->applyScope();

        $sum = $this->model->sum($columns);
        $this->resetModel();

        return $sum;
    }

    /**
     * @param string $columns
     * @return mixed
     */
    public function avg($columns)
    {
        $this->applyCriteria();
        $this->applyScope();

        $avg = $this->model->avg($columns);
        $this->resetModel();

        return $avg;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }


    function csvToArray($filename = '', $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false) {
            while (($row = fgetcsv($handle, 0, $delimiter)) !== false) {
                if (!$header) {
                    $exclude = ['id', 'slug', 'deleted_at', 'created_at', 'updated_at', 'shipping_class_id'];
                    $row = array_diff($row, $exclude);
                    $header = $row;
                } else {
                    $data[] = array_combine($header, $row);
                }
            }
            fclose($handle);
        }

        return $data;
    }
}
