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

class Projects extends Resources {
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
        'code_number',
        'name',
        'description',
        'start_date',
        'end_date',
        'category_id',
        'organization_id',
        'client_id',
        'value_contract',
        'base_currency',
        'exchange_currency',
        'exchange_value',
        'hours_estimate',
        'note',
        'status',
        'data',
    ];

    protected $rules = array(
        'code_number' => 'required|string|min:3|max:6',
        'name' => 'required|string',
        'description' => 'required|string',
        'start_date' => 'required|date',
        'end_date' => 'nullable|date',
        'category_id' => 'required|string',
        'organization_id' => 'required|string',
        'client_id' => 'required|string',
        'value_project' => 'required|float',
        'base_currency' => 'nullable|string|max:3',
        'exchange_currency' => 'nullable|string|max:3',
        'exchange_value' => 'required|float',
        'hours_estimate' => 'required|float',
        'status' => 'required|in:draft,in-progress,not-started,on-hold,canceled,finished',
        'note' => 'nullble|string',
        'data' => 'nullable|json',
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
        'code_number',
        'name',
        'description',
        'start_date',
        'end_date',
        'category_id',
        'organization_id',
        'client_id',
        'value_contract',
        'base_currency',
        'exchange_currency',
        'exchange_value',
        'hours_estimate',
        'note',
        'status',
        'data',
    );

    protected $fillable = array(
        'code_number',
        'name',
        'description',
        'start_date',
        'end_date',
        'category_id',
        'organization_id',
        'client_id',
        'value_contract',
        'base_currency',
        'exchange_currency',
        'exchange_value',
        'hours_estimate',
        'note',
        'status',
        'data',
    );
}
