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

class Milestones extends Resources {
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
        'title',
        'cost',
        'cost_to_bugdet',
        'summary',
        'start_date',
        'end_date',
        'status',
    ];

    protected $rules = array(
        'project_id' => 'required|string',
        'title' => 'required|string',
        'cost' => 'required|float',
        'cost_to_bugdet' => 'nullable|boolean',
        'summary' => 'required|string',
        'start_date' => 'required|date',
        'end_date' => 'required|date',
        'status' => 'nullable|in:incomplete,completed',
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
        'title',
        'cost',
        'cost_to_bugdet',
        'summary',
        'start_date',
        'end_date',
        'status',
    );

    protected $fillable = array(
        'project_id',
        'title',
        'cost',
        'cost_to_bugdet',
        'summary',
        'start_date',
        'end_date',
        'status',
    );
}
