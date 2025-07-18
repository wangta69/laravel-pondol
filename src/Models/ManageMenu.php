<?php

namespace Pondol\Common\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ManageMenu extends Model
{
  use SoftDeletes;
  protected $fillable = ['type', 'title', 'deleted_at'];

}
