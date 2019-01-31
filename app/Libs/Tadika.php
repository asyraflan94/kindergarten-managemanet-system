<?php

namespace App\Libs;

trait Tadika
{
    function isEmpty($param)
    {
        $is_empty = false;
        if (empty($param) || $param == '' || is_null($param) || !isset($param)) {
            $is_empty = true;
        }

        return $is_empty;
    }

    /**
     *
     * @param      $model
     * @param      $input
     * @param null $option With 'exclude' item to exclude post data, and 'date' to format post data if date exist
     *
     * @return array
     */
    function populateSaveValue($model, $input, $option = null)
    {
        foreach ($input as $key => $value) {
            if ($option != null) {
                if (isset($option['exclude'])) {
                    if (array_search($key, $option['exclude']) === false) {
                        if (isset($option['exclude_prefix']) && substr($key, 0, strlen($option['exclude_prefix'])) != $option['exclude_prefix']) {
                            $key = substr($key, strlen($option['exclude_prefix']));
                            if (isset($option['date'])) {
                                if (array_search($key, $option['date']) !== false) {
                                    $model->$key = $value == '' ? null : date("Y-m-d", strtotime($value));
                                }
                                else {
                                    if ($key == 'email') {
                                        $model->$key = $value == '' ? null : $value;
                                    }
                                    else {
                                        $model->$key = $value == '' ? null : strtoupper($value);
                                    }
                                }
                            }
                            else {
                                if ($key == 'email') {
                                    $model->$key = $value == '' ? null : $value;
                                }
                                else {
                                    $model->$key = $value == '' ? null : strtoupper($value);
                                }
                            }
                        }
                        elseif (!isset($option['exclude_prefix'])) {
                            if (isset($option['date'])) {
                                if (array_search($key, $option['date']) !== false) {
                                    $model->$key = $value == '' ? null : date("Y-m-d", strtotime($value));
                                }
                                else {
                                    if ($key == 'email') {
                                        $model->$key = $value == '' ? null : $value;
                                    }
                                    else {
                                        $model->$key = $value == '' ? null : strtoupper($value);
                                    }
                                }
                            }
                            else {
                                if ($key == 'email') {
                                    $model->$key = $value == '' ? null : $value;
                                }
                                else {
                                    $model->$key = $value == '' ? null : strtoupper($value);
                                }
                            }
                        }
                    }
                }
                else {
                    if (isset($option['date'])) {
                        if (array_search($key, $option['date']) !== false) {
                            $model->$key = $value == '' ? null : date("Y-m-d", strtotime($value));
                        }
                        else {
                            if ($key == 'email') {
                                $model->$key = $value == '' ? null : $value;
                            }
                            else {
                                $model->$key = $value == '' ? null : strtoupper($value);
                            }
                        }
                    }
                    else {
                        if ($key == 'email') {
                            $model->$key = $value == '' ? null : $value;
                        }
                        else {
                            $model->$key = $value == '' ? null : strtoupper($value);
                        }
                    }
                }
            }
            else {
                if ($key == 'email') {
                    $model->$key = $value == '' ? null : $value;
                }
                else {
                    $model->$key = $value == '' ? null : strtoupper($value);
                }
            }
        }

        return $model;
    }

    static function getAddress($model)
    {
        $address = '';
        if ($model->address_1 != null or $model->address_1 != '') {
            $address .= $model->address_1 . ', ';
        }
        if ($model->address_2 != null or $model->address_2 != '') {
            $address .= $model->address_2 . ', ';
        }
        if ($model->postcode != null or $model->postcode != '') {
            $address .= $model->postcode . ', ';
        }
        if ($model->town != null or $model->town != '') {
            $address .= $model->town . ', ';
        }
        if ($model->state != null or $model->state != '') {
            $address .= $model->state . ', ';
        }

        return substr($address, 0, -2);
    }

}