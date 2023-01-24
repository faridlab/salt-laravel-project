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
use SaltLaravel\Observers\Traits\Actorable;

class Discussions extends Resources {

    use Uuids;
    use ObservableModel;
    use Actorable;

    protected $table = 'comments';

    protected $filters = [
        'default',
        'search',
        'fields',
        'relationship',
        'withtrashed',
        'orderby',
        // Fields table provinces
        'id',
        'foreign_table',
        'foreign_id',
        'comment_id',
        'scope',
        'comment',
    ];

    protected $rules = array(
        'foreign_table' => 'nullable|string',
        'foreign_id' => 'nullable|string',
        'comment_id' => 'nullable|string',
        'scope' => 'nullable|string',
        'comment' => 'required|string',
    );

    protected $auths = array (
        // 'index',
        'store',
        // 'show',
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
        'foreign_table',
        'foreign_id',
        'comment_id',
        'scope',
        'comment',
    );

    protected $fillable = array(
        'foreign_table',
        'foreign_id',
        'comment_id',
        'scope',
        'comment',
    );

    public function user() {
        return $this->belongsTo('App\Models\Users', 'created_by', 'id')->withTrashed();
    }

}
