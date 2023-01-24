<?php

namespace SaltProject\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Schema;

use SaltLaravel\Models\Resources;

use SaltLaravel\Traits\ObservableModel;
use SaltLaravel\Traits\Uuids;

class Expenses extends Resources {
    use Uuids;
    use ObservableModel;

    protected $filters = [
        'default',
        'search',
        'fields',
        'relationship',
        'withtrashed',
        'orderby',
        // Fields table provinces
        'id',
        'project_id',
        'category_id',
        'item_name',
        'price',
        'base_currency',
        'exchange_currency',
        'exchange_value',
        'purchased_date',
        'employee_id',
        'purchased_from',
    ];

    protected $rules = array(
        'project_id' => 'required|string',
        'category_id' => 'nullable|string',
        'item_name' => 'required|string',
        'price' => 'required|float',
        'base_currency' => 'nullable|string|max:3',
        'exchange_currency' => 'nullable|string|max:3',
        'exchange_value' => 'required|float',
        'purchased_date' => 'required|date',
        'employee_id' => 'required|string',
        'purchased_from' => 'required|string',
    );

    protected $auths = array (
        'index',
        'store',
        'show',
        'update',
        'patch',
        'destroy',
        'trash',
        'trashed',
        'restore',
        'delete',
        'import',
        'export',
        'report'
    );

    protected $forms = array();
    protected $structures = array();
    protected $searchable = array(
        'project_id',
        'category_id',
        'item_name',
        'price',
        'base_currency',
        'exchange_currency',
        'exchange_value',
        'purchased_date',
        'employee_id',
        'purchased_from',
    );

    protected $fillable = array(
        'project_id',
        'category_id',
        'item_name',
        'price',
        'base_currency',
        'exchange_currency',
        'exchange_value',
        'purchased_date',
        'employee_id',
        'purchased_from',
    );
}
