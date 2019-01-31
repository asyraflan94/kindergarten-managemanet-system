<?php
namespace App\Libs;

use Carbon\Carbon;
use Faker\Provider\DateTime;
use Illuminate\Support\Facades\Input;

class DxGrid
{

    private $where;
    private $sort;
    private $take;
    private $skip;
    private $filter;
    private $query;
    private $option;

    public function __construct($query, $option = null)
    {
        $this->sort   = Input::get('sort');
        $this->take   = Input::get('take');
        $this->skip   = Input::get('skip');
        $this->filter = Input::get('filter');
        $this->option = $option;
        $this->query  = clone $query;
    }

    public function result()
    {
        if ($this->filter != null) {
            $this->populateWhere();
        }

        $count = $this->query->count();

        if ($this->sort != null) {
            $this->populateSort();
        }

        //get limit after calculate count
        if ($this->skip != null && $this->take != null) {
            $this->populateLimit();
        }

        $data = $this->query->get()->toArray();

        return array('items' => $data, 'count' => $count);
    }

    private function populateWhere()
    {
        $this->where = ' (';
        $filters     = json_decode($this->filter);

        if (count($filters, COUNT_RECURSIVE) > 3) {
            foreach ($filters as $key => $value) {
                if (count($value, COUNT_RECURSIVE) > 3) {
                    foreach ($value as $k => $v) {
                        if (count($v) > 1) {
                            $this->getCondition();
                        }
                        else {
                            $this->where .= $v . ' ';
                        }
                    }
                }
                else {
                    if (count($value) > 1) {
                        $this->getCondition($value);
                    }
                    else {
                        $this->where .= $value . ' ';
                    }
                }
            }
        }
        else {
            $this->getCondition($filters);
        }

        $this->query->whereRaw($this->where . ') ');
    }

    private function getCondition($filters)
    {
        if (key_exists('alias', $this->option) && key_exists($filters[0], $this->option['alias'])) {
            $this->where .= 'LOWER(' . $this->option['alias'][$filters[0]] . ') LIKE \'%' . strtolower($filters[2]) . '%\' COLLATE utf8_general_ci ';
        }
        elseif (key_exists('date', $this->option) && in_array($filters[0], $this->option['date'])) {
            $this->where .= $filters[0] . ' ' . $filters[1] . ' \'' . date('Y-m-d', strtotime($filters[2])) . '\' ';
        }
        elseif (key_exists('datetime', $this->option) && in_array($filters[0], $this->option['datetime'])) {
            $this->where .= $filters[0] . ' ' . $filters[1] . ' \'' . date('Y-m-d H:i', strtotime($filters[2])) . '\' ';
        }
        else {
            switch ($filters[1]) {
                case 'contains' : {
                    $this->where .= 'LOWER(' . $filters[0] . ') LIKE \'%' . strtolower($filters[2]) . '%\' ';
                    break;
                }
                case 'notcontains' : {
                    $this->where .= 'LOWER(' . $filters[0] . ') NOT LIKE \'%' . strtolower($filters[2]) . '%\' ';
                    break;
                }
                case 'startswith' : {
                    $this->where .= 'LOWER(' . $filters[0] . ') LIKE \'' . strtolower($filters[2]) . '%\' ';
                    break;
                }
                case 'endswith' : {
                    $this->where .= 'LOWER(' . $filters[0] . ') LIKE \'%' . strtolower($filters[2]) . '\' ';
                    break;
                }
                default : {
                    $key = is_string($filters[2]) ? '\'' . $filters[2] . '\'' : $filters[2];
                    $this->where .= 'LOWER(' . $filters[0] . ') ' . $filters[1] . ' ' . strtolower($key) . ' ';
                }
            }
        }

    }

    private function populateSort()
    {
        $sorts = json_decode($this->sort);
        $sort  = null;
        if (count($sorts, COUNT_RECURSIVE) > 1) {
            $this->sort .= ' ';
            foreach ($sorts as $key => $value) {
                $direction = $value->desc ? 'DESC' : 'ASC';
                $sort .= $value->selector . ' ' . $direction . ', ';
            }
            $sort = substr($sort, 0, -2);
        }
        else {
            $direction = $sorts[0]->desc ? 'DESC' : 'ASC';
            $sort      = ' ' . $sorts[0]->selector . ' ' . $direction;
        }

        if ($sort != null) {
            $this->query->orderByRaw($sort);
        }
    }

    private function populateLimit()
    {
        $this->query->skip($this->skip)->take($this->take);
    }

}